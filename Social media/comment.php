<?php 
	//menggunakan secure login
	session_start();
	$postid = $_GET['postid'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Comment</title>
	<!-- styling -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
	<!-- form yang mengirim data user serta isi comment -->
	<form action="crudComment.php" method="GET">
		<!-- memberi data user session sekarang dan id postingan yang ingin diberikan komentar -->
		<input type="hidden" name="postid" value="<?php echo $postid ?>">
		<input type="hidden" name="nama" value="<?php echo $_SESSION['nama'] ?>">
		
	<h1>Comment</h1>
	<input type="text" name="comment" placeholder="comment" class="form-control">
	<br>
	<input type="submit" name="cmd" value="Comment" class="btn btn-primary">
	</form>

	<br>
	<!-- tombol back untuk kembali ke home jika ingin membatalkan pembuatan comment -->
	<a href="home.php"><button class="btn btn-primary">Back</button></a>
</body>
</html>