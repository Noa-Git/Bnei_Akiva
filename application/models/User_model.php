<?php

class User_model extends CI_Model {

	//put your code here
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function auth($data) {

		$query1 = $this->db->get_where('users', $data);
		if ($query1->result() != null)
                {
			$res=$query1->row();
			return $res;
                }

		return NULL;

	}

	public function saveUser($data){
		//set flag in order to avoid showing php errors
		$this->db->db_debug = FALSE;

		$error=null;

		if (!$this->db->insert('users', $data)){
			$error=$this->db->error();
		}
		return $error;

	}

	public function saveParent($data){
		//set flag in order to avoid showing php errors
		$this->db->db_debug = FALSE;

		$error=null;

                $users_email=array('users_email'=>$data['email']);
		if (!$this->db->insert('parent', $users_email)){
			$error=$this->db->error();
		}
		return $error;

	}



        	public function saveMember($data){
		$this->db->db_debug = FALSE;

		$error=null;

		if (!$this->db->insert('member', $data)){
			$error=$this->db->error();
		}
		return $error;

	}
       

	public function valid_Email($email) {
		$query = $this->db->get_where('users', array('email' => $email));
		if ($query->result()!=null){
        return FALSE;}

		return TRUE;
	}

    public function find_name_agegrade($name)
	{
		$this->db->select('id');
		$this->db->from('agegrade');
		$this->db->where('name', $name);
		$query = $this->db->get();
			return $query->row();

	}


	
}