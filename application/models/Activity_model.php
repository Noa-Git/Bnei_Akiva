<?php


class Activity_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}

	public function save_activity($data)
	{

		$error = null;

		if (!$this->db->insert('activity', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}

	public function save_rate_for_activity($data)
	{

		$error = null;

		if (!$this->db->insert('rate', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}

	//update when guide is replaced
	public function update_guide_for_activity($data, $user_email)
	{
		$this->db->update('activity', $data, array('user_email' => $user_email));
	}

	public function get_activities_and_rate($ageGrade_id)
	{
		$sql = 'SELECT activity.name, rate.rate FROM activity INNER JOIN rate ON activity.id=rate.activity_id WHERE activity.ageGrade= ? ';

		$error = null;
		$query = $this->db->query($sql, array($ageGrade_id));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}


}
