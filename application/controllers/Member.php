<?php


class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Guide_model');
		$this->load->library('session');
	}

	public function members_list()
	{
		$guide_email=$this->session->users_email;
		$this->Member_model->get_members_list($guide_email);

	}

	public function member_details()
	{
		$users_email=$this->input->post();
		$this->Member_model->get_member($users_email);

	}
}
