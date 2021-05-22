<?php


class Calender_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}

	public function get_meetings_by_guide_email($guide_email)
	{
		$sql = 'SELECT * FROM meeting WHERE guide_email= ? ORDER BY date DESC';
		$error = null;
		$query = $this->db->query($sql, array($guide_email));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_top3_meetings_by_guide_email($guide_email)
	{
		$sql = 'SELECT * FROM meeting WHERE guide_email= ? ORDER BY date DESC LIMIT 3';
		$error = null;
		$query = $this->db->query($sql, array($guide_email));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_meetings_by_booker_email($booker_email)
	{
		$sql = 'SELECT * FROM meeting WHERE booker_email= ?';
		$error = null;
		$query = $this->db->query($sql, array($booker_email));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function get_meetings_by_id($id)
	{
		$sql = 'SELECT * FROM meeting WHERE id= ?';
		$error = null;
		$query = $this->db->query($sql, array($id));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function add_time_slot($data)
	{
		$error = null;

		if (!$this->db->insert('meeting', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}

	public function update_meeting($data)
	{
		$this->db->update('meeting', $data);
	}
}
