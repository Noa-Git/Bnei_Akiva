<?php

class Calendar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Activity_model');
                $this->load->model('Message_model');
                $this->load->model('Calender_model');
		$this->load->library('session');
                $this->load->helper('form');
	}

	public function calendar()
	{
		$email=$this->session->user->email;

		$data=$this->input->post();

		$type=$this->session->role;
		switch($type) {
			case '2':
				if($data['all']=='true'){
					$out=$this->Calender_model->get_meetings_by_guide_email($email);
				}
			
				else{
					$out=$this->Calender_model->get_top3_meetings_by_guide_email($email);
				}
			break;

			case '3':
				$out=$this->Calender_model->get_meetings_by_booker_email($email, $data['all']);
			break;		
		}
		
		

		echo json_encode($out);
	}

	//////////////////////////New/////////////////////////////////////////
	public function parent_meeting()
	{
		$guide_email=$this->session->user->email;

		$data=$this->input->post();
		
		if($data['all']=='true'){
			$out=$this->Calender_model->get_meetings_by_booker_email($booker_email);
		}
		
		else{
			$out=$this->Calender_model->get_top3_meetings_by_guide_email($guide_email);
		}

		echo json_encode($out);
	}
	//////////////////////////New/////////////////////////////////////////


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

        //By Mor
    public function do_meeting()
	{
		$parent_email=$this->session->user->email;
		$guide_email=$this->input->post('guide_email');
		$time = $this->input->post('date').' '.$this->input->post('time').':00';
		$data=array(
			'booker_email'=>$parent_email,
            'guide_email'=> $guide_email,
			
			'subject' => $this->input->post('subject'),
			'date' => $time,
		);
                
		$this->Calender_model->save_meeting($data);
                       
		$data2=array(
			'recipient_email' => $guide_email,
            'sent_from' => $this->session->user->fname. ' '.$this->session->user->lname,
			'subject' => "קביעת פגישה",
            'content' => $this->input->post('subject'),           
		);

        $this->Message_model->send($data2);    
        echo json_encode(array('success' => true));
	}
        
        //By mor
    public function approve_meeting()
    {
        $id = $this->input->post('id');
        $newdata=array('booked' => $this->input->post('booked'));

        $error = $this->Calender_model->update($id, $newdata);
		if ($error) {
			$errors = array('error' => true,'db_error' => $error);
			echo json_encode($errors);
			return;
		}

		echo json_encode(array('success' => true));
	}
        
  
       
        


}