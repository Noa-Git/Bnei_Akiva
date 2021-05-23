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
		$guide_email=$this->session->users_email;
		$data=array(
			$this->input->post($guide_email),
			'edate' => $this->input->post('edate'),
			'ename' => $this->input->post('ename'),
			'price' => $this->input->post('price'),
			'pic' => $this->input->post('pic'), //??
			'$guide_email' => $this->input->post($guide_email),
			'description' => $this->input->post('description')
		);
		$this->Guide_model->save_expense($data);
	}

	public function expanse_report()
	{
		$guide_email=$this->session->users_email;
		$this->Guide_model->get_expanses_by_time_DESC($guide_email);
	}

	public function dashboard()
	{
		$this->load->view('Instructor/homepage.php');
	}
}