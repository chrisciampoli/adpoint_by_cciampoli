<?php

class Home extends Manager_Controller {
    
    public $title = 'Managers Section';
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    function index() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/index', $data);
    }
    
    function employees() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/employees', $data);
    }
    
    function settings() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/settings', $data);
    }
    
}