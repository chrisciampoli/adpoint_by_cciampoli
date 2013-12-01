<?php

class Schedules extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        
    }
    
    function available() {
        echo "Available Schedules";
    }
    
    function edit_current($id = null) {
        echo "Edit current schedule";
    }
    
}