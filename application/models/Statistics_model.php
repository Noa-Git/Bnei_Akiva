<?php


class Statistics_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}

	public function get_expanses_per_month()
	{
		$error = null;
		$query = $this->db->query('SELECT MONTHNAME(edate) as months_name, sum(price) as expanse FROM expanse where guide_id = ? AND edate IS NOT NULL and YEAR(edate)=YEAR(CURRENT_DATE()) GROUP BY months_name DESC');

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}


}
