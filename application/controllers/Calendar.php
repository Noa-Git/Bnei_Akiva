<?php


class Calendar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Calender_model');
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function calendar()
	{
		$guide_email=$this->session->user->email;

		$data=$this->input->post();
		
		if($data['all']=='true'){
			$out=$this->Calender_model->get_meetings_by_guide_email($guide_email);
		}
		
		else{
			$out=$this->Calender_model->get_top3_meetings_by_guide_email($guide_email);
		}

		echo json_encode($out);
	}

	public function insert_time_slots()
	{
		$guide_email=$this->session->user->email;
		$data=array(
			$this->input->post($guide_email),
			'guide_email' => $this->input->post('guide_email'),
			'subject' => $this->input->post('subject'),
			'date' => $this->input->post('date')
		);

		$this->Calender_model->add_time_slot($data);
		return;
	}

	public function schedule_meeting()
	{
		$booker_email=$this->session->users_email;
		$data=array(
			'booker_email'=>$this->input->post($booker_email),
			'booked' => $this->input->post(1)
		);

		$this->Calender_model->update_meeting($data);
	}

}