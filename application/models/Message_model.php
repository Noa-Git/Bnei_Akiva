<?php


class Message_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}

	public function send($data)
	{

		$error = null;

		if (!$this->db->insert('message', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}

	public function get_messages($users_email)
	{
		$sql = 'SELECT * FROM message WHERE users_email= ? ';

		$error = null;
		$query = $this->db->query($sql, array($users_email));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	public function update_read_status($users_email){
		$this->db->update('message', array('users_email' => $users_email, 'is_read' => 1 ));
	}

	public function get_unread_messages_by_desc_order($users_email)
	{
		$sql = 'SELECT * FROM message WHERE is_read=0 AND users_email= ? ORDER BY date_sent DESC';

		$error = null;
		$query = $this->db->query($sql, array($users_email));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

}
