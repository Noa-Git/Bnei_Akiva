<?php

class Form extends CI_Controller {


	public function index() {
		$this->load->model('User_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('parentPhone', 'parentPhone',
			array('required', array($this->Login_model, 'valid_phone')));

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/loginAndRegisterHead');
			$this->load->view('login+register/register');
		} else {

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
				$this->index($error);
			} else {
				$data['loggedin']='1';
				$data['message']='User Registered successfuly';
				$data['code']=1;

				$this->load->view('formsuccess');
			}
		}
	}

}
