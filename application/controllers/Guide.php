<?php


class Guide extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Guide_model');
		$this->load->library('session');
	}

	public function add_expanse()
	{

	}

	public function show_stat()
	{
//		$data['monthly_expanses'] = $this->Guide_model->get_expanses_per_month($id);
//		$data['name'] = $this->session->fname;
//		$this->load->view('guide_dashboard/statistics', $data);
	}

	public function index()
	{
//		$this->load->view('dashboard/statistics', $data);
	}

//	public function show_pending_members()
//{
//	}

}
