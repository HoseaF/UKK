<?php 
	//menghubungkan ke database
	include "koneksi.php";

	//mengambil data data dari url/form dengan method get
	$id = $_GET['id'];
	$nama = $_GET['nama'];
	$title = $_GET['title'];
	$caption = $_GET['caption'];
	$cmd = $_GET['cmd'];

	//memisahkan hashtag
	function getHashtagsd($caption) {
		preg_match_all("/(#\w+)/u", $caption, $matches);
   			if ($matches) {
       			return $matches[0];
  		}
  	}

  	//mengambil array dari function pemisahan
	$hashtagarray = getHashtagsd($caption);
	$count = count($hashtagarray);

	//membuat string yang akan menambahkan string string hashtag
	$hashtag = "";
	for($y = 0; $y < $count; $y++){
		$hashtagAdded = substr($hashtagarray[$y],1) . " ";
		$hashtag .= $hashtagAdded;
	}
	



	//jika datang dari page create post, maka akan dilakukan insert pada tabel
	if ($cmd == "Create") {
		$sql = "insert into post(nama, title, caption, hashtag) values('$nama','$title','$caption','$hashtag')";
		$query = mysqli_query($conn, $sql);
	}
	//jika datang dari page edit comment, maka akan dilakukan update pada tabel
	if ($cmd == "Edit") {
		$sql = "update post set nama='$nama', title='$title', caption='$caption', hashtag='$hashtag' where id='$id'";
		$query = mysqli_query($conn, $sql);
	}
	//menghapus post sesuai id
	if ($cmd == "delete") {
		$sql = "delete from post where id='$id'";
		$query = mysqli_query($conn, $sql);
		$sql = "delete from comment where postid='$id'";
		$query = mysqli_query($conn, $sql);
	}


	// echo "$search";
	//setelah data diproses kembali ke home
	header("location:home.php");
 ?>

