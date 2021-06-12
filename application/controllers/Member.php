<?php


class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member_model');
		$this->load->model('Guide_model');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function members_list()
	{
		$type=$this->session->role;
		$email=$this->session->user->email;

		switch($type) {
			case '2': // Guide
				$agegrade_id=$this->Guide_model->get_agegrade_by_email($email);
				$members=$this->Member_model->get_members_by_agegrade($agegrade_id);		
				break;

			case '3': // Parent
				$members=$this->Member_model->get_members_by_parent($email);
				break;		
		}
		
		
		echo json_encode($members);
	}

	public function pending_members()
	{
		$guide_email=$this->session->user->email;
		$agegrade_id=$this->Guide_model->get_agegrade_by_email($guide_email);
		$pending_members=$this->Member_model->get_pending_members($agegrade_id);
		echo json_encode($pending_members);
	}

	public function try_view()
	{
		$this->load->view('tryapprove');
	}

	public function approve_members()
	{
		$data= $this->input->post('users_email');
		$updated_data = array(
			'users_email'=>$data,
			'pending'=>0
		);
		$this->Member_model->update_member_status($updated_data);
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.office365.com',
			'smtp_user' => 'mta-bnei-akiva@outlook.com',
			'smtp_pass' => 'bneiakiva123',
			'smtp_crypto' => 'tls',
			'newline' => "\r\n",
			'smtp_port' => 587,
			'mailtype' => 'html'
		];
		$this->load->library('email', $config);

		$this->email->from('mta-bnei-akiva@outlook.com', 'bnei-akiva');
		$this->email->to($data);
		$this->email->subject('אישור הצטרפותך כחבר תנועת הנוער בני עקיבא');
		$message = "<a href='.site_url().'/user/do_login/'>לחץ כאן</a> בקשתך התקבלה, ברוכה הבאה לבני עקיבא:)";
		$this->email->message(($message));

		$sent = $this->email->send();
		echo json_encode(array('success' => true));
//		echo $this->email->print_debugger();
//		if($sent){
//			echo 'yay';
//		}
//		else{
//			echo 'nay';
//		}
//		redirect('');
	}
}
