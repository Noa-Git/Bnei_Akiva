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

        //By Mor
        	public function do_meeting()
	{
		$data=array(
			'booker_email' => $this->input->post('booker_email'), //or  seesion?
                    	'guide_email' => $this->input->post('guide_email'),
			'subject' => $this->input->post('subject'),
			'date' => $this->input->post('date'),
		);
                
		$error = $this->Calender_model->save_meeting($data);
                if ($error) {
			echo json_encode(array('error' => true,'db_error' => $error['message']));
			return;
		}
 
                else
                {
		$data2=array(
			'recipient_email' => $this->input->post('guide_email'),
                    	'sent_from' => $this->input->post('booker_email'),
			'subject' => "קביעת פגישה",
                        'content' => $this->input->post('subject'),
                    
		);
                $error= $this->Message_model->send($data2);
                 if ($error) {
			echo json_encode(array('error' => true,'db_error' => $error['message']));
			return;
		}
                }
                		echo json_encode(array('success' => true));

	}
        
        //By mor
           public function approve_meeting()
        {
               $id = $this->input->post('id');
               $newdata=array(
			'booked' => $this->input->post('booked'),
		);
               
               $error = $this->Calender_model->update($id, $newdata);
		if ($error) {
			$errors = array('error' => true,'db_error' => $error);
			echo json_encode($errors);
			return;
		}

		echo json_encode(array('success' => true));
	}
        
  
       
        


}
