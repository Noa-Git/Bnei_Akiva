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

	//update when guide is replaced or when after_summary is updated
	public function update($data)
	{
		$error = null;

		if ($this->db->update('activity', $data)) {
			$error = $this->db->error();
		}
		return $error;

	}

	public function get_all_activities_with_rate($guide_email)
	{
		$sql = 'SELECT *,  (select AVG(rate.rate) from activity INNER JOIN rate ON activity.id = rate.activity_id) AS rates_avg FROM activity WHERE activity.guide_email= ? ';
		$error = null;
		$query = $this->db->query($sql, array($guide_email));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_activity_with_rate_by_id($activity_id)
	{
		$sql = 'SELECT *, AVG(rate.rate) AS rates_avg FROM activity INNER JOIN rate ON activity.id=rate.activity_id WHERE activity.activity_id= ? ';

		$error = null;
		$query = $this->db->query($sql, array($activity_id));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_top_3_activities_by_desc_order($guide_email)
	{
		$sql = 'SELECT * FROM activity WHERE guide_email= ? AND time >= CURRENT_DATE ORDER BY time ASC LIMIT 3';
		$error = null;
		$query = $this->db->query($sql, array($guide_email));
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

	public function get_health_declare_by_activity($activity_id)
	{
		$query = $this->db->query("SELECT * FROM health_declare WHERE activity_id='$activity_id'");
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function add_rate($data)
	{
		$error = null;

		if (!$this->db->insert('rate', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}

	public function get_participants_per_activity($guide_email)
	{
		$error = null;
		$query = $this->db->query('SELECT activity.name, num_participants, count(rate) as num_rates FROM activity INNER JOIN rate where guide_email = ? GROUP BY activity.name');

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function add_substitute($data)
	{
		$error = null;

		if (!$this->db->insert('substitute', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}

	public function get_substitute_by_agegrade_order_by_activity_time_DESC_top3($guide_email)
	{
		$error = null;
		$query = $this->db->query('SELECT * FROM substitute INNER JOIN activity ON substitute.activityid=activity.id where guide_email = ? ORDER BY activity.time DESC LIMIT 3');

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_substitute_by_agegrade_order_by_activity_time_DESC($guide_email)
	{
		$error = null;
		$query = $this->db->query('SELECT * FROM substitute INNER JOIN activity ON substitute.activityid=activity.id where guide_email = ? ORDER BY activity.time DESC');

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function delete_substitute_by_id($id)
	{
		$this->db->delete('substitute', array('id' => $id));
	}

	public function get_agegrade_by_activity_id($activity_id)
	{
		$error = null;
		$query = $this->db->query("SELECT agegrade_id FROM activity WHERE id = '$activity_id'");
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

}
