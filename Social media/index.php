<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- styling -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

	<div class="container" class="card">
		<!-- form login -->
		<form action="login.php" method="GET">
		<h1>Login</h1>
		<div>
			<p> Nama : &nbsp;</p>
			<input type="text" name="nama" placeholder="Login" class="form-control">
		</div>
		<div>
			<p> Password : &nbsp;</p>
			<input type="password" name="pass" placeholder="Password" class="form-control">
		</div>
		<br>
		<!-- button login -->
		<input type="submit" value="Login" class="btn btn-primary">
		<br>

		</form>

		<br>
		<!-- jika tidak mempunyai akun, diberi option register -->
		<input type="button" onclick="register()" value="Register" class="btn btn-primary">
	</div>
	<!-- menghubungkan ke script eksternal -->
	<script src="script.js"></script>
</body>
</html>