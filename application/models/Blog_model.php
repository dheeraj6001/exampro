<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    private $table = 'er_blog_posts';

    public function get_all($status = null, $limit = null, $offset = 0) {
        if ($status) $this->db->where('status', $status);
        $this->db->order_by('created_at', 'DESC');
        if ($limit) $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result();
    }

    public function count_all($status = null) {
        if ($status) $this->db->where('status', $status);
        return $this->db->count_all_results($this->table);
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function get_by_slug($slug) {
        return $this->db->get_where($this->table, ['slug' => $slug, 'status' => 'published'])->row();
    }

    public function insert($data) {
        $data['slug']       = $this->_unique_slug($this->_slugify($data['title']));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    private function _slugify($text) {
        $text = strtolower(trim($text));
        $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
        $text = preg_replace('/[\s-]+/', '-', $text);
        return trim($text, '-');
    }

    private function _unique_slug($slug, $exclude_id = null) {
        $original = $slug;
        $count    = 1;
        while (TRUE) {
            $this->db->where('slug', $slug);
            if ($exclude_id) $this->db->where('id !=', $exclude_id);
            if ($this->db->count_all_results($this->table) === 0) break;
            $slug = $original . '-' . $count++;
        }
        return $slug;
    }
}
