<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exams extends MY_Controller
{
	public function list()
	{
		$data = $this->data;

		$this->load->view('exams_list' , $data);
	}

	public function submit_answers()
	{
		$data = $this->data;

		$this->load->view('submit_answers' , $data);
	}

	public function view_answers()
	{
		$data = $this->data;

		$this->load->view('view_answers' , $data);
	}
}
