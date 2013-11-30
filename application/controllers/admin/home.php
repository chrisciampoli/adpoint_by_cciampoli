<?php

class Home extends Admin_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        echo "You made it!";
    }
    
}