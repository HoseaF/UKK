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
		<!-- form untuk membuat akun baru -->
		<form action="buatAkun.php" method="GET">
			
		<h1>Login</h1>
		<div class="">
			<p> Nama : &nbsp;</p>
			<input type="text" name="nama" placeholder="Login" class="form-control">
		</div>
		<div class="">
			<p> Password : &nbsp;</p>
			<input type="password" name="pass" placeholder="Password" class="form-control">
		</div>

		<br>
		<input type="submit" value="Register" class="btn btn-primary">
		</form>
	</div>

</body>
</html>