<?php

class Guide extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Guide_model');
        $this->load->model('Parents_model');
        $this->load->library('session');
    }

    public function add_expanse() {
        $guide_email = $this->session->users_email;
        $data = array(
            $this->input->post($guide_email),
            'edate' => $this->input->post('edate'),
            'ename' => $this->input->post('ename'),
            'price' => $this->input->post('price'),
            'pic' => $this->input->post('pic'), //??
            'description' => $this->input->post('description')
        );
        $this->Guide_model->save_expense($data);
    }

    public function expanse_report() {
        $guide_email = $this->session->user->email;
		$data['monthly_expanses'] =$this->Guide_model->get_expanses_per_month($guide_email);
//		print_r($data);
		$this->load->view('guide/statstics.php', $data);
    }

//    public function dashboard() {
//        $this->load->view('Instructor/homepage.php');
//    }

    //By Mor
    //return fname, lname, email for the Guides of his children
    public function get_guides_by_parent_email() {
        
        $parent_email=$this->input->post('parent_email');
        
        //looking for his children 
        $res = $this->Parents_model->get_children($parent_email);
        //taking only there agegredes
        $agegrades=array();
        foreach ($res as &$child) {
            $agegrades[$child->agegrade_id]= $child->agegrade_id;
        }
        //looking for guides deatls - fname, lname, and email;
        $guides=array();
            foreach ($agegrades as &$value) {
                $res=$this->Guide_model->get_guides_by_agegrade_id($value);
                foreach ($res as $i)
                {
                   $guides[]=array($i->fname,$i->lname,$i->email); 
                }
                
            }
                    //return json_encode($guides);
                    echo json_encode($guides);
         
            
        
    
        }
        
 
    }


