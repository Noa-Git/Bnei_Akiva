<?php


class Member_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}

	public function get_members_list($guide_email)
	{
		$error = null;
		$query = $this->db->query('SELECT * FROM member INNER JOIN users ON member.users_email=users.email where guide_email = ?');

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	//update pending state, insurance, trips and membership payments
	public function update_member($data)
	{
		$this->db->update('member', $data);
	}

	public function get_member($users_email)
	{
		$error = null;
		$query = $this->db->query('SELECT * FROM member INNER JOIN users ON member.users_email=users.email where users_email = ?');

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_members_by_agegrade($agegrade_id)
	{
		$error = null;
		$query = $this->db->query("SELECT * FROM member where agegrade_id = '$agegrade_id'");

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

}
