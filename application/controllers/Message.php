<?php


class Message extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Message_model');
		$this->load->library('session');

	}

	public function send_message()
	{
		$users_email = $this->session->users_email;
		$data = array(
			'recipient_email' => $this->input->post('recipient_email'),
			'sent_from' => $this->input->post($users_email),
			'subject' => $this->input->post('subject'),
			'content' => $this->input->post('content')
		);

		$error = $this->Message_model->send($data);
		if ($error) {
			echo json_encode(array('error' => true,'db_error' => $error['message']));
			return;
		}
	}

	public function display_message()
	{
		$users_email=$this->session->users_email;
		$out=$this->Message_model->get_messages($users_email);
		return $out;
	}
}
