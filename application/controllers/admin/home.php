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
        $data = array(
           'user'=>$this->session->userdata('username'),
           'schedule'=>json_encode(array('monday'=>'4pm-6pm','tuesday'=>'6pm-7pm'))
        ); 
        if($this->db->insert('schedules',$data)){
            echo "Insert successful";
        }
    }
    
}