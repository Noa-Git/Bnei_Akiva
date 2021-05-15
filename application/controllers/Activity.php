<?php


class Activity extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Activity_model');
		$this->load->library('session');
	}

	public function add_activity()
	{
		
	}

	public function display_next_activities_and_its_rate()
	{
	}

	public function add_after_summary_and_send_notifications()
	{
	}

	public function ask_for_substitute()
	{
	}

	public function change_guide()
	{
	}

	public function add_rate()
	{
	}
}
