<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends MX_Controller
{

	public $assets_ = array( 
		'login' => array(
			'css' => array(),
			'js' => array(),
		), 
		'home' => array(
			'css' => array(),
			'js' => array('home.js'),
		),   
	);

	public function __construct()
	{
		date_default_timezone_set("Asia/Manila"); 
	}

	public function page($page, $data = array())
	{
		$data['__assets__'] = $this->assets_;
		$this->load->view('includes/head', $data);
		$this->load->view('includes/aside', $data); 
		$this->load->view($page, $data);
		$this->load->view('includes/footer', $data);
	}
	
	public function pages($page, $data = array())
	{
		$route = $this->router->fetch_class();
		$allowed_routes = array('payment');

		global $gateways;
		$data['gateways'] = $gateways;
		$data['selectedgateways'] = array_filter($gateways);
		$data['gatewayname'] = array_keys($data['selectedgateways']);
		$data['gcount'] = count($data['selectedgateways']);
		$data['btn_text'] = 'Pay';

		if (DONATION) {
			$data['btn_text'] = 'Donate';
		}

		$data['__assets__'] = $this->assets_;
		$this->load->view('includes/head', $data);
		$this->load->view('includes/nav', $data); 
		$this->load->view($page, $data);
		$this->load->view('includes/footer', $data);
		if(in_array($route, $allowed_routes)){
			$this->load->view('includes/payment-footer', $data);
		}
	}

	public function load_wp_page($page, $data = array())
	{
		$data['isCIPage'] = true;
		$data['base_url'] = base_url();
		$this->load->view('../../../wp-load.php');
		$this->load->view('../../../wp-content/themes/themefolder/includes/head', $data);
		$this->load->view('../../../wp-content/themes/themefolder/includes/header');
		$this->load->view('../../../wp-content/themes/themefolder/includes/nav');
		$this->load->view('../../../wp-content/themes/themefolder/includes/banner', $data);
		$this->load->view('includes/wp-head', $data);
		$this->load->view($page, $data);
		$this->load->view('includes/wp-footer', $data);
		$this->load->view('../../../wp-content/themes/themefolder/includes/footer', $data);
	}

	protected function generate_num($strength = 4)
	{
		$permitted_chars = '0123456789';
		$input_length = strlen($permitted_chars);
		$random_string = '';
		for ($i = 0; $i < $strength; $i++) {
			$random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
			$random_string .= $random_character;
		}
		return $random_string;
	}

	protected function generate_code($strength = 20)
	{
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$input_length = strlen($permitted_chars);
		$random_string = '';
		for ($i = 0; $i < $strength; $i++) {
			$random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
			$random_string .= $random_character;
		}
		return strtolower($random_string);
	}

	public function set_rules_from_post($data, $unrequired_fields = array())
	{
		$email = '';
		$uname = '';
		if (isset($_POST['email_address'])) {
			if (isset($_POST['orig_email_address'])) {
				$email = ($_POST['orig_email_address'] != $_POST['email_address']) ? '|is_unique[ecl_users.email_address]' : '';
			} else {
				$email = '|is_unique[ecl_users.email_address]';
			}
		}
		if (isset($_POST['username'])) {
			if (isset($_POST['orig_username'])) {
				$uname = ($_POST['orig_username'] != $_POST['username']) ? '|is_unique[ecl_users.username]' : '';
			} else {
				$uname = '|is_unique[ecl_users.username]';
			}
		}
		foreach ($data as $key => $value) {
			if (!empty($unrequired_fields) && in_array($key, $unrequired_fields)) continue;
			$this->form_validation->set_rules($key, ucfirst(str_replace('_', ' ', $key)), 'trim|required', array('required' => '{field} is required'));
			if ($key == 'username') {
				$rule = $this->form_validation->set_rules($key, 'Username', 'trim|required' . $uname, array('is_unique' => 'The Username already exists.'));
				$rule;
			}
			if ($key == 'email_address') {
				$rule = $this->form_validation->set_rules($key, 'Email Address', 'trim|required|valid_email' . $email, array('valid_email' => 'Please provide a valid {field}', 'is_unique' => 'The Email Address already exists.'));
				$rule;
			}
			if ($key == 'confirm_password') {
				$rule = $this->form_validation->set_rules($key, 'Password Confirmation', 'trim|required|matches[password]');
				$rule;
			}
		}
	}


	protected function sendmail($to_email = 'prospteam@gmail.com', $from_name = 'SiteEmail', $subject = 'Email Notification', $message = '', $use_html_template = false, $cc = "")
	{
		$config = array(
			'protocol' 	  => 'smtp',
			'smtp_host'   => 'smtp-relay.sendinblue.com',
			'smtp_port'   => 587,
			'smtp_user'   => 'edeveloperwebink2@gmail.com',
			'smtp_pass'   => 'KL0CDhPw6y7gxqtW',
			'mailtype' 	  => 'html',
			'charset'     => 'iso-8859-1',
			'wordwrap' 	  => TRUE,
			'set_newline' => "\r\n"
		);

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		$this->email->to($to_email);
		!empty($cc) ? $this->email->cc($cc) : "";
		$this->email->from('noreply@eaglecarlimo.com', $from_name);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($use_html_template) {
			$messageData['title']   = $subject;
			$messageData['content'] = $message;
			$message = $this->load->view('mail_template', $messageData, true);
			$this->email->message($message);
		} else {
			$this->email->message($message);
		}
		if ($this->email->send()) {
			return true;
		} else {
			return false;
		}
	}

}
