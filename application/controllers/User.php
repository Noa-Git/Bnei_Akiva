<?php

class User extends CI_Controller
{

	//put your code here
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Message_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	public function login($data = array('error' => null))
	{
		$this->load->view('templates/loginAndRegisterHead');
		$this->load->view('login+register/login', $data);
	}

	public function logout(){
		 $data = array(
			'user',
			'role',
            'loggedin',
        );
        $this->session->unset_userdata($data);
        $this->login();
	}

	public function do_login()
	{

		$data = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password'))
		);

		$check = $this->User_model->auth($data);
		if ($check == null) {
			$data['error'] = 'הפרטים שהקשת אינם נכונים. נסה שנית';
			$this->login($data);
		} else {

			$data['user'] = $check;
			$data['loggedin'] = '1';
			$data['role'] = $check->role_id;
			$this->session->set_userdata($data);

			if ($data['role'] == 4) {
				echo 'Member Dashboard';
			}
			if ($data['role'] == 3) {
				redirect("Parents/dashboard");
			}
			if ($data['role'] == 2) {
				redirect("Guide/dashboard");
			}
		}
	}







	public function loadRegisterParent($error = null)
	{
		$this->load->view('templates/loginAndRegisterHead');
		$this->load->view('login+register/signup-parent');
	}

	public function loadRegisterStudent($data = array())
	{

		$data = array(
			'parentEmail' => $this->input->post('parentEmail'),
			'house_number' => $this->input->post('house_number'),
			'city' => $this->input->post('city'),
			'street' => $this->input->post('street'),
			'zip_code' => $this->input->post('zip_code'),
		);


		$this->load->view('templates/loginAndRegisterHead');
		$this->load->view('login+register/signup-student', $data);
	}

	public function regitserParent()
	{


		$this->form_validation->reset_validation();
		$this->form_validation->set_rules('pfName', 'שם פרטי', 'required|callback_validate_alpha_input');
		$this->form_validation->set_rules('plName', 'שם משפחה', 'required|callback_validate_alpha_input');
		$this->form_validation->set_rules('parentPhone', 'טלפון', 'required|min_length[5]|max_length[12]|numeric',
			array(
				'max_length' => 'אנא הקלד מספר טלפון בעל 10 ספרות',
				'min_length' => 'אנא הקלד מספר טלפון בעל 10 ספרות'
			)
		);
		$this->form_validation->set_rules('parentEmail', 'אימייל', 'required|valid_email|callback_validate_EmailExists');
		$this->form_validation->set_rules('city', 'עיר', 'required|callback_validate_alpha_input');
		$this->form_validation->set_rules('street', 'רחוב', 'required|callback_validate_alpha_input');
		$this->form_validation->set_rules('street', 'רחוב', 'required|callback_validate_alpha_input');
		$this->form_validation->set_rules('house_number', 'מספר בית', 'required|numeric');
		$this->form_validation->set_rules('zip_code', 'מיקוד', 'required|numeric');
		$this->form_validation->set_rules('password', 'סיסמה', 'required|min_length[4]',
                   array(
                                'min_length' => 'אנא הזינו סיסמא בעלת 4 תווים לפחות'			)    
                );
		$this->form_validation->set_rules('confirmPassword', 'אימות סיסמה', 'required|matches[password]',
			array(
				'matches' => 'הסיסמאות שהקלדת אינן תואמות זו לזו',
			)
		);
		$this->form_validation->set_message('valid_email', 'יש למלא כתובת אימייל תקינה ');
		$this->form_validation->set_message('required', 'יש למלא {field} ');
		$this->form_validation->set_message('numeric', 'השדה {field} חייב לכלול מספרים בלבד');


		if ($this->form_validation->run() == FALSE) {
			$this->loadRegisterParent();
		} else {


			$data = array(
				'fname' => $this->input->post('pfName'),
				'lname' => $this->input->post('plName'),
				'phone' => $this->input->post('parentPhone'),
				'email' => $this->input->post('parentEmail'),
				'password' => md5($this->input->post('password')),
				'city' => $this->input->post('city'),
				'street' => $this->input->post('street'),
				'zip_code' => $this->input->post('zip_code'),
				'house_number' => $this->input->post('house_number'),
				'role_id' => 3
			);

			$error = $this->User_model->saveUser($data);
			$error = $this->User_model->saveParent($data);
			if ($error) {
				$this->loadRegisterParent();
			} else {
				$this->loadRegisterStudent();
			}
		}
	}


	public function regitserStudent($data = array('user' => null))
	{

		$this->load->model('User_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->reset_validation();
		$this->form_validation->set_rules('sfName', 'שם פרטי', 'required|callback_validate_alpha_input');
		$this->form_validation->set_rules('slName', 'שם משפחה', 'required|callback_validate_alpha_input');
		$this->form_validation->set_rules('studentPhone', 'טלפון', 'required|min_length[5]|max_length[12]|numeric',
			array(
				'max_length' => 'אנא הקלד מספר טלפון בעל 10 ספרות',
				'min_length' => 'אנא הקלד מספר טלפון בעל 10 ספרות'
			)
		);
		$this->form_validation->set_rules('studEmail', 'אימייל', 'required|valid_email|callback_validate_EmailExists');
		$this->form_validation->set_rules('shevet', 'שם שבט', 'required');
		$this->form_validation->set_message('valid_email', 'יש למלא כתובת אימייל תקינה ');
		$this->form_validation->set_message('required', 'יש למלא  {field} ');
		$this->form_validation->set_message('numeric', 'השדה {field} חייב לכלול מספרים בלבד');


		if ($this->form_validation->run() == FALSE) {
			$this->loadRegisterStudent();

		} else {

			$data = array(
				'fname' => $this->input->post('sfName'),
				'lname' => $this->input->post('slName'),
				'phone' => $this->input->post('studentPhone'),
				'email' => $this->input->post('studEmail'),
				//'gender' => $this->input->post('studentSex'),
				'password' => 1234,
				//'parent_email' => $this->input->post('parentEmail'),
				//'ageGrade_name' => $this->input->post('shevet'),
				'city' => $this->input->post('city'),
				'street' => $this->input->post('street'),
				'zip_code' => $this->input->post('zip_code'),
				'house_number' => $this->input->post('house_number'),
				'role_id' => 4
			);

			$error = $this->User_model->saveUser($data);

			$agegrade_id = $this->User_model->find_name_agegrade($this->input->post('shevet'));

			$data2 = array(
				'users_email' => $this->input->post('studEmail'),
				//'gender' => $this->input->post('studentSex'),
				'parent_email' => $this->input->post('parentEmail'),
				'agegrade_id' => $agegrade_id->id,
			);
			$error = $this->User_model->saveMember($data2);


			if ($error) {
				echo "error";
//                $this->loadRegisterStudent($error);
			} else {
				// echo "register complete";
				//print_r($data);
				$this->load->view('templates/loginAndRegisterHead');

				$data = array(
					'parentEmail' => $this->input->post('parentEmail'),
					//'password'=>$this->input->post('password'),
					'city' => $this->input->post('city'),
					'street' => $this->input->post('street'),
					'zip_code' => $this->input->post('zip_code'),
					'house_number' => $this->input->post('house_number'),
				);
				$this->load->model('Guide_model');
				$agegrade=$data2['agegrade_id'];
				$recipient_email=$this->Guide_model->get_guide_by_agegrade($agegrade);
				foreach ($recipient_email as $agegrade_guide)
				{
					$message=array(
						'recipient_email'=>$agegrade_guide->users_email,
						'sent_from'=>'מערכת',
						'subject'=>'נוסף חניך חדש לאישור'
					);
					$this->Message_model->send($message);
				}
				$this->load->view('login+register/endOfRegistration', $data);
			}
		}
	}


	public function loadRegistrationComplete($data = array())
	{
		$this->load->view('templates/loginAndRegisterHead');
		$this->load->view('login+register/registrationComplete', $data);
	}

	public function send_members_for_approval()
	{
		//get all members from DB
		$data['members'] = $this->Member_model->get_members();

		foreach ($data['members'] as $member) {
			if ($member->pending == TRUE) {
				$this->load->view();
			}
		}
	}

	public function validate_alpha_input($names)
	{

		$names = str_replace(' ', '', $names);
		if (!preg_match('/[^א-ת]/', $names)) { // '/[^a-z\d]/i' should also work.
			return TRUE;
		} else {
			$this->form_validation->set_message('validate_alpha_input', 'השדה {field} יכול להיות בעברית בלבד');
			return FALSE;
		}
	}

	public function validate_EmailExists($email)
	{


		$emailExists = $this->User_model->valid_Email($email);
		if ($emailExists == FALSE) {
			$this->form_validation->set_message('validate_EmailExists', 'כתובת האימייל כבר קיימת במערכת');
			return FALSE;
		}
		return TRUE;
	}

	public function forgot_password($data = array('error' => null))
	{
		$this->load->view("login+register/forgot_password", $data);
		$this->load->view('templates/loginAndRegisterHead');
	}

	public function send_password()
	{
		$data = array(
			'email' => $this->input->post('email'),
		);
		//validation

		$check = $this->User_model->auth($data);
		if ($check == null) {
			$data['error'] = 'משתמש לא קיים. נסה שנית';
			$this->forgot_password($data);
		} else {
			$config = [
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.office365.com',
				'smtp_user' => 'mta-bnei-akiva@outlook.com',
				'smtp_pass' => 'bneiakiva123',
				'smtp_crypto' => 'tls',
				'newline' => "\r\n",
				'smtp_port' => 587,
				'mailtype' => 'html'
			];
			$this->load->library('email', $config);

			$this->email->from('mta-bnei-akiva@outlook.com', 'bnei-akiva');
			$this->email->to('');
			$this->email->subject('איפוס סיסמה');
			$message = "<a href='" . base_url() . "user/do_login/'>לחץ כאן</a> סיסמתך החדשה: 1234";
			$this->email->message($message);

			$sent = $this->email->send();
			redirect('User/login');
		}
	}
}