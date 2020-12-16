<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=no">
	<meta name="HandheldFriendly" content="True">

	<!-- load booststrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
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

	.bg-darkblue{
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
				<div class="text-center py-2" style="background: black; color: white;">View Answers For : Farsi</div>
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
							<?php for ($i = 1; $i <= 20; $i++) { $next_answer = rand(1,5); $correct_answer = rand(1,5); ?>
								<tr>
									<td class="bg-darkblue text-white"><?= $i ?></td>
									<td class="<?php if($correct_answer == 1) echo "correct-answer"; if($next_answer == 1) echo "next-answer"; ?>">20%</td>
									<td class="<?php if($correct_answer == 2) echo "correct-answer"; if($next_answer == 2) echo "next-answer"; ?>">20%</td>
									<td class="<?php if($correct_answer == 3) echo "correct-answer"; if($next_answer == 3) echo "next-answer"; ?>">20%</td>
									<td class="<?php if($correct_answer == 4) echo "correct-answer"; if($next_answer == 4) echo "next-answer"; ?>">20%</td>
									<td class="<?php if($correct_answer == 5) echo "correct-answer"; if($next_answer == 5) echo "next-answer"; ?>">20%</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

			</div>
		</div>
		
		<div class="text-center my-5">
			<a type="button" class="btn btn-success" href="<?= site_url('exams/list')?>">Back To Exams List</a>
		</div>
	</div>
</body>

</html>
