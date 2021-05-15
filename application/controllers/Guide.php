<?php


class GuideDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Guide_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
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
