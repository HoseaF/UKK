<?php 	
	//menggunakan secure login dan menghubungkan ke database
	session_start();
	include "koneksi.php";
	//jika masuk ke page ini tanpa login, akan kembali ke login
	If($_SESSION['nama'] == ""){
 		header("location:index.php");
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<!-- styling -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
	<!-- profile user yang sedang login -->
	<div class="profile">
		<img src="img/profile.jpg">
		<p>Welcome, <?php echo $_SESSION['nama'] ?></p>
	</div>
	<br>

	<!-- button logout dari session -->
	<input type="button" onclick="logout();" value="logout" class="btn btn-primary"> 

	<h1>PT XYZ</h1>
	<!-- tombol search -->
	<input type="text" class="form-control" placeholder="search" id="search">
	<br>
	<button onclick="search()" class="btn btn-primary">Search</button>
	<br>
	<br>
	<!-- membuat button dengan function untuk ke page create post -->
	<input type="button" onclick="buatPost();" value="Buat Post" class="btn btn-primary"> 
	<br>

	<h1>POSTS</h1>
	<div class="postgroup">
	<?php 
		//mengambil data post
		$sql = "select * from post";
		$query = mysqli_query($conn, $sql);
		$numrows = mysqli_num_rows($query);
		for ($i=1; $i <= $numrows; $i++) { 
			$result = mysqli_fetch_array($query);
			$id = $result['id'];
			$nama = $result['nama'];
			$title = $result['title'];
			$caption = $result['caption'];
			$hashtag = $result['hashtag'];
			?>
	<div class="post">
		<img src="img/profile.jpg">
		<div class="notImage">
		<!-- mencetak data post -->
		<p>Posted by : &nbsp;<?php echo $nama ?></p>
		<h2><?php echo $title ?></h2>
		<p><?php echo $caption ?></p>

		<!-- Comment comment pada post -->
		<p>Comments :</p>
		<?php 
			//mengambil data comment comment yang berada di id post ini
			$sqlc = "select * from comment where postid ='$id'";
			$queryc = mysqli_query($conn, $sqlc);
			$numrowsc = mysqli_num_rows($queryc);
			for ($a=1; $a <= $numrowsc ; $a++) { 
				$resultc = mysqli_fetch_array($queryc);				
				$idc = $resultc['id'];
				$namec = $resultc['nama'];
				$comment = $resultc['comment'];
		  ?>

		<!-- mencetak data comment -->
		<div class="comment">
			<div class="block">		  		
		  	<p>Commenter : &nbsp; <?php echo $namec ?></p>
		  	<p>Comment : &nbsp; <?php echo $comment ?></p>
		  	</div>

		  	<?php 
		  		//membuat function if jika user yang sedang posting memiliki otoritas untuk mengedit dan delete comment atau tidak
		  		if ($namec == $_SESSION['nama']) {
		  			
		  	?>
		  	 	<button id="<?php echo $idc ?>" onclick="editcomment(this.id);" class="btn btn-success">Edit</button>
		  	 	<button id="<?php echo $idc ?>" onclick="deletecomment(this.id)" class="btn btn-danger">Delete</button>
		  	 <?php 
		  		}
		  	?>
		 </div>
		 
		 <?php 
			}
		 ?>

		</div>

		<!-- Grouping button button post agar bisa di styling rapi -->
		<div class="postbuttons">
			
		<?php 
			//membuat function jika user ini tidak sesuai maka button edit delete tidak akan tampil
			if ($_SESSION['nama'] == $nama) {
				?>
			<button id="<?php echo $id ?>" class="btn btn-success" value="edit" onclick="edit(this.id)">Edit</button>
			<button id="<?php echo $id ?>" class="btn btn-danger" value='Delete' onclick="deletePost(this.id)">Delete</button>
		<?php 
			}
			else{
			?>
			<!-- jika ternyata usernya tidak sesuai, akan mencetak div kosong agar rapi(justify content space between) -->
			<div></div>
			
			<?php
			}
		 ?>
		 <!-- semua user bisa mengcomment, jadi tidak diberi function if -->
		 <button id="<?php echo $id ?>" value='Comment' onclick="comment(this.id)" class="btn btn-secondary">Comment</button>
		</div>

	</div>

		<?php
		}
	 	?>
	</div>
	</div>

	<!-- menghubungkan dengan script.js -->
	<script src="script.js"></script>
</body>
</html>