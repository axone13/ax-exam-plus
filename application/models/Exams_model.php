<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Exams_model extends CI_Model
{

	public function getExamsList(){
		return $this->db->get('exams')->result_array();
	}

	public function getExam($exam_id){
		return $this->db->get_where('exams' , ['id' => $exam_id])->row_array();
	}

	public function getExamQuestions($exam_id){
		$this->db->order_by('question_number' , 'ASC');
		return $this->db->get_where('exams_questions' , ['exam_id' => $exam_id])->result_array();
	}

	public function getUserExamsAnswers($user_id , $exam_id){
		$sql = "SELECT * FROM `tbl_answers` WHERE user_id = '$user_id' AND question_id in (SELECT id as question_id FROM `tbl_exams_questions` WHERE tbl_exams_questions.exam_id = '$exam_id')";
		$user_answers = $this->db->query($sql)->result_array();
		$result = [];
		foreach ($user_answers as $user_answer) {
			$result += [$user_answer['question_id'] => $user_answer['opt']];
		}
		return $result;
	}

	public function submitUserAnswer($user_id, $question_id , $opt){
		/* check if user submitted answer before */
		$query = $this->db->get_where('answers' , ['question_id' => $question_id , 'user_id' => $user_id]);
		if($query->num_rows() == 0) {
			$this->db->insert('answers' , ['question_id' => $question_id , 'user_id' => $user_id , 'opt' => $opt]);
		} else {
			$this->db->update('answers' , ['opt' => $opt] , ['question_id' => $question_id , 'user_id' => $user_id]);
		}
		return true;
	}

	public function submitUserAnswerTemp($user_id, $question_id , $opt){
		/* check if user submitted answer before */
		$query = $this->db->get_where('answers_temp' , ['question_id' => $question_id , 'user_id' => $user_id]);
		if($query->num_rows() == 0) {
			$this->db->insert('answers_temp' , ['question_id' => $question_id , 'user_id' => $user_id , 'opt' => $opt]);
		} else {
			$this->db->update('answers_temp' , ['opt' => $opt] , ['question_id' => $question_id , 'user_id' => $user_id]);
		}
		return true;
	}

	public function getExamAnwers($exam_id)
	{
		$sql = "
			SELECT
				*,
				T.o1 + T.o2 + T.o3 + T.o4 AS total
			FROM
				(
				SELECT
					question_id,
					SUM(opt = 1) AS o1,
					SUM(opt = 2) AS o2,
					SUM(opt = 3) AS o3,
					SUM(opt = 4) AS o4
				FROM
					tbl_answers
				WHERE
					question_id IN(
					SELECT
						id AS question_id
					FROM
						tbl_exams_questions
					WHERE
						exam_id = '$exam_id'
				)
			GROUP BY
				question_id
			UNION

			SELECT
					id question_id,
					0 AS o1,
					0 AS o2,
					0 AS o3,
					0 AS o4
				FROM
					tbl_exams_questions
				WHERE
					exam_id = '$exam_id' AND
					id NOT IN(
					SELECT
						DISTINCT question_id AS id
					FROM
						tbl_answers
				)

			) T

			INNER JOIN
			tbl_exams_questions ON T.question_id = tbl_exams_questions.id

			ORDER BY tbl_exams_questions.question_number ASC
		";

		return $this->db->query($sql)->result_array();
	}
}
                        
/* End of file Users.php */
