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

	public function update_read_status($user_email){
		$this->db->update('activity', array('user_email' => $user_email, 'is_read' => 1 ));
	}

	public function get_unread_messages_by_desc_order($user_email)
	{
		$sql = 'SELECT sent_from, subject, content, date_sent FROM message WHERE is_read=0 AND user_email= ? ORDER BY date_sent DESC';

		$error = null;
		$query = $this->db->query($sql, array($user_email));
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

}
