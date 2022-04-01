<?php 
//menggunakan secure login
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Post</title>
	<!-- Styling -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<!-- membuat form untuk mengirim isi data post -->
	<form action="crudPost.php" method="GET" class="">
		<!-- mengirim user session sekarang yang ingin membuat post -->
		<input type="hidden" name="nama" value="<?php echo $_SESSION['nama'] ?>">
		<h2>Title</h2>
		<input type="text" name="title" class="form-control">
		<h2>Caption</h2>
		<textarea type="text" name="caption" class="form-control caption" >
		</textarea>
		<br>
		<br>
		<input type="submit" name="cmd" value="Create" class="btn btn-primary">
	</form>

	<br>
	<!-- tombol back untuk kembali ke home jika batal -->
	<a href="home.php"><button class="btn btn-primary">Back</button></a>
</body>
</html>