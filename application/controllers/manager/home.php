<?php

class Home extends Manager_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    function index() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/head');
        $this->load->view('manager/index', $data);
        $this->load->view('footer');
    }
    
    function employees() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/head');
        $this->load->view('manager/employees', $data);
        $this->load->view('footer');
    }
    
    function settings() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/head');
        $this->load->view('manager/settings', $data);
        $this->load->view('footer');
    }
    
}