<?php

class Mdl_company_settings extends CI_Model {

    public $settings = array(
        'company'=>'',
        'company_name'=>'',
        'admin_email'=>''
        );

    public $table = 'company_settings';

    function __construct() {
        parent::__construct();
    }

    function saveSettings($data) {

        $this->settings['company'] = $data['company'];
        $this->settings['company_name'] = $data['company_name'];
        $this->settings['admin_email'] = $data['admin_email'];

        $exists = $this->getSettings($this->settings['company']);
        
        if(count($exists) < 1) {
            $this->db->insert($this->table,$this->settings);
        } else {
            $this->updateSettings($this->settings['company'],$this->settings);
        }

        
        return;
    }

    function updateSettings($company, $settings) {
       $this->db->where('company',$company);
       if($this->db->update($this->table, $settings)) {
            return true;
       } else {
            return false;
       }
    }

    function getSettings($company) {
        $this->db->select('*');
        $this->db->where('company',$company);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }



}
