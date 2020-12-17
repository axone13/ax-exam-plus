<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exams extends MY_Controller
{
	public function list()
	{
		$data = $this->data;

		/* get exams list */
		$this->load->model('Exams_model');
		$data['exams_list'] = $this->Exams_model->getExamsList();

		$this->load->view('exams_list' , $data);
	}

	public function submit_answers()
	{
		$data = $this->data;

		$this->load->view('submit_answers' , $data);
	}

	public function view_answers($exam_id)
	{
		$data = $this->data;

		/* get exam details */
		$this->load->model('Exams_model');
		$data['exam'] = $this->Exams_model->getExam($exam_id);
		
		/* get exam answers */
		$data['exam']['answers'] = $this->Exams_model->getExamAnwers($exam_id);

		$this->load->view('view_answers' , $data);
	}
}
