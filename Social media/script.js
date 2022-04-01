//pindah ke page logout, yaitu session destroy dan kembali ke login
function logout() {
	location.href = "logout.php";	
}

//ke page register untuk membuat akun
function register() {
	location.href = "register.php";	
}

//ke page create post
function buatPost() {
	location.href = "buatPost.php";
}

//kembali ke home	
function home() {
	location.href = "home.php";
}

// ke page edit, dan mengirim id post agar mengubah data post yang benar
function edit(id) {
	var url = "editPost.php?id=" + id;
	location.href = url;
}

//menghapus post sesuai id
function deletePost(id) {
	var url = "crudPost.php?cmd=delete&id=" + id;
	location.href = url;
}

//ke page comment dan mengirim data lokasi comment sesuai post id yang benar
function comment(id) {
	var url = "comment.php?postid=" + id;
	location.href = url;
}

//ke page edit comment dan mengirim data lokasi comment sesuai post id yang benar
function editcomment(id) {
	var url = "editComment.php?id=" + id;
	location.href = url;
}

//menghapus comment sesuai id comment
function deletecomment(id) {
	var url = "crudComment.php?cmd=delete&id=" + id;
	location.href = url;
}

function search() {
	var search = document.getElementById('search').value;

	var url = "hasilSearch.php?search=" + search;
	location.href = url;
}