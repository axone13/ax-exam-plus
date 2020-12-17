<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Exams_model extends CI_Model
{

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
		";

		return $this->db->query($sql)->result_array();
	}
}
                        
/* End of file Users.php */
