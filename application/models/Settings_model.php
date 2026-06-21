<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function get_all() {
        $rows     = $this->db->get('er_settings')->result();
        $settings = [];
        foreach ($rows as $row) {
            $settings[$row->setting_key] = $row->setting_value;
        }
        return $settings;
    }

    public function get($key, $default = '') {
        $row = $this->db->get_where('er_settings', ['setting_key' => $key])->row();
        return $row ? $row->setting_value : $default;
    }

    public function save(array $data) {
        foreach ($data as $key => $value) {
            $exists = $this->db->get_where('er_settings', ['setting_key' => $key])->num_rows();
            if ($exists) {
                $this->db->update('er_settings', ['setting_value' => $value], ['setting_key' => $key]);
            } else {
                $this->db->insert('er_settings', ['setting_key' => $key, 'setting_value' => $value]);
            }
        }
    }
}
