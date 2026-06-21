<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MongoDB connection wrapper for CodeIgniter 3.
 * Requires: composer require mongodb/mongodb  +  ext-mongodb PHP extension.
 */
class Mdb {

    /** @var MongoDB\Database */
    private $db;

    public function __construct() {
        require_once FCPATH . 'vendor/autoload.php';

        $CI =& get_instance();
        $CI->config->load('mongodb', TRUE);

        $uri    = $CI->config->item('uri',      'mongodb');
        $dbname = $CI->config->item('database', 'mongodb');

        $client   = new MongoDB\Client($uri, [], [
            'typeMap' => ['root' => 'array', 'document' => 'array', 'array' => 'array'],
        ]);
        $this->db = $client->selectDatabase($dbname);
    }

    /** Return a collection handle. */
    public function col(string $name): MongoDB\Collection {
        return $this->db->selectCollection($name);
    }

    // ------------------------------------------------------------------
    //  Static normalisation helpers (used by models and controllers)
    // ------------------------------------------------------------------

    /**
     * Convert a raw MongoDB array doc to a plain array safe for JSON:
     *  - _id (ObjectId) → id (string)
     *  - UTCDateTime    → 'Y-m-d H:i:s' string
     */
    public static function norm(?array $doc): ?array {
        if ($doc === null) return null;
        $doc['id'] = (string)$doc['_id'];
        unset($doc['_id']);
        foreach ($doc as &$v) {
            if ($v instanceof MongoDB\BSON\UTCDateTime) {
                $v = $v->toDateTime()->format('Y-m-d H:i:s');
            }
        }
        unset($v);
        return $doc;
    }

    /** Normalise all docs from a cursor into a plain array. */
    public static function normAll(iterable $cursor): array {
        $out = [];
        foreach ($cursor as $doc) {
            $out[] = static::norm($doc);
        }
        return $out;
    }

    /** Safely build a MongoDB ObjectId; returns null on bad input. */
    public static function oid(string $id): ?MongoDB\BSON\ObjectId {
        try {
            return new MongoDB\BSON\ObjectId($id);
        } catch (Throwable $e) {
            return null;
        }
    }

    /** Current UTC time as UTCDateTime. */
    public static function now(): MongoDB\BSON\UTCDateTime {
        return new MongoDB\BSON\UTCDateTime();
    }
}
