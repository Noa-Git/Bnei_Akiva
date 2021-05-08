<?php

class Login_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function auth($data)
	{

		$query1 = $this->db->get_where('member', $data);
		if ($query1->result() != null)
			return $query1->result();

		$query2 = $this->db->get_where('parent', $data);
		if ($query2->result() != null)
			return $query2->result();

		$query3 = $this->db->get_where('guide', $data);
		if ($query3->result() != null)
			return $query3->result();

		return null;
	}

	public function save($data)
	{
		//set flag in order to avoid showing php errors
		$this->db->db_debug = FALSE;

		$error = null;

		if (!$this->db->insert('parent', $data)) {
			$error = $this->db->error();
		}

		return $error;

	}
}
