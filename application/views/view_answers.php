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

	.bg-darkblue {
		background: #182e7b !important;
	}

	.correct-answer {
		background: #28a745;
		color: white;
	}

	.next-answer {
		background: #d9ffe2;
	}
</style>

<body style="background: #ebf0ff;">
	<div class="container p-3">
		<div class="card col-12 col-md-10 col-lg-8 mx-auto p-0 shadow-sm">
			<div class="card-header bg-primary text-white py-3 d-flex">
				<h5><?= $user['name'] ?></h5>

				<a class="ml-auto" href="<?= site_url('user/logout') ?>" style="color: inherit;">
					logout
				</a>
			</div>
			<div class="card-body p-0">
				<div class="text-center py-2" style="background: black; color: white;">View Answers For : <?= $exam['title'] ?></div>
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
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($exam['answers'] as $answer) {
								/* $precentages['o0'] = number_format($answer['total'] == 0 ? 0 : $answer['o0'] * 100 / $answer['total'], 0) . '%'; */
								$precentages['o1'] = number_format($answer['total'] == 0 ? 0 : $answer['o1'] * 100 / $answer['total'], 0) . '%';
								$precentages['o2'] = number_format($answer['total'] == 0 ? 0 : $answer['o2'] * 100 / $answer['total'], 0) . '%';
								$precentages['o3'] = number_format($answer['total'] == 0 ? 0 : $answer['o3'] * 100 / $answer['total'], 0) . '%';
								$precentages['o4'] = number_format($answer['total'] == 0 ? 0 : $answer['o4'] * 100 / $answer['total'], 0) . '%';
								$correct_answer = calcCorrectAnswer([$answer['o1'] , $answer['o2'] , $answer['o3'] , $answer['o4']]);
								$next_answer = calcNextAnswer([$answer['o1'] , $answer['o2'] , $answer['o3'] , $answer['o4']]);

							?>
								<tr>
									<td class="bg-darkblue text-white">
										<?= $answer['question_number'] ?>
									</td>

									<td class="<?php if ($correct_answer == 1) echo "correct-answer"; if ($next_answer == 1) echo "next-answer"; ?>">
										<?= $precentages['o1'] ?>
									</td>

									<td class="<?php if ($correct_answer == 2) echo "correct-answer"; if ($next_answer == 2) echo "next-answer"; ?>">
										<?= $precentages['o2'] ?>
									</td>

									<td class="<?php if ($correct_answer == 3) echo "correct-answer"; if ($next_answer == 3) echo "next-answer"; ?>">
										<?= $precentages['o3'] ?>
									</td>

									<td class="<?php if ($correct_answer == 4) echo "correct-answer"; if ($next_answer == 4) echo "next-answer"; ?>">
										<?= $precentages['o4'] ?>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>

			</div>
		</div>

		<div class="text-center my-5">
			<a type="button" class="btn btn-success" href="<?= site_url('exams/list') ?>">Back To Exams List</a>
		</div>
	</div>
</body>

</html>
