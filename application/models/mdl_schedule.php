<?php

class Mdl_schedule extends CI_Model {
    //changes
    function __construct() {
        parent::__construct();
    }
    
    function getSchedule($username) {
        $query = $this->db->get('schedules');
        if($query) {
            return $query;
        } else {
            return false;
        }
    }
    
}
