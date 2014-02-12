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
        $data['styles'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css';
        $data['styles'][] = 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css';
        $data['styles'][] =  base_url('public/css/dashboard.css');
        $data['scripts'][] = base_url('public/js/employees.js');
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/employees2', $data);
    }
    
    function settings() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/settings', $data);
    }
    
    /*
     * Ajax Functions
     */
    public function ajaxGetEmployees() {
        
        $results = array();
        $this->db->select('first_name, last_name, email, phone');
        $query = $this->db->get('users');
        foreach($query->result_array() as $row) {
            $results[] = $row;
           
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