<?php

class User_model extends CI_Model {

	//put your code here
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function auth($data) {

		$query1 = $this->db->get_where('member', $data);
		if ($query1->result() != null){
			$res=array('userInfo'=>$query1->result(),'role'=>'member');
			return $res;
		}

		$query1 = $this->db->get_where('parent', $data);
		if ($query1->result() != null){
			$res=array('userInfo'=>$query1->result(),'role'=>'parent');
			return $res;
		}

		$query1 = $this->db->get_where('guide', $data);
		if ($query1->result() != null){
			$res=array('userInfo'=>$query1->result(),'role'=>'guide');
			return $res;
		}

		$res=null;
		return $res;

	}



	public function saveParent($data){
		//set flag in order to avoid showing php errors
		$this->db->db_debug = FALSE;

		$error=null;

		if (!$this->db->insert('parent', $data)){
			$error=$this->db->error();
		}

		return $error;

	}

	public function saveStudent($data){
		//set flag in order to avoid showing php errors
		$this->db->db_debug = FALSE;

		$error=null;

		if (!$this->db->insert('member', $data)){
			$error=$this->db->error();
		}

		return $error;

	}


	public function valid_Email($email) {
		$query = $this->db->get_where('member', array('email' => $email));
		if ($query->result()!=null)
			return FALSE;

		$query = $this->db->get_where('parent', array('email' => $email));
		if ($query->result()!=null)
			return FALSE;

		$query = $this->db->get_where('guide', array('email' => $email));
		if ($query->result()!=null)
			return FALSE;

		return TRUE;
	}


}
