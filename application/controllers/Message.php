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
	}

	public function display_message()
	{
	}
}
