<?php 
	//menghubungkan dengan variabel conn
	include 'koneksi.php';
	//mengambil data untuk login
	$nama = $_GET['nama'];
	$pass = $_GET['pass'];

	//melakukan query insert ke tbuser untuk membuat user baru
	$sql = "insert into tbuser(nama,pass) values('$nama','$pass')";
	$query = mysqli_query($conn, $sql);

	//kembali ke home
	header("location:index.php");
 ?>