<?php

class Main_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->db_debug = FALSE;
	}

	public function save_parent($data)
	{
		$error = null;
		if (!$this->db->insert('parent', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}

	public function save_member($data)
	{
		$error = null;
		if (!$this->db->insert('member', $data)) {
			$error = $this->db->error();
		}
		return $error;
	}

	public function auth($data)
	{
		$new_data = array('phone' => $data['phone']);
		$pquery = $this->db->get_where('parent', $new_data);
		$mquery = $this->db->get_where('member', $new_data);
		$gquery = $this->db->get_where('guide', $new_data);

		if ($pquery->result() != null) {
			$res = $pquery->result();
			if ($res->password == $data['password']) {
				return $res;
			}
		}
//		elif($mquery->result() != null){
//			$res = $mquery->result();
//			echo $res;
//			if ($res->password == $data['password']) {
//				return $res;
//			}
//		}
		return null;
	}
}
