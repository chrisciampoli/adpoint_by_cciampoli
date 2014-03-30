<?php

class Home extends Manager_Controller {
  
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }
    
    function index() {
        $data['scripts'][] = 'https://code.jquery.com/jquery-1.10.2.min.js';
        $data['scripts'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js';
        $data['scripts'][] = 'http://code.jquery.com/ui/1.10.4/jquery-ui.js';
        $data['scripts'][] = base_url('public/js/main.js');
        $data['scripts'][] = base_url('public/js/docs.js');
        
        $data['styles'][] =  base_url('public/css/dashboard.css');
        $data['styles'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css';
        $data['styles'][] = 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css';
        $data['styles'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css';
        $data['title'] = 'Dashboard';
        $data['head'] = $this->load->view('manager/head', $data, true);
        $data['nav'] = $this->load->view('manager/navigation/nav','',true);
        $data['content'] = $this->load->view('manager/pages/dashboard',$data,true);
        $data['script_loader'] = $this->load->view('manager/scripts',$data,true);
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/wrapper', $data);
    }
    
    function employees() {
        
        $data['title'] = 'Employees';
        
        $data['scripts'][] = 'https://code.jquery.com/jquery-1.10.2.min.js';
        $data['scripts'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js';
        $data['scripts'][] = 'http://code.jquery.com/ui/1.10.4/jquery-ui.js';
        $data['scripts'][] = base_url('public/js/employees.js');
        $data['scripts'][] = base_url('public/js/docs.js');
        
        $data['styles'][] =  base_url('public/css/dashboard.css');
        $data['styles'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css';
        $data['styles'][] = 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css';
       
        $employees = $this->getCompanyEmployees();
        
        $data['name'] = $this->session->userdata('username');
        $data['employees'] = $employees;

        $data['head'] = $this->load->view('manager/head', $data, true);
        $data['nav'] = $this->load->view('manager/navigation/nav','',true);
        $data['content'] = $this->load->view('manager/pages/employees2',$data,true);
        $data['script_loader'] = $this->load->view('manager/scripts',$data,true);
        
        $this->load->view('manager/wrapper', $data);
        
        
    }
    
    function settings() {
        $this->load->view('manager/head');
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/settings', $data);
    }

    public function getCompanyEmployees() {
        // using the manager username, pull their company.
        // using their company pull all employees.
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

        $this->db->select('username, phone, email');
        $this->db->where('company',$company);
        $query = $this->db->get('users');

        $result = $query->result_array();

        //echo "<pre>" . print_r($result, true) . "</pre>";
        return $result;

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