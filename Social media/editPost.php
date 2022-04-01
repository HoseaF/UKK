<?php 
	//menggunakan secure login
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Post</title>
	<!-- styling -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
	//menghubungkan database dan mengambil data post yang ingin di edit
	include "koneksi.php";

	$id = $_GET['id'];
	$sql = "select * from post where id=$id";
	$query = mysqli_query($conn, $sql);
	$numrows = mysqli_num_rows($query);
	$result = mysqli_fetch_array($query);
	$id = $result['id'];
	$nama = $result['nama'];
	$title = $result['title'];
	$caption = $result['caption'];

	?>

	<!-- form untuk mengedit post yang sesuai -->
	<form action="crudPost.php" method="GET">
		<input type="hidden" name="id" value="<?php echo$id ?>">
		<input type="hidden" name="nama" value="<?php echo $_SESSION['nama'] ?>">
		<h2>Title</h2>
		<input type="text" name="title" value="<?php echo $title ?>" class="form-control">
		<h2>Caption</h2>
		<input type="text" name="caption" value="<?php echo $caption ?>" class="form-control">
		<br>
		<input type="submit" name="cmd" value="Edit" class="btn btn-success">
	</form>

	<br>
	<!-- tombol back untuk kembali ke home jika batal mengedit post -->
	<a href="home.php"><button class="btn btn-primary">Back</button></a>
</body>
</html>