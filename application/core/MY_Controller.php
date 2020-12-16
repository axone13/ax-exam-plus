<?php

class MY_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		/* codes that run in all pages */
		$this->data['page_title'] = "axExamPlus";

		$this->load->model('Users_model');

		/* check if token exist */
		if (empty($_SESSION['user']) && isset($_COOKIE['token']))
			$_SESSION['user']['token'] = $_COOKIE['token'];

		
		if (!empty($_SESSION['user'])) {
			$token = $_SESSION['user']['token'];
			//check token
			if (!empty($user = $this->Users_model->authToken($token))) {
				$user['password'] = "***";
				$this->data['user'] = $user;
			} else {
				$this->data['user'] = null;
				unset($_SESSION['user']);
				redirect(site_url('user/login'));
			}
		} else {
			redirect(site_url('user/login'));
		}

		/* get general site info */
	}
}
