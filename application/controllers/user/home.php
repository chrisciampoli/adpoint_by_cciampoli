<?php

class Home extends User_Controller {
    
    function __constructor() {
        parent::_constructor();
        $this->load->library('session');
    }
    
    function index() {
        $this->load->view('user/index.php');
    }
    
    function about() {
        
    }
    
    function contact() {
        
    }
    
    function getSchedule($username = null) {
        
        $username = $this->session->userdata('username');
        
        $this->load->model('mdl_schedule');
        
        if($username == null) {
            return false;
        }
        $schedule = $this->mdl_schedule->getSchedule($username);
        if(!$schedule) {
            
        } else {
            
        }
    }
    
}
