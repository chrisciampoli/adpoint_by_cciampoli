<?php

class Home extends User_Controller {
    
    function __constructor() {
        parent::_constructor();
        $this->load->library('session');
    }
    
    function index() {
        $this->load->model('mdl_schedule');
        $data['employees'] = $this->mdl_schedule->getEmployees();
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
        
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('username',$username);
        $query = $this->db->get();
        
        if($query->num_rows() > 0) {
            $row = $query->row();
            $requester_id = $row->id;
        }
        
        $target_id = implode(',',$this->input->post('target_id'));
        $location = $this->input->post('location');
        $date = $this->input->post('date');
        $shift = $this->input->post('shift');
        
        if(is_null($username)){
            return false;
        }
        
        $this->load->model('mdl_schedule');
        
        $message = $this->mdl_schedule->postRequest($requester_id, $target_id, $location, $date, $shift);
        
        if($message){
            echo json_encode(array('status'=>'succes','message'=>'Success'));
            return;
        } else {
            echo json_encode(array('status'=>'failure','message'=>'Request posted failed'));
            return;
        }
    }
    
    function updateSchedule($username = null, $schedule = null) {
        $username = $this->session->userdata('username');
        $schedule = $this->getSchedule($username);
        // json decode the schedule element to edit see getSchedule commented out code
        
    }
    
    public function getRequests() {
        $this->load->model('mdl_schedule');
        $results = $this->mdl_schedule->getRequests();
        $cleaned = array();
        foreach($results as $request) {
            foreach(explode(',',$request['target_id']) as $var) {
                $this->db->select('username');
                $this->db->from('users');
                $this->db->where('id',$var);
                $query = $this->db->get();
                $result = $query->row();
                
                echo "ID: " . $request['id'] . "<br/>";
                $cleaned[] = $request['id'];
                
                echo "Target: " . $result->username . "<br/>";
                $cleaned[] = $result->username;
                
                $this->db->select('username');
                $this->db->from('users');
                $this->db->where('id',$request['requester_id']);
                $query = $this->db->get();
                $result = $query->row();
                
                echo "Requester: " . $result->username . "<br/>";
                $cleaned[] = $result->username;
                
                echo "Date: " . $request['date'] . "<br/>";
                $cleaned[] = $request['date'];
                
                echo "Shift: " . $request['shift'] . "<br/>";
                $cleaned[] = $request['shift'];
                
                echo "Status: " . $request['status'] . "<br/>";
                $cleaned[] = $request['status'];
                
                echo "<hr>";
            }
            
        }
        echo "<pre>" . print_r($cleaned, true) . "</pre>";
       
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
                  "date"=>"22/3/2014",
                  "title"=>"Starbucks: College - Cashier",
                  "color"=>"#333",
                  "content"=>"6:30PM - 10:30PM"
              ),
              array(
                  "date"=>"23/3/2014",
                  "title"=>"Starbucks: College - Barista",
                  "color"=>"#333",
                  "content"=>"2:30PM - 10:30PM"
              ),
              array(
                  "date"=>"24/3/2014",
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
