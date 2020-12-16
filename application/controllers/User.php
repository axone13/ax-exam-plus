<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function login()
	{
		$data = null;
		if(!empty($_POST['login'])){
			$this->load->model('Users_model');
			if($user = $this->Users_model->loginUser($this->input->post('username') , $this->input->post('password'))){
				$_SESSION['user']['token'] = $user['token'];
				redirect(site_url('exams/list'));
			} else {
				$data['error'] = "Username or Password is incorrect!";
			}
		}

		$this->load->view('login' , $data);
	}
}
