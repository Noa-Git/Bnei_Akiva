<?php


class GuideDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}


	public function display_activity(){
		$this->load->view('templates/login+loginAndRegisterHead');
		$id = $this->session->id;
		$data['next_activity_is'] = $this->Guide_model->get_next_activity($id);
		$this->load->view('guide_dashboard/home', $data);
	}

	public function show_stat()
	{
		$data['monthly_expanses'] = $this->Guide_model->get_expanses_per_month($id);
		$data['name'] = $this->session->fname;
		$this->load->view('guide_dashboard/statistics', $data);
	}

//	public function show_pending_members(){
//	}

}
