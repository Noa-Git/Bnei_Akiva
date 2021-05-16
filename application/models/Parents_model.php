<?php


class Parents_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_price_list()
	{
		$query = $query = $this->db->get('price_list');
		return $query->result();
	}

	public function save_payment($data)
	{

		$error = null;

		if (!$this->db->insert('payment', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}

	public function save_health_declare($data)
	{

		$error = null;

		if (!$this->db->insert('health_declare', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}

}
