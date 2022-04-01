<?php 
	//menggunakan secure login dan menghubungkan ke database
	include 'koneksi.php';
	session_start();
	//mengambil id post
	$id = $_GET['id'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Comment</title>
	<!-- styling -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
	<?php 
		//memisahkan comment comment sesuai id postingan, agar tidak ada comment yang di post yang salah
		$sqlc = "select * from comment where id ='$id'";
		$queryc = mysqli_query($conn, $sqlc);
		$resultc = mysqli_fetch_array($queryc);				
		$comment = $resultc['comment'];
	 ?>
	 <!-- membuat form untuk mengirim data penggantian comment -->
	<form action="crudComment.php" method="GET">
		<input type="hidden" name="id" value="<?php echo $id ?>">
	<h1>Comment</h1>
	<input type="text" name="comment" placeholder="comment" value="<?php echo $comment ?>" class="form-control">
	<br>
	<input type="submit" name="cmd" value="Update" class="btn btn-success">
	</form>

	<br>
	<a href="home.php"><button class="btn btn-primary">Back</button></a>
</body>
</html>