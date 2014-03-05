<?php

class Home extends Admin_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    function index() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('admin/index.php', $data);
    }
    
    function week() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('admin/week.php');
    }
    
    function month() {
        $this->load->view('admin/month.php');
    }
    
}