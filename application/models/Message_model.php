<?php


class Message_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}

	//add message
	public function save($data)
	{

		$error = null;

		if (!$this->db->insert('message', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}

	public function get_messages($user_email)
	{
		$sql = 'SELECT sent_from, subject, content, date_sent FROM message WHERE user_email= ? ';

		$error = null;
		$query = $this->db->query($sql, array($user_email));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

}
