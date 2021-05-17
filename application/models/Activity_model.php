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
	public function update_guide_for_activity($activity_id, $user_email)
	{
		$this->db->update('activity', array('user_email' => $user_email, 'activity_id' => $activity_id ));
	}

	public function get_all_activities_with_rate($ageGrade_id)
	{
		$sql = 'SELECT activity.name, AVG(rate.rate) AS rates_avg, activity.time FROM activity INNER JOIN rate ON activity.id=rate.activity_id WHERE activity.ageGrade= ? ';

		$error = null;
		$query = $this->db->query($sql, array($ageGrade_id));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_activity_with_rate_by_id($activity_id)
	{
		$sql = 'SELECT activity.name, AVG(rate.rate) AS rates_avg, activity.time FROM activity INNER JOIN rate ON activity.id=rate.activity_id WHERE activity.activity_id= ? ';

		$error = null;
		$query = $this->db->query($sql, array($activity_id));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_top_3_activities_by_desc_order($ageGrade_id)
	{
		$sql = 'SELECT name, time FROM activity WHERE activity.ageGrade= ? ORDER BY time DESC LIMIT 3';

		$error = null;
		$query = $this->db->query($sql, array($ageGrade_id));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
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
