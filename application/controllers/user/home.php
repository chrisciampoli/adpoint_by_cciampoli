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
        
        echo json_encode($schedule);
        
        return;
        
    }
    
    function postSchedule($username = null, $schedule = null) {
        $username = $this->session->userdata('username');
        $schedule = json_decode($this->input->post('schedule'));
        if($this->mdl_schedule->postSchedule(json_encode($schedule))) {
            echo json_encode(array('status'=>'success', 'message'=>'schedule saved'));
            return;
        } else {
            echo json_encode(array('status'=>'failure', 'message'=>'schedule could not be saved!'));
            return;
        }
    }
    
}
