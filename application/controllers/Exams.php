<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exams extends MY_Controller
{
	public function list()
	{
		$data = $this->data;

		$this->load->view('exams_list' , $data);
	}
}
