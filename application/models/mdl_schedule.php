<?php

class Mdl_schedule extends CI_Model {
    //changes
    function __construct() {
        parent::__construct();
    }
    
    function getEmployees() {
        $this->db->select('users.id, users.username, groups.name');
        $this->db->from('users');
        $this->db->where('groups.name','members');
        $this->db->join('users_groups','users.id = users_groups.user_id');
        $this->db->join('groups','users_groups.group_id = groups.id');
        $query = $this->db->get();
        return $query->result_array();
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
    
    function getRequests() {
        // first select all from requests
        $query = $this->db->get('requests');
        $requests = $query->result_array();
        
        return $requests;
        
    }
    
    function postRequest($requester_id, $target_id, $location, $date, $shift, $company) {
        $data = array(
            'requester_id'=>$requester_id,
            'target_id'=>$target_id,
            'location'=>$location,
            'date'=>$date,
            'shift'=>$shift,
            'status'=>'pending'
        );
        
        if($this->db->insert('requests',$data)) {
            return true;
        } else {
            return false;
        }
    }

    function updateRequest($id, $status) {
        $data = array(
            'status'=>$status
        );
        $this->db->where('id',$id);
        if($this->db->update('requests',$data)) {
            return true;
        } else {
            return false;
        }

    }
    
    function postSchedule($username, $schedule) {
        
        $this->db->select('id');
        $this->db->where('user',$username);
        $query = $this->db->get('schedules');
        $row = $query->row();

        $id = $row->id;

        $data = array(
          'user'=>$username,
          'schedule'=>json_encode($schedule)
        );

        if($id) {
            $this->db->where('id',$id);
            if( $this->db->update('schedules',$data) ) {
                return true;
            } else {
                return false;
            }
        } else {

            if( $this->db->insert('schedules',$data )) {
                return true;
            } else {
                return false;
            }

        }
    }
    
}
