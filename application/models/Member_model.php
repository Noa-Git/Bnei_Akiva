<?php


class Member_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}

	public function get_members($ageGrade_id)
	{
		$data = array('ageGrade_id' => $ageGrade_id);
		$query = $this->db->get_where('member', $data);
		return $query->result();
	}

	//??
	public function update_pending_state($data, $users_email)
	{
		$this->db->update('member', $data, array('user_email' => $users_email));
	}

	public function get_member($users_email)
	{
		$data = array('users_email' => $users_email);
		$query = $this->db->get_where('member', $data);
		return $query->result();
	}

}
