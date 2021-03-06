<?php

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        redirect('/');
    }

    /**
     * Global Login function to log user in and direct to proper area
     *
     * @return void
     * @author Jonathan Johnson
     **/
    function login() {
        if($_POST) {   //clean public facing app input
            $identity = $this->input
                ->post('identity', true);
            
            $password = $this->input
                ->post('password', true);

            //Ion_Auth Login fun
            if($this->ion_auth->login($identity,$password)) {

                //capture the user
                $user = $this->ion_auth_model->user()->row();
                echo "<pre>" . print_r($user,true) . "</pre>";
                $user_groups = $this->ion_auth->get_users_groups($user->id)->result();
               
                if($user_groups[1]) {
                    $user->group = $user_groups[1]->name;
                } else {
                    $user->group = $user_groups[0]->name;    
                }
                
                if($user->group == "members") $user->group = 'user';
                redirect($user->group.'/home');

                /*redirect to the proper home
                  controller using the user
                  groups as folder names */
            }
            else {

                // set error flashdata
                $this->session->set_flashdata(
                    'error',
                    'Your login attempt failed.'
                );

                redirect('/');
            }
        }
        redirect('/');
    }

    /**
     * Global logout function to destroy user session
     *
     * @return void
     * @author Jonathan Johnson
     **/
    function logout() {   //Basic Ion_Auth Logout function
        $this->ion_auth->logout();
        redirect('/');
    }

}
