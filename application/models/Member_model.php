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
		$query = $this->db->query('SELECT * FROM member INNER JOIN users ON member.users_email=users.email where guide_email = ?',array($guide_email));

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	//update pending state
	public function update_member_status($data)
	{
		$this->db->where('users_email', $data['users_email']);
		$this->db->update('member', $data);
	}

	public function get_member($users_email)
	{
		$error = null;
		$query = $this->db->query('SELECT * FROM member INNER JOIN users ON member.users_email=users.email where users_email = ?',array($users_email));

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_members_by_agegrade($agegrade_id)
	{
		$error = null;
		$query = $this->db->query('SELECT * FROM member INNER JOIN users ON member.users_email=users.email where agegrade_id = ?', array($agegrade_id));

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_pending_members($agegrade_id){
		$error = null;
		$query = $this->db->query('SELECT * FROM member INNER JOIN users ON member.users_email=users.email where pending = 1 AND agegrade_id = ?', array($agegrade_id) );

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

}
