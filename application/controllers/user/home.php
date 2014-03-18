<?php

class Home extends User_Controller {
    
    function __constructor() {
        parent::_constructor();
        $this->load->library('session');
    }
    
    function index() {
        //$this->load->model('ion_auth_model', 'auth');
        $this->db->select('users.username, groups.name');
        $this->db->from('users');
        $this->db->join('users_groups','users.id = users_groups.user_id');
        $this->db->join('groups','users_groups.group_id = groups.id');
        $query = $this->db->get();
        $data['employees'] = $query->result_array();
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
       /* 
       //echo print_r(json_decode($schedule[0]["schedule"], true), true);
        foreach(json_decode($schedule[0]["schedule"], true) as $day){
            echo $day['date'] . "<br/>";
        }
        */
        echo json_encode($schedule);
        
        return $schedule;
        
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
        $username = $this->session->userdata('username');
        $schedule = $this->getSchedule($username);
        // json decode the schedule element to edit see getSchedule commented out code
        
    }
    
     public function insert() {
        
        /*
         * 
         * 
        {
            date: "11/3/2014",
            title: "Starbucks: College",
            color: "#333",
            content: '4:30PM - 10:30PM'
        },
        {
            date: "12/3/2014",
            title: "Starbucks: College",
            color: "#333",
            content: '6:30PM - 10:30PM'
        },
        {
            date: "13/3/2014",
            title: "Starbucks: College",
            color: "#333",
            content: '5:30PM - 10:30PM'
        }
         */
        $data = array(
          'user'=>$this->session->userdata('username'),
          'schedule'=>json_encode(array(
              array(
                  "date"=>"17/3/2014",
                  "title"=>"Starbucks: College - Cashier",
                  "color"=>"#333",
                  "content"=>"6:30PM - 10:30PM"
              ),
              array(
                  "date"=>"18/3/2014",
                  "title"=>"Starbucks: College - Barista",
                  "color"=>"#333",
                  "content"=>"2:30PM - 10:30PM"
              ),
              array(
                  "date"=>"19/3/2014",
                  "title"=>"Starbucks: College - Barista",
                  "color"=>"#333",
                  "content"=>"2:30PM - 10:30PM"
              )
          ))
        );
    
        if($this->db->insert('schedules',$data)){
            echo "Insert successful";
        }
    }
    
}
