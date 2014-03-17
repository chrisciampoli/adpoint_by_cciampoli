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
        $this->load->view('admin/week.php', $data);
    }
    
    function month() {
        $data['name'] = $this->session->userdata('username');
        $this->load->view('admin/month.php', $data);
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
                  "date"=>"11/3/2014",
                  "title"=>"Starbucks: College",
                  "color"=>"#333",
                  "content"=>"4:30PM - 10:30PM"
              ),
              array(
                  "date"=>"12/3/2014",
                  "title"=>"Starbucks: College",
                  "color"=>"#333",
                  "content"=>"4:30PM - 10:30PM"
              ),
              array(
                  "date"=>"13/3/2014",
                  "title"=>"Starbucks: College",
                  "color"=>"#333",
                  "content"=>"4:30PM - 10:30PM"
              )
          ))
        );
    
        if($this->db->insert('schedules',$data)){
            echo "Insert successful";
        }
    }
    
}