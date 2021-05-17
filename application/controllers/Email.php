<?php


class Email extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');

	}

	public function index()
	{
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user'] = 'mta.bnei.akiva@gmail.com';
		$config['smtp_pass'] = 'bneiakiva123';
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";
		$config['mailtype'] = "text";
		$config['validation'] = TRUE;
		$this->email->initialize($config);

		$this->email->from('mta.bnei.akiva@gmail.com', 'Bnei-Akiva');
		$this->email->to('alotofyog@gmail.com');
		$this->email->subject('Thank you');
		$this->email->message('Thank you very much');
		ini_set("SMTP","ssl://smtp.gmail.com");
		ini_set("smtp_port","465");

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['_smtp_auth']=TRUE;
		$config['smtp_user'] = 'sender@gmail.com';
		$config['smtp_pass'] = 'password';
		$config['smtp_timeout'] = '60';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = "html";

		$this->email->initialize($config);

		$this->email->from('sender@gmail.com', 'Sender');
		$this->email->to('receiver@gmail.com');

		$this->email->subject('This is my subject');
		$this->email->message('This is the content of my message');

		if ($this->email->send()) {
			echo "email sent successfully";
		} else {
			echo $this->email->print_debugger();
		}
	}
}
