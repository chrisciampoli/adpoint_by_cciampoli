<?php

class Home extends Manager_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    function index() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/index.php', $data);
    }
    
    function employees() {
        $this->load->view('manager/employees');
    }
    
    function week() {
        $this->load->view('manager/week.php');
    }
    
    function month() {
        $this->load->view('manager/month.php');
    }
    
}