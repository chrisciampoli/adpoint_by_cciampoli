<?php

class Home extends User_Controller {
    
    function __constructor() {
        parent::_constructor();
    }
    
    function index() {
        $this->load->view('user/index.php');
    }
    
    function about() {
        
    }
    
    function contact() {
        
    }
    
}
