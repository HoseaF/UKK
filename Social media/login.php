<?php 
//menggunakan secure login dan menghubungkan ke database
session_start();
include "koneksi.php";

// mengambil data login 
$nama = $_GET['nama'];
$pass = $_GET['pass'];

// mengecek keberadaan user dan password yang matching dengan data
$sql = "select * from tbuser where nama='$nama' and pass='$pass'";
$query = mysqli_query($conn,$sql);
$num = mysqli_num_rows($query);
	for ($i=1; $i <= $num ; $i++) { 
		$result = mysqli_fetch_array($query);
		$nama = $result['nama'];
		$pass = $result['pass'];
}

// jika ada, maka bisa login dan masuk ke home
if($num>0){
	$_SESSION['nama'] = $nama;
	$_SESSION['pass'] = $pass;	
	header("location:home.php");
}
//jika tidak, maka login gagal
else{
?>
 <script type="text/javascript">
 	location.href="index.php";
 	alert("Gagal");
 </script>
<?php
}
?>