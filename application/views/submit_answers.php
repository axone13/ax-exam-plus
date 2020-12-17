<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=no">
	<meta name="HandheldFriendly" content="True">

	<!-- load booststrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

	<!-- animate css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

	<!-- fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Alatsi&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Anton&amp;display=swap" rel="stylesheet">
</head>

<style>
	body {
		font-family: 'Alatsi', sans-serif;
	}

	.form-check-input {
		margin: 0 !important;
	}

	/* .answer-sheet td {
		border-right: 1px solid #dee2e6;
	} */

	.answer-sheet input[type="radio"] {
		position: initial !important;
		width: 30px;
		cursor: pointer;
	}

	.empty-answer {
		background: #f2f2f2;
	}

	.bg-darkblue {
		background: #182e7b !important;
	}
</style>

<body style="background: #ebf0ff;">
	<div class="container p-3">
		<?php if (isset($success)) { ?>
			<div class="alert alert-success col-12 col-md-10 col-lg-8 mx-auto" role="alert">
				<?= $success ?>
			</div>

			<div class="col-12 col-md-10 col-lg-8 mx-auto p-0 mb-5">
				<a href="<?= site_url('exams/view_answers/' . $this->uri->segment(3)) ?>" class="btn btn-success btn-block">Go To Answers</a>
			</div>
		<?php } ?>


		<div class="card col-12 col-md-10 col-lg-8 mx-auto p-0 shadow-sm">
			<div class="card-header bg-primary text-white py-3 d-flex">
				<h5><?= $user['name'] ?></h5>

				<a class="ml-auto" href="<?= site_url('user/logout') ?>" style="color: inherit;">
					logout
				</a>
			</div>

			<form method="POST" class="m-0">

				<div class="card-body p-0">
					<div class="text-center py-2" style="background: black; color: white;">Submit Answers For : <?= $exam['title'] ?></div>
					<!-- here we show exams form -->

					<div class="table-responsive">
						<table class="m-0 table table-bordered answer-sheet text-nowrap text-center">
							<thead>
								<tr>
									<th width="70px" class="px-3">#</th>
									<th>1</th>
									<th>2</th>
									<th>3</th>
									<th>4</th>
									<th>-</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($exam['questions'] as $question) {
									if (array_key_exists($question['id'], $exam['user_answers']))
										$user_answer =  $exam['user_answers'][$question['id']];
									else
										$user_answer = 0;
								?>
									<tr>
										<td class="bg-darkblue text-white">
											<?= $question['question_number'] ?>
										</td>

										<td>
											<input class="form-check-input" type="radio" name="answers[<?= $question['id'] ?>]" value="1" <?php if ($user_answer == 1) echo 'checked="checked"' ?>>
										</td>

										<td>
											<input class="form-check-input" type="radio" name="answers[<?= $question['id'] ?>]" value="2" <?php if ($user_answer == 2) echo 'checked="checked"' ?>>
										</td>

										<td>
											<input class="form-check-input" type="radio" name="answers[<?= $question['id'] ?>]" value="3" <?php if ($user_answer == 3) echo 'checked="checked"' ?>>
										</td>

										<td>
											<input class="form-check-input" type="radio" name="answers[<?= $question['id'] ?>]" value="4" <?php if ($user_answer == 4) echo 'checked="checked"' ?>>
										</td>

										<td class="empty-answer">
											<input class="form-check-input" type="radio" name="answers[<?= $question['id'] ?>]" value="0" <?php if ($user_answer == 0) echo 'checked="checked"' ?>>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>

				</div>
		</div>

		<div class="text-center mt-5">
			<input type="submit" class="btn btn-success" style="width: 200px;" value="Submit Answers" name="submit">
		</div>

		</form>

		<div class="text-center mt-3 mb-5">
			<a type="button" class="btn btn-outline-success" href="<?= site_url('exams/list') ?>" style="width: 200px;">Back To Exams List</a>
		</div>
	</div>
</body>

</html>
