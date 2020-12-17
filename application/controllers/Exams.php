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

		$this->load->view('exams_list', $data);
	}

	public function submit_answers($exam_id)
	{
		$data = $this->data;

		/* get exam details */
		$this->load->model('Exams_model');
		$data['exam'] = $this->Exams_model->getExam($exam_id);

		/* check if user submitted answers */
		if (!empty($_POST['submit'])) {
			foreach ($_POST['answers'] as $question_id => $answer) {
				$this->Exams_model->submitUserAnswer($this->data['user']['id'], $question_id, $answer);
			}
			$data['success'] = "Answers has been submitted!";
		}

		/* get exam questions */
		$data['exam']['questions'] = $this->Exams_model->getExamQuestions($exam_id);
		$data['exam']['user_answers'] = $this->Exams_model->getUserExamsAnswers($this->data['user']['id'], $exam_id);

		$this->load->view('submit_answers', $data);
	}

	public function submit_temp_answer()
	{
		$result = null;
		$error = null;
		$this->load->model('Exams_model');

		$params = required_params(['question_id'] , "GET");
		if (!is_error($params)) {
			$this->Exams_model->submitUserAnswerTemp($this->data['user']['id'] , $params['question_id'] , $this->input->get('opt'));
		} else {
			$error = is_error($params);
		}
		json_result($result, $error);
	}

	public function view_answers($exam_id)
	{
		$data = $this->data;

		/* get exam details */
		$this->load->model('Exams_model');
		$data['exam'] = $this->Exams_model->getExam($exam_id);

		/* get exam answers */
		$data['exam']['answers'] = $this->Exams_model->getExamAnwers($exam_id);

		$this->load->view('view_answers', $data);
	}

	public function view_answers_temp($exam_id)
	{
		$data = $this->data;

		/* get exam details */
		$this->load->model('Exams_model');
		$data['exam'] = $this->Exams_model->getExam($exam_id);

		/* get exam answers */
		$data['exam']['answers'] = $this->Exams_model->getExamAnwersTemp($exam_id);

		$this->load->view('view_answers', $data);
	}
}
