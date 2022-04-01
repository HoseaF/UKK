<?php 
	//menghubungkan ke database
	include 'koneksi.php';

	//mengambil data data dari url/form dengan method get
	$id = $_GET['id'];
	$postid = $_GET['postid'];
	$nama = $_GET['nama'];
	$comment = $_GET['comment'];
	$cmd = $_GET['cmd'];

	//memisahkan hashtag
	function getHashtagsd($comment) {
    	preg_match_all("/(#\w+)/u", $comment, $matches);

    	if ($matches) {
        	return $matches[0];
    	}
	}
	//mengambil array dari function pemisahan
	$hashtagarray = getHashtagsd($comment);
	$count = count($hashtagarray);

	//membuat string yang akan menambahkan string string hashtag
	$hashtag = "";
	for($y = 0; $y < $count; $y++){
		//tidak mengambil simbol #
		$hashtagAdded = substr($hashtagarray[$y],1) . " ";
		$hashtag .= $hashtagAdded;
	}

	//jika datang dari page create comment, maka akan dilakukan insert pada tabel
	if ($cmd == 'Comment') {
	$sql = "insert into comment(postid, nama, comment, hashtag) values('$postid','$nama','$comment','$hashtag')";
	$query = mysqli_query($conn, $sql);
	}
	//jika datang dari page edit, maka akan dilakukan update tabel
	if ($cmd == 'Update') {
	$sql = "update comment set comment='$comment', hashtag='$hashtag' where id='$id'";
	$query = mysqli_query($conn, $sql);
	}
	//menghapus comment sesuai id
	if ($cmd == 'delete') {
	$sql = "delete from comment where id='$id'";
	$query = mysqli_query($conn, $sql);
	}

	//setelah data diproses kembali ke home
	header("location:home.php");
 ?>