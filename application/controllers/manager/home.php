<?php

class Home extends Manager_Controller {

    public $request_count;
    public $company;
    public $settings;
    public $display_name;
    
    function __construct() {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('url');

        $this->load->library('session');
        $this->load->model('mdl_employees');
        $this->load->model('mdl_schedule');
        $this->load->model('mdl_company_settings');
        //
        $this->company = $this->mdl_employees->getCompany();
        $this->request_count = count($this->mdl_schedule->getRequests($this->company));
        $this->settings = $this->getSettings($this->company);
        $this->display_name = (isset($this->settings[0]['company_name']) ? $this->settings[0]['company_name'] : 'Swift Shifts');
    }
    
    function index() {
       
        $data['scripts'][] = base_url('public/js/view/manager/dashboard.js');
        $data['scripts'][] = base_url('public/js/libs/docs.js');
        
        $data['styles'][] =  base_url('public/css/dashboard.css');
        $data['styles'][] =  base_url('public/css/yeti.css');
        $data['styles'][] = 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css';
        
        $data['company'] = $this->company;
        $data['request_count'] = $this->request_count;

        $data['title'] = 'Dashboard';
        $data['head'] = $this->load->view('manager/head', $data, true);
        $data['display_name'] = $this->display_name;
        $data['nav'] = $this->load->view('manager/navigation/nav',$data,true);
        $data['content'] = $this->load->view('manager/pages/dashboard',$data,true);
        $data['script_loader'] = $this->load->view('manager/scripts',$data,true);
        $data['name'] = $this->session->userdata('username');
        $this->load->view('manager/wrapper', $data);
    }
    
    function employees() {
        
        $data['title'] = 'Employees';
        
        $data['scripts'][] = base_url('public/js/view/manager/employees.js');
        $data['scripts'][] = base_url('public/js/libs/docs.js');
        $data['scripts'][] = base_url('public/js/libs/bic_calendar.js');
        
        $data['styles'][] =  base_url('public/css/dashboard.css');
        $data['styles'][] = base_url('public/css/yeti.css');
        $data['styles'][] = 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css';
       
        $employees = $this->getCompanyEmployees();
        
        $data['name'] = $this->session->userdata('username');
        $data['employees'] = $employees;
        $settings = $this->getSettings($this->company);
        
        if(empty($settings)) {
            $data['shifts'] = '{"result":"empty"}';
            $data['locations'] = '{"result":"empty"}';
        } else {
            
            if($settings[0]['shifts'] != "false") {
                $data['shifts'] = $settings[0]['shifts'];
            } else if($settings[0]['shifts'] == "false") {
                $data['shifts'] = '{"result":"empty"}';
            }

            if($settings[0]['locations'] != 'false') {
                $data['locations'] = $settings[0]['locations'];
            } else if($settings[0]['locations'] == 'false') {
                $data['locations'] = '{"result":"empty"}';
            }

        }

        $data['company'] = $this->company;
        $data['request_count'] = $this->request_count;
        $data['display_name'] = $this->display_name;
        $data['head'] = $this->load->view('manager/head', $data, true);
        $data['nav'] = $this->load->view('manager/navigation/nav',$data,true);
        $data['content'] = $this->load->view('manager/pages/employees2',$data,true);
        $data['script_loader'] = $this->load->view('manager/scripts',$data,true);
        
        $this->load->view('manager/wrapper', $data);
        
        
    }
    
    function settings() 
    {
        $data['title'] = 'Settings';
        
        // View JS
        $data['scripts'][] = base_url('public/js/view/manager/settings.js');

        // Modules
        $data['scripts'][] = base_url('public/js/modules/utilities/ajax.js');
        $data['scripts'][] = base_url('public/js/modules/company/settings/locations.js');
        $data['scripts'][] = base_url('public/js/modules/company/settings/shifts.js');
        $data['scripts'][] = base_url('public/js/modules/company/settings/settings.js');
        
        $data['styles'][] =  base_url('public/css/dashboard.css');
        $data['styles'][] = base_url('public/css/yeti.css');
        $data['styles'][] = 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css';
        
        $data['name'] = $this->session->userdata('username');
        $data['company'] = $this->company;
        $data['request_count'] = $this->request_count;
        $data['settings'] = $this->getSettings($this->company);
        
        if(empty($data['settings'])) {
            $data['shifts'] = '{"result":"empty"}';
            $data['locations'] = '{"result":"empty"}';
        } else {
            
            if($data['settings'][0]['shifts'] != "false") {
                $data['shifts'] = $data['settings'][0]['shifts'];
            } else if($data['settings'][0]['shifts'] == "false") {
                $data['shifts'] = '{"result":"empty"}';   
            }

            if($data['settings'][0]['locations'] != 'false') {
                $data['locations'] = $data['settings'][0]['locations'];
            } else if($data['settings'][0]['locations'] == 'false') {
                $data['locations'] = '{"result":"empty"}';
            }

        }

        $data['display_name'] = $this->display_name;
        $data['head'] = $this->load->view('manager/head', $data, true);
        $data['nav'] = $this->load->view('manager/navigation/nav',$data,true);
        $data['content'] = $this->load->view('manager/pages/settings',$data,true);
        $data['script_loader'] = $this->load->view('manager/scripts',$data,true);
        
        $this->load->view('manager/wrapper', $data);
    }

    function swift_giveup()
    {
        $data['title'] = 'Swift Giveup Management';

        $data['scripts'][] = base_url('public/js/view/manager/swift_giveup.js');

        $data['styles'][] = base_url('public/css/yeti.css');
        $data['styles'][] = 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css';
        
        $data['username'] = $this->session->userdata('username');

        $company = $this->mdl_employees->getCompany();
        $data['requests'] = $this->getRequests($company);
        $data['request_count'] = count($data['requests']);
        $data['head'] = $this->load->view('manager/head',$data, true);
        $data['display_name'] = $this->display_name;
        $data['nav'] = $this->load->view('manager/navigation/nav',$data,true);
        $data['content'] = $this->load->view('manager/pages/swift_giveup', $data, true);
        $data['script_loader'] = $this->load->view('manager/scripts',$data,true);

        $this->load->view('manager/wrapper',$data);
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
        
        $id = $this->input->post('id');
        
        if($this->mdl_employees->deleteEmployee($id)) {
            $response = json_encode(array());
            return $response;
        }


        $response = json_encode(array(
                'status'=>'Failure',
                'message'=>'Could not delete record'
            ));
        echo json_encode($response);
        
        exit();
    }
    
    public function ajaxUpdateEmployee() {
        echo json_encode($response);
        exit();
    }

    function ajaxUpdateRequest() 
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if($this->mdl_schedule->updateRequest($id, $status)) {
            if($status == 'scheduled') {
               $this->mdl_schedule->swapSchedules($id);
            } 
            echo json_encode(array('status'=>'success','message'=>'request updated'));
            return true;
        } else {
            echo json_encode(array('status'=>'failure','message'=>'could not update request'));
            return false;
        }
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

    public function getRequests() {
        $this->load->model('mdl_schedule');
        $this->load->model('mdl_employees');
        $company = $this->mdl_employees->getCompany();
        $results = $this->mdl_schedule->getRequests($company);
        $cleaned = array();
        $count = 0;
        foreach($results as $request) {
            foreach(explode(',',$request['target_id']) as $var) {
                $this->db->select('username');
                $this->db->from('users');
                $this->db->where('id',$var);
                $query = $this->db->get();
                $result = $query->row();
                
                //echo "ID: " . $request['id'] . "<br/>";
                $cleaned[$count]['id'] = $request['id'];
                
                //echo "Target: " . $result->username . "<br/>";
                $cleaned[$count]['target'] = $result->username;
                
                $this->db->select('username');
                $this->db->from('users');
                $this->db->where('id',$request['requester_id']);
                $query = $this->db->get();
                $result = $query->row();
                
                //echo "Requester: " . $result->username . "<br/>";
                $cleaned[$count]['requester'] = $result->username;
                
                //echo "Date: " . $request['date'] . "<br/>";
                $cleaned[$count]['date'] = $request['date'];
                
                //echo "Shift: " . $request['shift'] . "<br/>";
                $cleaned[$count]['shift'] = $request['shift'];
                
                //echo "Status: " . $request['status'] . "<br/>";
                $cleaned[$count]['status'] = $request['status'];
                
                //echo "<hr>";
                $count++;
            }
            
        }
        
       return $cleaned;
    }

    function ajaxPostSettings() {
         $data = array(
            'company'=>$this->company,
            'company_name'=>$this->input->post('company_name'),
            'admin_email'=>$this->input->post('admin_email'),
            'locations'=>json_encode($this->input->post('locations')),
            'shifts'=>json_encode($this->input->post('shifts'))
        );

        $this->mdl_company_settings->saveSettings($data);

        $settings = $this->getSettings($this->company);

        $this->display_name = $settings[0]['company_name'];

         $response = json_encode(array(
                'status'=>'success',
                'message'=>'Settings saved successfully'
                ));
            echo $response;

        return;
    }

    function ajaxPostShift() {
        $company = $this->company;
        $data = array('shifts'=>json_encode($this->input->post('shifts')));
        $this->mdl_company_settings->updateSettings($company, $data);
        echo json_encode(array('status'=>'success','record'=>$this->input->post('new_shift')));
    }

    function ajaxDeleteShift() {
        $company = $this->company;
        $data = array('shifts'=>json_encode($this->input->post('shifts')));
        $this->mdl_company_settings->updateSettings($company, $data);
        echo json_encode(array('status'=>'success','message'=>'Shift Deleted'));
    }

    function ajaxPostLocation() {
        $company = $this->company;
        $data = array('locations'=>json_encode($this->input->post('locations')));
        $this->mdl_company_settings->updateSettings($company, $data);
        echo json_encode(array('status'=>'success','record'=>$this->input->post('new_location')));
    }

    function ajaxDeleteLocation() {
        $company = $this->company;
        $data = array('locations'=>json_encode($this->input->post('locations')));
        $this->mdl_company_settings->updateSettings($company, $data);
        echo json_encode(array('status'=>'success','message'=>'Locations Deleted')); 
    }

    function getSettings($company)
    {
        return $this->mdl_company_settings->getSettings($company);
    }

    function putSettings()
    {
        $this->mdl_company_settings->updateSettings($company, $data);
    }
    
}