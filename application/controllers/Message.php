<?php


class Message extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Message_model');
		$this->load->model('User_model');
		$this->load->model('Guide_model');
		$this->load->model('Member_model');
		$this->load->library('session');

	}

	public function send_message()
	{
		$data = array(
			'recipient_email' => $this->input->post('recipient_email'),
			'sent_from' => $this->session->user->fname. ' ' .$this->session->user->lname,
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
		$recipient_email=$this->session->user->email;
		 $is_read=$this->input->post('all');
		 if ($is_read=='true'){
		 	$all= true;
		 }
		 else{
		 	$all=false;
		}
		$out=$this->Message_model->get_messages_with_user_details($recipient_email, $all);
		echo json_encode($out);
		
	}

	public function set_read () {
		$recipient_email=$this->session->user->email;
		$this->Message_model->update_read_status($recipient_email);
	}

	public function check_new() {
		$recipient_email=$this->session->user->email;
		$out=$this->Message_model->get_messages_with_user_details($recipient_email, false);

		$num=array('num'=>count($out));
		echo json_encode($num);
		
	}

	public function send_message_to_all()
	{
		$users_email=$this->session->user->email;
		$agegrade_id=$this->Guide_model->get_agegrade_by_email($users_email);
		$members=$this->Member_model->get_members_by_agegrade($agegrade_id);
		foreach($members as $member) {
			$data = array(
			'recipient_email' => $member->users_email,
			'sent_from' => $this->session->user->fname.' '.$this->session->user->lname,
			'subject' => $this->input->post('subject'),
			'content' => $this->input->post('content')
			);

			$this->Message_model->send($data);
		}
		
	}



}