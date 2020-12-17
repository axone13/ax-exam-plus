<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	private $pass = "123456789"; // put your secret password here

	public function index()
	{
		echo '<a href="' . site_url("admin/makeExam") . '" > Make Exam </a>';
		echo '<a href="' . site_url("admin/deleteExam") . '" > Delete Exam </a>';
		echo '<a href="' . site_url("admin/renameExam") . '" > Rename Exam </a>';
	}

	public function makeExam()
	{
		if (!empty($this->input->post('submit'))) {
			if ($this->input->post('password') != $this->pass) die;

			$exam_title = $this->input->post('exam_title');
			$questions_count = $this->input->post('questions_count');

			/* make exam */
			$this->db->insert('exams', ['title' => $exam_title]);
			$exam_id = $this->db->insert_id();

			/* make questions */
			for ($i = 1; $i <= $questions_count; $i++) {
				$this->db->insert('exams_questions', ['exam_id' => $exam_id, 'question_number' => $i]);
			}

			echo "Exam and questions have been created successfully!";
			die;
		}

		echo "<h3>Make New Exam</h3>";
		echo '<form method="POST">';
		echo '<input type="password" name="password" placeholder="password">';
		echo '<input type="text" name="exam_title" placeholder="exam title">';
		echo '<input type="number" name="questions_count" placeholder="questions count">';
		echo '<input type="submit" name="submit" value="make exam!">';
		echo '</form>';
	}

	public function deleteExam()
	{
		if (!empty($this->input->post('submit'))) {
			if ($this->input->post('password') != $this->pass) die;

			$exam_id = $this->input->post('exam_id');

			/* delete the exam */
			$this->db->delete('exams' , ['id' => $exam_id]);

			echo "Exam has been deleted successfully!";
			die;
		}

		echo "<h3>Delete Exam</h3>";
		echo '<form method="POST">';
		echo '<input type="password" name="password" placeholder="password">';
		echo '<input type="tel" name="exam_id" placeholder="exam id">';
		echo '<input type="submit" name="submit" value="delete exam!">';
		echo '</form>';
	}

	public function renameExam()
	{
		if (!empty($this->input->post('submit'))) {
			if ($this->input->post('password') != $this->pass) die;

			$exam_id = $this->input->post('exam_id');
			$new_title = $this->input->post('new_title');

			/* update the exam */
			$this->db->update('exams' , ['title' => $new_title] , ['id' => $exam_id]);

			echo "Exam has been renamed successfully!";
			die;
		}

		echo "<h3>Rename Exam</h3>";
		echo '<form method="POST">';
		echo '<input type="password" name="password" placeholder="password">';
		echo '<input type="tel" name="exam_id" placeholder="exam id">';
		echo '<input type="text" name="new_title" placeholder="new title">';
		echo '<input type="submit" name="submit" value="rename exam!">';
		echo '</form>';
	}
}
