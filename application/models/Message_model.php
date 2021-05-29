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

	public function get_messages_with_user_details($recipient_email, $all=true)
	{
		if($all==true){
			$query = $this->db->query("SELECT * FROM message INNER JOIN users ON message.recipient_email=users.email WHERE recipient_email = '$recipient_email' ORDER BY date_sent DESC");
		}
		else{
			$query = $query = $this->db->query("SELECT * FROM message INNER JOIN users ON message.recipient_email=users.email WHERE is_read = 0 AND recipient_email = '$recipient_email' ORDER BY date_sent DESC");
		}
		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}

	//?
	public function update_read_status($users_email){
		$this->db->update('message', array('users_email' => $users_email, 'is_read' => 1 ));
	}

}
