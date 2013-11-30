<?php

class Home extends User_Controller {
    
    function __constructor() {
        parent::_constructor();
    }
    
    function index() {
        echo "Welcome User";
    }
    
}
