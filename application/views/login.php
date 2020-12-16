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
</style>

<body style="background: #ebf0ff;">
	<div class="container p-3">
		<div class="card col-12 col-md-10 col-lg-8 mx-auto p-0 shadow-sm">
			<div class="card-header bg-primary text-white py-3">
				<h5>Login To axExam +</h5>
			</div>
			<div class="card-body">
				<form method="POST">
					<div class="form-group">
						<label for="username">Username : </label>
						<input type="text" class="form-control" id="username" name="username" required>
					</div>
					<div class="form-group">
						<label for="password">Password : </label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<input type="submit" name="login" class="btn btn-primary mx-auto d-block" value="Login To Site :)">
				</form>

				<?php if (!empty($error)) { ?>
					<div class="my-3 text-danger text-center"><?= $error; ?></div>
				<?php } ?>
			</div>
		</div>

		<div class="text-center py-4" style="font-family: 'Anton'; font-size: 19px;">
			Created with <span style="color: #b90404;" class="animate__animated animate__heartBeat animate__infinite d-inline-block px-1">❤</span> by <img style="height: 31px;  margin-left: -3px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iNDUwMC4wMDAwMDBwdCIgaGVpZ2h0PSIxNTAwLjAwMDAwMHB0IiB2aWV3Qm94PSIwIDAgNDUwMC4wMDAwMDAgMTUwMC4wMDAwMDAiCiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWlkWU1pZCBtZWV0Ij4KPG1ldGFkYXRhPgpDcmVhdGVkIGJ5IHBvdHJhY2UgMS4xNiwgd3JpdHRlbiBieSBQZXRlciBTZWxpbmdlciAyMDAxLTIwMTkKPC9tZXRhZGF0YT4KPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMC4wMDAwMDAsMTUwMC4wMDAwMDApIHNjYWxlKDAuMTAwMDAwLC0wLjEwMDAwMCkiCmZpbGw9IiMwMDAwMDAiIHN0cm9rZT0ibm9uZSI+CjxwYXRoIGQ9Ik0xMDk3MSAxNDAyNSBjLTIwNSAtNTggLTUyNyAtMjk5IC04NzYgLTY1NiAtMTI2NSAtMTI5NiAtMzA2MiAtNDY1NgotNDAwNiAtNzQ4OSAtNDI0IC0xMjc0IC04MjkgLTI4NzkgLTgyOSAtMzI4OSAwIC0yMjEgMTIwIC0yOTUgMzIyIC0xOTggMTQ2CjcxIDMyNiAyMDQgNjQzIDQ3NyAxMjU2IDEwODAgMTY5MSAxNDQ1IDI0MzAgMjAzNiAyMDkwIDE2NzIgNDA1NiAzMDE2IDY1ODgKNDUwMCAzNjcgMjE2IDYxNyAzNzEgNzgyIDQ4NyAxOTAgMTM0IDIyNSAxNzEgMjI1IDI0MCAwIDE2MiAtMzgzIDIyNyAtMTI2MAoyMTMgLTQ2MCAtNyAtNzY2IC0yMCAtOTczIC00MSAtNTczIC01OSAtOTU2IC0yMjQgLTE3ODUgLTc3MSAtMzk0IC0yNjEgLTc1OQotNTE1IC0xOTc3IC0xMzc5IC0xMDI4IC03MjkgLTE5MDcgLTEzMTUgLTE5NzMgLTEzMTUgLTE4IDAgLTEyIDE4IDU4IDE3NSAyNDEKNTQwIDExNDggMjM1MSAxNDc4IDI5NTAgMTAxIDE4MyAxNTQgMjY3IDE2NCAyNTcgMTQgLTE0IDYzIC0xOTQgOTggLTM1OSAxNDIKLTY2NiAyMTIgLTk0NiAyNDYgLTk4MiAzNSAtMzggMjE5IDYxIDY2MCAzNTQgMTY1IDExMCA0MzkgMjk3IDYwOCA0MTUgbDMwNwoyMTUgLTYgNzUgYy0xMSAxMzYgLTY0IDQ4NiAtMTY1IDEwODUgLTE3MiAxMDI2IC0yNDYgMTU3NiAtMjcwIDIwMjUgLTI4IDUxNgotODMgNzY2IC0xOTggOTAxIC02NyA3OCAtMTc3IDEwNiAtMjkxIDc0eiIvPgo8cGF0aCBkPSJNMjU2NjAgMTAzOTkgYy00NzAgLTUzIC04OTQgLTI1OSAtMTE2MyAtNTY2IC0yMzggLTI3MSAtMzk4IC02NDQKLTQzNiAtMTAxOCAtMzYgLTM0MiAtNTEgLTk5MCAtNTEgLTIxNzUgMCAtMTE4NSAxNSAtMTgzNCA1MSAtMjE3NSA0NCAtNDI5CjIzMyAtODI0IDUzMSAtMTExMCAxMjcgLTEyMiAyNTAgLTIwOCA0MTEgLTI4NSAyMDUgLTk5IDQyOSAtMTYyIDY4NiAtMTkxIDE1NgotMTcgNTc1IC02IDcxMSAxOSAyNzYgNTIgNDgyIDEyOCA2ODggMjU0IDQ0NSAyNzIgNzM2IDc2OSA3OTIgMTM1MyAyOCAzMDAgMzIKNTAyIDM3IDE5MDAgNiAxNjk0IC00IDIxNTcgLTUyIDI0OTQgLTc0IDUxMyAtMzczIDk4NCAtNzgyIDEyMzIgLTIyOSAxMzkKLTUyNyAyMzYgLTgyOCAyNjkgLTEwNyAxMiAtNDg4IDExIC01OTUgLTF6IG00MTggLTEyMzggYzEwMCAtNTEgMTI1IC0xMzcgMTQyCi00OTEgMTYgLTMyMyA4IC00MDQyIC05IC00MTk1IC0yNiAtMjM3IC01NSAtMzA5IC0xNDEgLTM1MyAtMzggLTE5IC01NyAtMjMKLTEyMSAtMjAgLTkxIDQgLTEzNSAyOSAtMTczIDk4IC02NSAxMTkgLTY4IDIzNyAtNjMgMjU3NSAzIDE4MzEgNSAyMDQ5IDIwCjIxMzIgMjYgMTQ4IDYzIDIxNCAxMzkgMjUyIDU2IDI4IDE1NCAyOSAyMDYgMnoiLz4KPHBhdGggZD0iTTU1NjAgMTAzNjAgYy02MTAgLTE2IC0xMDA5IC01NSAtMTA1OCAtMTA0IC0xMyAtMTMgLTEzIC0yMCAyIC02MAo2NCAtMTY4IDQyOSAtNjAwIDkyNSAtMTA5NiAzOTkgLTM5OCA1NTQgLTUyMyA3MTUgLTU3MiAyNTQgLTc3IDQxMSA5NiA3NzMKODU0IDIxMCA0NDEgMzQwIDc1OSAzNDUgODUxIDMgMzkgMSA0MyAtMzIgNTkgLTExMSA1NCAtOTE5IDg3IC0xNjcwIDY4eiIvPgo8cGF0aCBkPSJNMTc0NzQgMTAyMzMgYzMgLTEwIDE0MyAtNzMwIDMxMSAtMTYwMCBsMzA2IC0xNTgxIC0zMDkgLTIwMTQgYy0xNzAKLTExMDcgLTMwOSAtMjAxNCAtMzA4IC0yMDE0IDAgLTEgMzczIC00IDgyNyAtNiBsODI1IC00IDEwMyA3NTYgYzEyNCA5MDMgMTcxCjEyNzEgMjAxIDE1NjUgMTIgMTIxIDI0IDIyNyAyNyAyMzUgMyA4IDI3IC0xMjIgNTQgLTI5MCAxMjQgLTc3NyAyODggLTE2MDcKNDIyIC0yMTM1IGwzMyAtMTMwIDc4NyAtMyBjNDMzIC0xIDc4NyAxIDc4NyA1IDAgNSAtMjAyIDkxNCAtNDUwIDIwMjIgbC00NTAKMjAxNCAyOTUgMTU3MSBjMTYyIDg2NCAyOTggMTU4MyAzMDEgMTU5OSBsNiAyNyAtNzE1IDAgLTcxNCAwIC02IC0zMiBjLTI1Ci0xNTAgLTMzOSAtMTg2NiAtMzQ0IC0xODc4IC0zIC04IC0yNSA5OCAtNDkgMjM1IC0yMyAxMzggLTgzIDQ2NiAtMTMyIDczMQotNTAgMjY1IC0xMDggNTg1IC0xMjkgNzEyIGwtMzggMjMyIC04MjMgMCBjLTc4MCAwIC04MjMgLTEgLTgxOCAtMTd6Ii8+CjxwYXRoIGQ9Ik0zMDg0MCA2NjM1IGwwIC0zNjE1IDcxMCAwIDcxMCAwIDIgMTYxNCAzIDE2MTQgNDMwIC0xNjExIDQzMCAtMTYxMgo3NDMgLTMgNzQyIC0yIDAgMzYxNSAwIDM2MTUgLTcwNSAwIC03MDUgMCAtMiAtMTYwNyAtMyAtMTYwOCAtNDY2IDE2MDUgLTQ2NgoxNjA1IC03MTEgMyAtNzEyIDIgMCAtMzYxNXoiLz4KPHBhdGggZD0iTTM3NTcwIDY2MzUgbDAgLTM2MTUgMTQ2NSAwIDE0NjUgMCAwIDcyNSAwIDcyNSAtNjE1IDAgLTYxNSAwIDAgNzkwCjAgNzkwIDUyNSAwIDUyNSAwIDAgNjk1IDAgNjk1IC01MjUgMCAtNTI1IDAgMCA2NzUgMCA2NzUgNTYwIDAgNTYwIDAgMCA3MzAgMAo3MzAgLTE0MTAgMCAtMTQxMCAwIDAgLTM2MTV6Ii8+CjxwYXRoIGQ9Ik0xMjUzNCA3MDc3IGMtMjMwIC0xMzYgLTE2MTQgLTEwNTQgLTE2MTQgLTEwNzEgMCAtMTcgMjUyIC02NjggMzAwCi03NzYgMjI2IC01MDIgNTk3IC05MDkgMTUxNSAtMTY2MSA0MjMgLTM0NiA4NzIgLTY4MiAxMDEwIC03NTUgODUgLTQ1IDExMQotNDIgMTQzIDE0IDM1IDYzIDQ2IDE2NCAyNyAyNTggLTEyNiA2MjIgLTEyMTIgNDA0NCAtMTI4NCA0MDQ0IC00IDAgLTQ3IC0yNAotOTcgLTUzeiIvPgo8L2c+Cjwvc3ZnPgo=">
		</div>
	</div>
</body>

</html>
