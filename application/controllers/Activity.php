<?php


class Activity extends CI_Controller
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

	public function display_next_activity()
	{
		$this->load->view('templates/login+loginAndRegisterHead');
		$id = $this->session->id;
		$data['next_activity_is'] = $this->Guide_model->get_next_activity($id);
		//for member and parent too
		$this->load->view('guide_dashboard/home', $data);
	}

	public function add_activity()
	{
		$this->load->view('activity/add');
		$this->load->view('assets/css/add_activity.css');
	}

	public function save_activity($data)
	{
		$this->form_validation->reset_validation();
		$this->form_validation->set_rules('time', 'time', 'required');
		$this->form_validation->set_rules('street', 'street', 'required');
		$this->form_validation->set_rules('num', 'num', 'required|numeric');

		if ($this->form_validation->run() == false){
			$errors = array(
				'error' => true,
				'time_error' => form_error('time'),
				'street_error' => form_error('street'),
				'num_error' => form_error('num'),
			);
			echo json_encode($errors);
			return;
		}
		//preparing data for db
		$id = $this->session->id;
		$data = array(
			'ttime' => $this->input->post('time'),
			'street' => $this->input->post('street'),
			'street_num' => $this->input->post('num'),
			'guide_id' => $id
		);

		$error = $this->Activity_model->save($data);
		if ($error) {
			$errors = array('error' => true,'db_error' => $error);
			echo json_encode($errors);

		} else {

			echo json_encode(array('success' => true));
		}
	}



}
