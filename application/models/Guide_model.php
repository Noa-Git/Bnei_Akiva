<?php


class Guide_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}


	public function save_expense($data)
	{

		$error = null;

		if (!$this->db->insert('expanse', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}

	public function get_expanses_per_month($guide_email)
	{
		$error = null;
		$query = $this->db->query('SELECT MONTHNAME(edate) as months_name, sum(price) as expanse FROM expanse where guide_email = ? AND edate IS NOT NULL and YEAR(edate)=YEAR(CURRENT_DATE()) GROUP BY months_name DESC');

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}


}
