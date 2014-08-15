<?php

class Mdl_schedule extends CI_Model {
    //changes
    function __construct() {
        parent::__construct();
    }
    
    /**
     * TODO: Move this to employees model
     */
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
    
    function getRequests($company) {
        // first select all from requests
        $this->db->select('*');
        $this->db->where('company',$company);
        $this->db->where('status !=', 'denied');
        $this->db->where('status !=', 'scheduled');
        $query = $this->db->get('requests');
        $requests = $query->result_array();
        
        //echo "<pre>" . print_r($requests, true) . "</pre>";die();

        return $requests;
        
    }
    
    function postRequest($requester_id, $target_id, $location, $date, $shift, $company) {
        $data = array(
            'requester_id'=>$requester_id,
            'target_id'=>$target_id,
            'location'=>$location,
            'date'=>$date,
            'shift'=>$shift,
            'status'=>'pending',
            'company'=>$company
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

    function swapSchedules($id) {
        // Grab request
        $this->db->select('*');
        $this->db->where('id',$id);
        $query = $this->db->get('requests');
        $request = $query->result_array();
        // Grab schedules
        $this->db->select('username');
        $this->db->where('id',$request[0]['requester_id']);
        $query = $this->db->get('users');
        $requestor = $query->row('username');
        $query->free_result();

        $this->db->select('username');
        $this->db->where('id',$request[0]['target_id']);
        $query = $this->db->get('users');
        $target = $query->row('username');

        echo $target . "<br/>";
        echo $requestor . "<br/>";

        $target_schedule = $this->getSchedule($target) ? $this->getSchedule($target) : 'No schedule found for target';
        $requestor_schedule = $this->getSchedule($requestor) ? $this->getSchedule($requestor) : 'No schedule found for requestor';

        echo "<pre>" . print_r($target_schedule, true) . "</pre>";
        echo "<pre>" . print_r($requestor_schedule, true) . "</pre>";

        die();


        // Update requester by removing it from the array

        // Update target by removing it from the array

        // Submit both back to the db
    }
    
}
