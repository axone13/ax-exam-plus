<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	private $pass = "123456789"; // put your secret password here

	public function index()
	{
		echo '<h3>Exams :</h3>';
		echo '<a href="' . site_url("admin/createExam") . '" > Create Exam </a> - ';
		echo '<a href="' . site_url("admin/deleteExam") . '" > Delete Exam </a> - ';
		echo '<a href="' . site_url("admin/renameExam") . '" > Rename Exam </a>';
		
		echo '<h3>Users :</h3>';
		echo '<a href="' . site_url("admin/createUser") . '" > Create User </a> - ';
		echo '<a href="' . site_url("admin/suspendUser") . '" > Suspend User </a> - ';
		echo '<a href="' . site_url("admin/activateUser") . '" > Activate User </a>';
	}

	public function createExam()
	{
		if (!empty($this->input->post('submit'))) {
			if ($this->input->post('password') != $this->pass) die;

			$exam_title = $this->input->post('exam_title');
			$questions_count = $this->input->post('questions_count');

			/* create exam */
			$this->db->insert('exams', ['title' => $exam_title]);
			$exam_id = $this->db->insert_id();

			/* create questions */
			for ($i = 1; $i <= $questions_count; $i++) {
				$this->db->insert('exams_questions', ['exam_id' => $exam_id, 'question_number' => $i]);
			}

			echo "Exam and questions have been created successfully!";
			die;
		}

		echo "<h3>Create New Exam</h3>";
		echo '<form method="POST">';
		echo '<input type="password" name="password" placeholder="password">';
		echo '<input type="text" name="exam_title" placeholder="exam title">';
		echo '<input type="number" name="questions_count" placeholder="questions count">';
		echo '<input type="submit" name="submit" value="create exam!">';
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

	public function createUser()
	{
		if (!empty($this->input->post('submit'))) {
			if ($this->input->post('password') != $this->pass) die;

			$name = $this->input->post('name');
			$username = $this->input->post('username');
			$user_password = $this->input->post('user_password');

			/* create user */
			$this->db->insert('users' , ['name' => $name , 'username' => $username , 'password' => $user_password , 'token' => md5(time() + rand(1,100))]);

			echo "User has been created successfully!";
			die;
		}

		echo "<h3>Create User</h3>";
		echo '<form method="POST">';
		echo '<input type="password" name="password" placeholder="password">';
		echo '<input type="text" name="name" placeholder="full name">';
		echo '<input type="text" name="username" placeholder="username (phone number)">';
		echo '<input type="text" name="user_password" placeholder="password">';
		echo '<input type="submit" name="submit" value="create user!">';
		echo '</form>';
	}

	public function suspendUser()
	{
		if (!empty($this->input->post('submit'))) {
			if ($this->input->post('password') != $this->pass) die;

			$user_id = $this->input->post('user_id');

			/* suspend user */
			$this->db->update('users' , ['suspend' => 1] , ['id' => $user_id]);

			echo "User has been suspended successfully!";
			die;
		}

		echo "<h3>Suspend User</h3>";
		echo '<form method="POST">';
		echo '<input type="password" name="password" placeholder="password">';
		echo '<input type="tel" name="user_id" placeholder="user_id">';
		echo '<input type="submit" name="submit" value="suspend user!">';
		echo '</form>';
	}

	public function activateUser()
	{
		if (!empty($this->input->post('submit'))) {
			if ($this->input->post('password') != $this->pass) die;

			$user_id = $this->input->post('user_id');

			/* activate user */
			$this->db->update('users' , ['suspend' => 0] , ['id' => $user_id]);

			echo "User has been activated successfully!";
			die;
		}

		echo "<h3>Activate User</h3>";
		echo '<form method="POST">';
		echo '<input type="password" name="password" placeholder="password">';
		echo '<input type="tel" name="user_id" placeholder="user_id">';
		echo '<input type="submit" name="submit" value="activate user!">';
		echo '</form>';
	}
}
