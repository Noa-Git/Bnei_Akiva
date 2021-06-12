<?php


class Parents extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Message_model');
		$this->load->model('Parents_model');
		$this->load->model('Member_model');
		$this->load->model('Activity_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function dashboard() {
		if ($this->session->loggedin == null || $this->session->role!=3){
    		redirect("User/login");
		}
		$data['greeting_name']=$this->session->user->fname;
        $this->load->view('parent/homepageParent.php', $data);
    }

	public function display_price_list()
	{
		$out=$this->Message_model->get_price_list();
		return $out;
	}

	//paypal api???
	public function pay()
	{
		$member_email=$this->input->post('member_email');

		$data = array(
			$this->input->post("payment") => 1
		);

		$this->Member_model->update($member_email, $data);
		echo json_encode(array('success' => true));
	}

	public function fill_health_declare()
	{
		$data = array(
			'activity_id' => $this->input->post('activity_id'),
			'member_email' => $this->input->post('email')
		);

		$error = $this->Activity_model->save_health_declare($data);
		if ($error) {
			echo json_encode(array('error' => true,'db_error' => $error['message']));
			return;
		}
		echo json_encode(array('success' => true));

	}

	public function get_guides()
	{
		$email=$this->session->user->email;

		$guides=$this->Parents_model->get_guides_by_parent($email);

		echo json_encode($guides);
		
	}


	

}