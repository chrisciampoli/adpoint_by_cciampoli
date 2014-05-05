<?php

class Mdl_company_settings extends CI_Model {

    public $settings = array(
        'company_name'=>'',
        'shifts'=>'',
        'locations'=>'',
        'admin_email'=>''
        );

    public $table = 'company_settings';

    function __construct() {
        parent::__construct();
    }

    function saveSettings($data) {

        $this->settings['company_name'] = $data['company_name'];
        $this->settings['shifts'] = $data['shifts'];
        $this->settings['locations'] = $data['locations'];
        $this->settings['admin_email'] = $data['admin_email'];

        if($this->db->insert($this->table,$this->settings)) {
            return true;
        } else {
            return false;
        }
    }

    function updateSettings($id = null) {
        if($this->db->update($id, $this->table,$this->settings)) {
            return true;
        } else {
            return false;
        }
    }

    function getSettings($company_name) {
        $this->db->select('*');
        $this->db->where('company_name',$company_name);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }



}
