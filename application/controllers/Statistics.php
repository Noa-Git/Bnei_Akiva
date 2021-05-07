<?php


class Statistics extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Statistics_model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function show_stat()
	{
		if ($this->session->loggedin == null) {
			$this->session->set_userdata('referrer', uri_string());
			redirect("Main/login");
		}
		$id = $this->session->id;
		$data['name'] = $this->session->fname;
		$data['monthly_expanses'] = $this->Statistics_model->get_expanses_per_month($id);
		$this->load->view('dashboard/statistics', $data);

	}


}
