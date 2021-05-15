<?php


class Activity_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}

	public function save($data) {

		$error = null;

		if (!$this->db->insert('activity', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}







}
