<?php

class Home extends User_Controller {
    
    function __constructor() {
        parent::_constructor();
        $this->load->library('session');
    }
    
    function index() {
        $data['username'] = $this->session->userdata('username');
        $this->load->view('user/index.php',$data);
    }
    
    function getSchedule($username = null) {
        
        $username = $this->session->userdata('username');
        $this->load->model('mdl_schedule');
        
        if($username == null) {
            return false;
        }
        
        $schedule = $this->mdl_schedule->getSchedule($username);
        //echo print_r(json_decode($schedule[0]["schedule"], true), true);
        foreach(json_decode($schedule[0]["schedule"], true) as $day){
            echo $day['date'] . "<br/>";
        }
        echo json_encode($schedule);
        
        return;
        
    }
    
    function postRequest($username = null) {
        
        $username = $this->session->userdata('username');
        
        if(is_null($username)){
            return false;
        }
        
        $this->load->model('mdl_schedule');
        
        if($this->mdl_schedule->postRequest($username, $schedule)){
            
        } else {
            
        }
    }
    
    function updateSchedule($username = null, $schedule = null) {
        $this->db->select('user, schedule');
        $this->db->where('user',$username);
        $query = $this->db->get('schedules');
        foreach($query->result_array as $row) {
            $schedule[] = json_decode($row['schedule']);
        }
        
    }
    
}
