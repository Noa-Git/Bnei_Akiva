<?php

class User extends CI_Controller {
	//put your code here
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	public function login($data=array('error'=>null)){
		$this->load->view('templates/loginAndRegisterHead');
		$this->load->view('login+register/login', $data);

	}

	public function do_login(){
		$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);

		$check=$this->Login_model->auth($data);
		if ($check==null){
			$data['error']='הפרטים שהקשת אינם נכונים. נסה שנית';
			$this->login($data);
		}
		else{
			$data['user']=$check['userInfo'];
			$data['loggedin']='1';
			$data['role']=$check['role'];

			if ($check['role']=='member')
			{
				$this->session->set_userdata($data);
				$this->load->view('dashboard/memberDash');
			}
			if ($check['role']=='parent')
			{
				$this->session->set_userdata($data);
				$this->load->view('dashboard/parentDash');
			}
			if ($check['role']=='guide')
			{
				$this->session->set_userdata($data);
				$this->load->view('dashboard/guideDash');
			}

		}
	}

	public function loadRegisterParent($error=null){
		$this->load->view('templates/loginAndRegisterHead');
		$this->load->view('login+register/signup-parent');

	}
	public function loadRegisterStudent($data=array('mailExists'=>'no')){
		$this->load->view('templates/loginAndRegisterHead');
		$this->load->view('login+register/signup-student' , $data);

	}

	public function regitserParent() {

		$this->load->model('User_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('parentEmail', 'parentEmail',
			array('required', array($this->Login_model, 'valid_Email')));

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
				'house' => $this->input->post('house'),
				'apartment' => $this->input->post('apartment'),
			);

			$error = $this->Login_model->saveParent($data);
			if ($error) {
				$this->loadRegisterParent($error);
			} else {
//            $data['loggedin']='1';
//            $data['message']='User Registered successfuly';
				$this->loadRegisterStudent();

			}
		}

	}

	public function clear_field_data() {
            //test
		$this->_field_data = array();
		return $this;
	}

	public function regitserStudent($data=array('user'=>null)) {

		$this->load->model('User_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('studEmail', 'studEmail',
			array('required', array($this->Login_model, 'valid_Email')));

		if ($this->form_validation->run() == FALSE) {
			$data=array('mailExists'=>'yes');
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

			$error = $this->Login_model->saveStudent($data);
			if ($error) {
				$this->loadRegisterStudent($error);
			} else {
				$this->load->view('templates/loginAndRegisterHead');
				$data=array('parentEmail'=> $this->input->post('parentEmail'));
				$this->load->view('login+register/endOfRegisteration',$data);



			}
		}

	}

	public function regitserOneMoreStudent($data=array('user'=>null)) {
		$data['mailExists']='no';
//                        echo set_value('parentEmail');
		$this->loadRegisterStudent($data);
	}

	public function loadRegistrationComplete($data=array()) {
		$this->load->view('templates/loginAndRegisterHead');
		$this->load->view('login+register/registrationComplete',$data);
	}

}
//$this->form_validation->reset_validation();
//$this->form_validation->set_rules('pfName', 'first name', 'required|callback_validate_alpha_input');
//$this->form_validation->set_rules('plName', 'last name', 'required|callback_validate_alpha_input');
//$this->form_validation->set_rules('parentPhone', 'phone number', 'required|numeric|min_length[10]');
//$this->form_validation->set_rules('parentEmail', 'Email', 'required|valid_email|is_unique[user.email]');
//$this->form_validation->set_rules('city', 'city', 'required|callback_validate_alpha_input');
//$this->form_validation->set_rules('street', 'street', 'required|callback_validate_alpha_input');
//$this->form_validation->set_rules('house_number', 'house_number', 'required|numeric');
//$this->form_validation->set_rules('zipcode', 'zipcode', 'required|numeric|min_length[5]');
//$this->form_validation->set_rules('password', 'password', 'required|min_length[4]');
//$this->form_validation->set_rules('confirmPassword', 'confirm password', 'required|matches[password]');
