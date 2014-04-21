<?php

class Home extends Manager_Controller {
  
    
    function __construct() {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('url');

        $this->load->library('session');
        $this->load->model('mdl_employees');
        $this->load->model('mdl_schedule');
    }
    
    function index() {
        $data['scripts'][] = 'https://code.jquery.com/jquery-1.10.2.min.js';
        $data['scripts'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js';
        $data['scripts'][] = 'http://code.jquery.com/ui/1.10.4/jquery-ui.js';
        $data['scripts'][] = base_url('public/js/main.js');
        $data['scripts'][] = base_url('public/js/docs.js');
        
        $data['styles'][] =  base_url('public/css/dashboard.css');
        $data['styles'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css';
        //$data['styles'][] = base_url('public/css/bootstrap.css');
        $data['styles'][] = 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css';
        $data['styles'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css';
        $data['title'] = 'Dashboard';
        $data['head'] = $this->load->view('manager/head', $data, true);
        $data['nav'] = $this->load->view('manager/navigation/nav','',true);
        $data['content'] = $this->load->view('manager/pages/dashboard',$data,true);
        $data['script_loader'] = $this->load->view('manager/scripts',$data,true);
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/wrapper', $data);
    }
    
    function employees() {
        
        $data['title'] = 'Employees';
        
        $data['scripts'][] = 'https://code.jquery.com/jquery-1.10.2.min.js';
        $data['scripts'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js';
        $data['scripts'][] = 'http://code.jquery.com/ui/1.10.4/jquery-ui.js';
        $data['scripts'][] = base_url('public/js/employees.js');
        $data['scripts'][] = base_url('public/js/docs.js');
        $data['scripts'][] = base_url('public/js/bic_calendar.js');
        
        $data['styles'][] =  base_url('public/css/dashboard.css');
        $data['styles'][] = 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css';
        //$data['styles'][] = base_url('public/css/bootstrap.css');
        $data['styles'][] = 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css';
       
        $employees = $this->getCompanyEmployees();
        
        $data['name'] = $this->session->userdata('username');
        $data['employees'] = $employees;

        $data['head'] = $this->load->view('manager/head', $data, true);
        $data['nav'] = $this->load->view('manager/navigation/nav','',true);
        $data['content'] = $this->load->view('manager/pages/employees2',$data,true);
        $data['script_loader'] = $this->load->view('manager/scripts',$data,true);
        
        $this->load->view('manager/wrapper', $data);
        
        
    }
    
    function settings() {
        $this->load->view('manager/head');
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/settings', $data);
    }

    public function getCompanyEmployees() {
    
        $result = $this->mdl_employees->getCompanyEmployees();

        return $result;

    }
    
    /*
     * Ajax Functions
     */
    public function ajaxGetEmployees() {
        
        $results = array();
        $this->db->select('first_name, last_name, email, phone');
        $query = $this->db->get('users');
        foreach($query->result_array() as $row) {
            $results[] = $row;
           
        }
        $response['status'] = 'Success';
        $response['message'] = $results;
        echo json_encode($response);
        exit();
    }
    
    public function ajaxPostEmployee() {
        
//validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true)
        {
            $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $email    = strtolower($this->input->post('email'));
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'company'    => $this->mdl_employees->getCompany(),
                'phone'      => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
        {
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            echo json_encode(array(
                  'status'=>'success',
                  'errors'=>$this->session->flashdata('message')
                 ));
            return true;
        }
        else
        {
            //display the create user form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            echo json_encode(array(
                  'status'=>'failure',
                  'errors'=>$this->data['message']
                 ));
            return false;
        }
    }
    
    public function ajaxRemoveEmployee() {
        echo json_encode($response);
        exit();
    }
    
    public function ajaxUpdateEmployee() {
        echo json_encode($response);
        exit();
    }

    public function ajaxPostSchedule() {
        $username = $this->input->post('username');
        $schedule = $this->input->post('schedule');
        $this->mdl_schedule->postSchedule($username, $schedule);
        return true;
    }

    public function ajaxGetSchedule($username = null) {
        
        $username = $this->input->post('username');

        if($username == null) {
            return false;
        }
        
        $schedule = $this->mdl_schedule->getSchedule($username);
       /* 
       //echo print_r(json_decode($schedule[0]["schedule"], true), true);
        foreach(json_decode($schedule[0]["schedule"], true) as $day){
            echo $day['date'] . "<br/>";
        }
        */
        echo json_encode($schedule[0]["schedule"]);
        
        return $schedule;
    }
    
}