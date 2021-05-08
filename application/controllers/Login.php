<?php

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');

	}

	public function index($data = array('error' => null))
	{
		$this->load->view('templates/loginAndRegisterHead');
		$this->load->view('login+register/loginAndRegister', $data);
	}

	public function do_login()
	{
		$data = array(
			'phone' => $this->input->post('phone'),
			'password' => $this->input->post('password')

		);

		$check = $this->Login_model->auth($data);

		if ($check == null) {
			$data['error'] = 'הפרטים שהקשת אינם נכונים. נסה שנית';
			$this->login($data);
		} else {
			$check[0]->loggedin = '1';
			$this->session->set_userdata((array)$check[0]);
			$this->session->unset_userdata('password');
			if ($this->session->has_userdata('referrer')) {
				redirect($this->session->referrer);
			} else {
				redirect("Guide/home");
			}
		}
	}


	public function save_parent()
	{

		$data = array(
			'fname' => $this->input->post('pfName'),
			'lname' => $this->input->post('plName'),
			'phone' => $this->input->post('parentPhone'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'city' => $this->input->post('city'),
			'street' => $this->input->post('street'),
			'house' => $this->input->post('house'),
			'apartment' => $this->input->post('apartment'),
		);

		$error = $this->Login_model->save($data);

		if ($error) {
			echo json_encode(array('error' => true, 'db_error' => $error['message']));
			return;
		} else {
			echo json_encode(array('success' => true));
		}

	}
}

