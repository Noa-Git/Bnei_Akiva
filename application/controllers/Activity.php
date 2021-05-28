<?php


class Activity extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Activity_model');
		$this->load->library('session');
		$this->load->helper('form');
	}

	//display_next_activities_and_its_rate
	public function activities()
	{
		$guide_email=$this->session->user->email;
		//echo "console.log(".print_r($guide_email).")";
		$data=$this->input->post();
		if($data['all']=='true'){
			$out=$this->Activity_model->get_all_activities_with_rate($guide_email);
			
		}
		else{
			$out=$this->Activity_model->get_top_3_activities_by_desc_order($guide_email);
		}
		
		echo json_encode($out);
//		return $out;
	}

	public function add_activity()
	{
		$type = $this->session->type;
		$users_email = $this->session->user->email;
		$time = $this->input->post('date').' '.$this->input->post('time').':00';
		// $time = date_create_from_format("Y-M-j H:i", $this->input->post('date').' '.$this->input->post('time') );
		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'time' => $time ,
			'guide_email' => $this->session->user->email
		);

		$error = $this->Activity_model->save_activity($data);
		if ($error) {
			echo json_encode(array('error' => true,'db_error' => $error['message']));
			return;
		}
		echo json_encode(array('success' => true));
	}

	public function save_form()
	{
		$this->load->view('form');
	}

	//add_after_summary_and_send_notifications
	public function add_summary()
	{
		$data=array(
			'id'=>$this->input->post('id'),
			'after_summary'=>$this->input->post('after_summary'),
			'num_participates'=>$this->input->post('num_participates')
		);

		$error = $this->Activity_model->update($data);
		if ($error) {
			$errors = array('error' => true,'db_error' => $error);
			echo json_encode($errors);
			return;
		}

		echo json_encode(array('success' => true));

		//send_notifications ???
	}

	public function substitutes()
	{
		$guide_email=$this->session->users_email;

		$data=$this->input->post();
		if($data['all']=='TRUE'){
			$out=$this->Activity_model->get_substitute_by_agegrade_order_by_activity_time_DESC($guide_email);
		}
		else{
			$out=$this->Activity_model->get_substitute_by_agegrade_order_by_activity_time_DESC_top3($guide_email);
		}
		return $out;
	}

	public function substitute_request()
	{
		$type = $this->session->type;
		$users_email = $this->session->users_email;
		$data = array(
			'id' => $this->input->post('id'),
			'guide_email' => $this->session->users_email
		);

		$error = $this->Activity_model->add_substitute($data);
		if ($error) {
			echo json_encode(array('error' => true,'db_error' => $error['message']));
			return;
		}
	}

	public function change_guide()
	{
		$data=array('guide_email'=>$this->session->users_email);
		$this->Activity_model->update_activity($data);

		$id=$this->input->post('id');
		$this->Activity_model->delete_substitute_by_id($id);
	}

	public function add_rate()
	{
		$data=array(
			'name'=>$this->input->post('name'), //??
			'after_summary'=>$this->input->post('after_summary'),
			'num_participates'=>$this->input->post('num_participates')
		);

		$error = $this->Activity_model->add_rate($data);
		if ($error) {
			$errors = array('error' => true,'db_error' => $error);
			echo json_encode($errors);
			return;
		}

		echo json_encode(array('success' => true));

	}
}
