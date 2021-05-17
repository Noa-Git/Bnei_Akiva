<?php

class User extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function login($data = array('error' => null)) {
        $this->load->view('templates/loginAndRegisterHead');
        $this->load->view('login+register/login', $data);
    }

    public function do_login() {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );

        $check = $this->User_model->auth($data);
        if ($check == null) {
            $data['error'] = 'הפרטים שהקשת אינם נכונים. נסה שנית';
            $this->login($data);
        } else {

            $data['user'] = $check;
            $data['loggedin'] = '1';
            $data['role'] = $check->role_id;
            $this->session->set_userdata($data);

            if ($data['role'] == 4) {
                echo 'Member Dashboard';
            }
            if ($data['role'] == 3) {
                echo 'Parent Dashboard';
            }
            if ($data['role'] == 2) {
                echo 'Guide Dashboard';
            }
        }
    }

    public function loadRegisterParent($error = null) {
        $this->load->view('templates/loginAndRegisterHead');
        $this->load->view('login+register/signup-parent');
    }

    public function loadRegisterStudent($data = array('mailExists' => 'no')) {
        $this->load->view('templates/loginAndRegisterHead');
        $this->load->view('login+register/signup-student', $data);
    }

    public function regitserParent() {

        $this->load->model('User_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->reset_validation();
        $this->form_validation->set_rules('pfName', 'שם פרטי', 'required|callback_validate_alpha_input');
        $this->form_validation->set_rules('plName', 'שם משפחה', 'required|callback_validate_alpha_input');
        $this->form_validation->set_rules('parentPhone', 'טלפון', 'required|numeric');
        $this->form_validation->set_rules('parentEmail', 'אימייל', 'required|callback_validate_parentEmailExists');

        $this->form_validation->set_message('required', 'יש למלא את שדה {field} ');
        $this->form_validation->set_message('numeric', 'השדה {field} חייב לכלול מספרים בלבד');

//        $this->form_validation->set_rules('parentEmail', 'parentEmail',
//                array('required', array($this->User_model, 'valid_Email')));
//
        if ($this->form_validation->run() == FALSE) {
            $this->loadRegisterParent();
        } else {

            $data = array(
                'fname' => $this->input->post('pfName'),
                'lname' => $this->input->post('plName'),
                'phone' => $this->input->post('parentPhone'),
                'email' => $this->input->post('parentEmail'),
                'password' => $this->input->post('password'),
                'city' => $this->input->post('city'),
                'street' => $this->input->post('street'),
                'house_number' => $this->input->post('house'),
                'role_id' => 3
                    //zip?
            );

            $error = $this->User_model->saveParent($data);
            if ($error) {
                $this->loadRegisterParent();
            } else {
                $this->loadRegisterStudent();
            }
        }
    }

    public function clear_field_data() {
        //test
        $this->_field_data = array();
        return $this;
    }

    public function regitserStudent($data = array('user' => null)) {

        $this->load->model('User_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('studEmail', 'studEmail',
                array('required', array($this->User_model, 'valid_Email')));

        if ($this->form_validation->run() == FALSE) {
            $data = array('mailExists' => 'yes');
            $this->loadRegisterStudent($data);
        } else {

            $data = array(
                'id' => $this->input->post('studID'),
                'fname' => $this->input->post('sfName'),
                'lname' => $this->input->post('slName'),
                'phone' => $this->input->post('studentPhone'),
                'gender' => $this->input->post('studentSex'),
                'email' => $this->input->post('studEmail'),
                'password' => $this->input->post('password'),
                'birth_day' => $this->input->post('bday'),
                'parent_email' => $this->input->post('parentEmail'),
                'ageGrade_name' => $this->input->post('shevet'),
            );

            $error = $this->User_model->saveStudent($data);
            if ($error) {
                $this->loadRegisterStudent($error);
            } else {
                $this->load->view('templates/loginAndRegisterHead');
                $data = array('parentEmail' => $this->input->post('parentEmail'));
                $this->load->view('login+register/endOfRegisteration', $data);
            }
        }
    }

    public function regitserOneMoreStudent($data = array('user' => null)) {
        $data['mailExists'] = 'no';
//                        echo set_value('parentEmail');
        $this->loadRegisterStudent($data);
    }

    public function loadRegistrationComplete($data = array()) {
        $this->load->view('templates/loginAndRegisterHead');
        $this->load->view('login+register/registrationComplete', $data);
    }

    public function send_members_for_approval() {
        //get all members from DB
        $data['members'] = $this->Member_model->get_members();

        foreach ($data['members'] as $member) {
            if ($member->pending == TRUE) {
                $this->load->view();
            }
        }
    }

    public function validate_alpha_input($names) {

//        if ($names == NULL) {
//            $this->form_validation->set_message('validate_alpha_input', 'יש למלא את שדה {field}');
//            return FALSE;
//        }
        $names = str_replace(' ', '', $names);
        if (!preg_match('/[^א-ת]/', $names)) { // '/[^a-z\d]/i' should also work.
            return TRUE;
        } else {
            $this->form_validation->set_message('validate_alpha_input', 'השדה {field} יכול להיות בעברית בלבד');
            return FALSE;
        }
    }

    public function validate_parentEmailExists($email) {

        $this->form_validation->set_rules('parentEmail', 'parentEmail',
                array('required', array($this->User_model, 'valid_Email')));

        $emailExists = $this->User_model->valid_Email($email);
        if ($emailExists == FALSE) {
            $this->form_validation->set_message('validate_parentEmailExists', 'כתובת האימייל כבר קיימת במערכת');
            return FALSE;
        }
        return TRUE;
    }

}
