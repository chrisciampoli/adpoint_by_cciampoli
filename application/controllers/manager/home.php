<?php

class Home extends Manager_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->view('manager/head');
        $this->load->database();
    }
    
    function index() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/index', $data);
    }
    
    function employees() {
        $data['script'] = base_url('public/js/employees.js');
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/employees', $data);
    }
    
    function settings() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/settings', $data);
    }
    
    /*
     * Ajax Functions
     */
    public function ajaxGetEmployees() {
        
        $query = $this->db->get('users');
        foreach($query->result_array() as $row) {
            $results['first_name'][] = $row['first_name'];
            $results['last_name'][]  = $row['last_name'];
            $results['email'][]      = $row['email'];
        }
        
        $response['status'] = 'Success';
        $response['message'] = $results;
        echo json_encode($response);
        exit();
    }
    
    public function ajaxCreateEmployee() {
        echo json_encode($response);
        exit();
    }
    
    public function ajaxRemoveEmployee() {
        echo json_encode($response);
        exit();
    }
    
    public function ajaxUpdateEmployee() {
        echo json_encode($response);
        exit();
    }
    
}