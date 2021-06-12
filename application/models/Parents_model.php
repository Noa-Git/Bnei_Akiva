<?php

class Parents_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->db_debug = FALSE;
    }

    public function get_price_list() {
        $query = $query = $this->db->get('price_list');
        return $query->result();
    }



    public function get_payment($parent_email) {

        $sql = 'SELECT * FROM payment WHERE parent_email=?';

        $error = null;
        $query = $this->db->query($sql, array($parent_email));
        if ($query) {
            return $query->result();
        }
        $error = $this->db->error();
        return $error;
    }

    //by Mor
    //getting email of parents
    //return all his chilld 
    public function get_children($parent_email) {

        $sql = 'SELECT * from users INNER JOIN memberwhere users.email=member.users_email and member.parent_email= ?';

        $error = null;
        $query = $this->db->query($sql, array($parent_email));
        if ($query) {
            return $query->result();
        }
        $error = $this->db->error();
        return $error;
    }


    public function get_guides_by_parent($email)
	{
		$error = null;
		$query = $this->db->query('SELECT DISTINCT email,lname,fname,phone,name,grade FROM users INNER JOIN guide ON users.email=guide.users_email INNER JOIN member ON guide.agegrade_id=member.agegrade_id INNER JOIN parent ON member.parent_email=parent.users_email INNER JOIN agegrade ON member.agegrade_id=agegrade.id where member.parent_email = ?', array($email));

		if ($query) {
			return $query->result();
		}
		$error = $this->db->error();
		return $error;
	}






}