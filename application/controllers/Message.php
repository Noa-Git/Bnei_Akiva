<?php


class Message extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Message_model');
		$this->load->model('User_model');
		$this->load->library('session');

	}

	public function send_message()
	{
		$users_email=$this->session->users->email;
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

	public function get_message()
	{
		$recipient_email=$this->session->users->email;
		$is_read=$this->input->post('is_read');
		if ($is_read==1){
			$all= true;
		}
		else{
			$all=false;
		}
		$out=$this->Message_model->get_messages_with_user_details($recipient_email, $all);
		json_encode($out);
	}
}
