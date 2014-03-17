<?php

class Mdl_schedule extends CI_Model {
    //changes
    function __construct() {
        parent::__construct();
    }
    
    function getSchedule($username) {
        $this->db->select('schedule');
        $this->db->where('user',$username);
        $query = $this->db->get('schedules');
        $result = $query->result_array();
        if($result) {
            return $result;
        } else {
            return false;
        }
    }
    
    function postSchedule($username, $schedule) {
        $data = array(
          'user'=>$username,
          'schedule'=>$schedule
        );
        if($this->db->insert('schedules',$data)) {
            return true;
        } else {
            return false;
        }
    }
    
}
