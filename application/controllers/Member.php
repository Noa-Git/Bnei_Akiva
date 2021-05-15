<?php


class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Guide_model');
		$this->load->library('session');
	}

	public function display_members_list()
	{

	}

	public function display_member_details()
	{

	}
}
