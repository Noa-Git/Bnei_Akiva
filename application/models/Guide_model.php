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
		$query = $this->db->query("SELECT MONTHNAME(edate) as months_name, sum(price) as expanse FROM expanse where guide_email = '$guide_email' AND edate IS NOT NULL and YEAR(edate)=YEAR(CURRENT_DATE()) GROUP BY months_name DESC");

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_expanses_by_time_DESC($guide_email)
	{
		$sql = 'SELECT * FROM expanse INNER JOIN users ON expanse.guide_email=users.email WHERE guide_email= ? ORDER BY edate DESC';
		$error = null;

		$query = $this->db->query($sql, array($guide_email));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_agegrade_by_email($email) {

		$query=$this->db->get_where('guide', array('users_email'=>$email));

		if ($query) {
			return $query->result()[0]->agegrade_id;
		}
		$error = $this->db->error();
		return $error;
		
	}

	public function get_guide_by_agegrade($agegrade) {

		$query=$this->db->get_where('guide', array('agegrade_id'=>$agegrade));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;

	}



}