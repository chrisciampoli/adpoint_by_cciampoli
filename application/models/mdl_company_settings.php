<?php

class Mdl_company_settings extends CI_Model {

    private $company = '';
    private $company_name = '';
    private $admin_email = '';
    private $locations = '';
    private $shifts = '';

    public $table = 'company_settings';

    function __construct() {
        parent::__construct();
    }

    function saveSettings($data) {

        $this->company = $data['company'];
        $this->company_name = $data['company_name'];
        $this->admin_email = $data['admin_email'];
        $this->locations = $data['locations'];
        $this->shifts = $data['shifts'];

        $exists = $this->getSettings($this->company);
        
        if(count($exists) < 1) {
            $this->db->insert($this->table, $this);
        } else {
            $this->updateSettings($this->company, $this);
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
