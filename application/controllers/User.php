<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function login()
	{
		if (!empty($_SESSION['user'])) {
			redirect(site_url('exams/list'));
			die;
		}

		$data = null;
		if (!empty($_POST['login'])) {
			$this->load->model('Users_model');
			if ($user = $this->Users_model->loginUser($this->input->post('username'), $this->input->post('password'))) {
				$_SESSION['user']['token'] = $user['token'];
				setcookie('token', $user['token'], time() + (86400 * 30), "/"); // 86400 = 1 day
				redirect(site_url('exams/list'));
			} else {
				$data['error'] = "Username or Password is incorrect!";
			}
		}

		$this->load->view('login', $data);
	}

	public function logout()
	{
		unset($_SESSION['user']);
		setcookie("token", "", time() - 3600 , "/");
		redirect(site_url('user/login'));
	}
}
