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
	public function update_pending_state($data, $user_email)
	{
		$this->db->update('member', $data, array('user_email' => $user_email));
	}

	public function get_member($user_email)
	{
		$data = array('user_email' => $user_email);
		$query = $this->db->get_where('member', $data);
		return $query->result();
	}

}
