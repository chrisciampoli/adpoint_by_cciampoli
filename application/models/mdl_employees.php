<?php

class Mdl_employees extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getCompany() {
        
        $username = $this->session->userdata('username');
        
        $this->db->select('company');
        
        $this->db->where('username', $username);
        
        $query = $this->db->get('users');

        if ($query->num_rows() > 0)
        {
           foreach ($query->result() as $row) {
              $company = $row->company;
           }
        }
        
        $query->free_result();
        
        return $company;
    }

    function getCompanyEmployees() {
        // using the manager username, pull their company.
        // using their company pull all employees.
        $company = $this->getCompany();

        $this->db->select('users.id, users.username, users.phone, users.email, groups.name');
        $this->db->from('users');
        $this->db->where('groups.name', 'members');
        $this->db->where('groups.name !=', 'managers');
        $this->db->where('groups.name !=', 'admins');
        $this->db->where('users.company', $company);
        $this->db->join('users_groups', 'users.id = users_groups.user_id');
        $this->db->join('groups','users_groups.group_id = groups.id');
        
        $query = $this->db->get();
        
        $result = $query->result_array();

        // Now we need to get all the employees that have schedules for today

        //echo "<pre>" . print_r($result, true) . "</pre>";
        return $result;

    }
    
    function getEmployees() {
        $this->db->select('users.id, users.username, groups.name');
        $this->db->from('users');
        $this->db->where('groups.name','members');
        $this->db->join('users_groups','users.id = users_groups.user_id');
        $this->db->join('groups','users_groups.group_id = groups.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function deleteEmployee($id) {
        
        $this->db->where('id', $id);
        if($this->db->delete('users')) {
            return true;
        }

        return false;
    }


}
