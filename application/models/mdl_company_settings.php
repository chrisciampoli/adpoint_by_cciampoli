<?php

class Mdl_company_settings extends CI_Model {

    public $settings = array(
        'company'=>'',
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
        echo 'a';
        $this->settings['company'] = $data['company'];
        $this->settings['company_name'] = $data['company_name'];
        $this->settings['shifts'] = $data['shifts'];
        $this->settings['locations'] = $data['locations'];
        $this->settings['admin_email'] = $data['admin_email'];
        echo 'b';
        $exists = $this->getSettings($this->settings['company']);
        echo "<pre>" . print_r($exists,true) . "</pre>";
        return;
        echo '1';
        if(!empty($exists)) {
            echo '2';
            if($this->db->insert($this->table,$this->settings)) {
                echo '3';
                return true;
            } else {
                echo '4';
                return false;
            }
        } else {
            echo '5';
            return $this->updateSettings($this->settings['company'], $this->settings);
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
