<?php 
	//menghancurkan session agar logout
	session_start();
	session_destroy();
	//kembali ke login
	header("location:index.php")
 ?>