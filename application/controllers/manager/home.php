<?php

class Home extends Manager_Controller {
    
    public $title = '';
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $data['styles'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css';
        $data['styles'][] = 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css';
        
        $data['title'] = $this->title;
        $this->load->view('manager/head', $data);
    }
    
    function index() {
        $data['styles'][] =  base_url('public/css/dashboard.css');
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/index', $data);
    }
    
    function employees() {
        
        $this->title = 'Employees';
        
        $data['scripts'][] = 'https://code.jquery.com/jquery-1.10.2.min.js';
        $data['scripts'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js';
        $data['scripts'][] = 'http://code.jquery.com/ui/1.10.4/jquery-ui.js';
        $data['scripts'][] = base_url('public/js/employees.js');
        $data['scripts'][] = base_url('public/js/docs.js');
        
        $data['styles'][] =  base_url('public/css/dashboard.css');
        
        
        $data['nav'] = $this->load->view('manager/navigation/nav','',true);
        $data['content'] = $this->load->view('manager/employees2',$data,true);
        $data['script_loader'] = $this->load->view('manager/scripts',$data,true);
        
        $data['name'] = $this->session->userdata('username');
        
        $this->load->view('manager/wrapper', $data);
        
        
    }
    
    function settings() {
        $this->load->view('manager/head');
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