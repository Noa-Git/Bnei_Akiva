<?php


class Parents_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
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

	public function get_payment($parent_email)
	{

		$sql = 'SELECT * FROM payment WHERE parent_email=?';

		$error = null;
		$query = $this->db->query($sql, array($parent_email));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}
}
