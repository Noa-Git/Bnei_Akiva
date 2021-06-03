<?php

class Guide_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->db_debug = FALSE;
    }

    public function save_expense($data) {

        $error = null;

        if (!$this->db->insert('expanse', $data)) {
            $error = $this->db->error();
        }
        return $error;
    }

    public function get_expanses_per_month($guide_email) {
        $error = null;
        $query = $this->db->query('SELECT MONTHNAME(edate) as months_name, sum(price) as expanse FROM expanse where guide_email = ? AND edate IS NOT NULL and YEAR(edate)=YEAR(CURRENT_DATE()) GROUP BY months_name DESC');

        if ($query) {
            return $query->result();
        }
        $error = $this->db->error();
        return $error;
    }

    public function get_expanses_by_time_DESC($guide_email) {
        $error = null;
        $query = $this->db->query('SELECT * FROM expanse WHERE guide_email = ? ORDER BY edate DESC');
        if ($query) {
            return $query->result();
        }
        $error = $this->db->error();
        return $error;
    }

    public function get_agegrade_by_email($email) {

        $query = $this->db->get_where('guide', array('users_email' => $email));

        if ($query) {
            return $query->result()[0]->agegrade_id;
        }
        $error = $this->db->error();
        return $error;
    }

    //written by Mor
    public function get_guides_by_member($member_email) {
        $error = null;
        $sql = 'select users.fname
from users inner join guide
where users.email=guide.users_email and guide.agegrade_id=
(select member.agegrade_id
from users INNER join member
where users.email=?)';
        $query = $this->db->query($sql, array($member_email));

        if ($query)
            return ($query->result());

        $error = $this->db->error();
        return $error;
    }

    //written by Mor
    //get agegrade id
    //return all the guides of this Shevet
    public function get_guides_by_agegrade_id($agegrade_id) {
        $error = null;
        $sql = 'select *
from users inner join guide
where users.email=guide.users_email AND guide.agegrade_id= ?';
        $query = $this->db->query($sql, array($agegrade_id));

        if ($query)
            return ($query->result());

        $error = $this->db->error();
        return $error;
    }

}
