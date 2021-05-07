<?php

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('templates/login+registerCss');
		$this->load->view('login+register/login+register');
//		$this->load->view('login+register/registrationComplete'); auth
	}

	//preparing data for db
	public function parent_register($data)
	{
//		$this->form_validation->reset_validation();
//		$this->form_validation->set_rules('fname', 'first name', 'required|callback_validate_alpha_input');
//		$this->form_validation->set_rules('lname', 'last name', 'required|callback_validate_alpha_input');
//		$this->form_validation->set_rules('phone', 'phone number', 'required|numeric|min_length[10]');
//		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
//		$this->form_validation->set_rules('password', 'password', 'required|min_length[4]');

		$data = array(
			'fname' => $this->input->post('pfName'),
			'lname' => $this->input->post('plName'),
			'phone' => $this->input->post('parentPhone'),
			'email' => $this->input->post('email'),
			'city' => $this->input->post('city'),
			'street' => $this->input->post('street'),
			'house' => $this->input->post('house'),
			'apartment' => $this->input->post('apartment'),
			'password' => $this->input->post('ppassword'),
		);
		$error = $this->Main_model->save_parent($data);
	}

	public function member_register()
	{
		$data = array(
			'gender' => $this->input->post('memberSex'),
			'fname ' => $this->input->post('mfName'),
			'lname ' => $this->input->post('mlName'),
			'id' => $this->input->post('memID'),
			'birth_day' => $this->input->post('bday'),
			'phone' => $this->input->post('memberPhone'),
		);
		$error = $this->Main_model->save_member($data);
	}

	public function login()
	{
		$data = array(
			'phone' => $this->input->post('phone'),
			'ppasword' => $this->input->post('password'),
		);
		$check = $this->Main_model->auth($data);
		if ($check == null) {
			$data['error'] = 'Wrong user name or password';
			$this->login($data);
		} else {

			$check[0]->loggedin = '1';
			$this->session->set_userdata((array)$check[0]);
			$this->session->unset_userdata('password');
		}
	}

	public function email_verification(){
		$this->load->library('email');
		$this->email->from('mta-bnei-akiva@mta.ac.il', 'mta-bnei-akiva');
		$this->email->to($this->input->post('user_email'));
		$this->email->subject('Verification of your account');
		$message = "
		<p>Hi ".$this->input->post('user_name')."</p>
		<p>So happy your are one of us now:).</p> 
		<p>Please click <a href='".base_url()."register/verify_email/".$verification_key."'>here</a> to verify your account.</p>
		<p>Thanks,</p>
		";
		$this->email->message($message);
		$this->email->send();
	}
}
