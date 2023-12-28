<?php
if(isset($_POST['tambah'])){
	include('koneksi.php');
// Tanpa SQL Injection
//	$_1		= $_POST['_a'];
//	$_2		= $_POST['_b'];
// mencegah	SQL Injection.
	$_1		= mysqli_real_escape_string($koneksi,$_POST['_a']);
	$_2		= mysqli_real_escape_string($koneksi,$_POST['_b']);
	
	$input	= mysqli_query($koneksi, "INSERT INTO a VALUES(0, '$_1', '$_2')") or die(mysqli_error());
	if($input){
		echo 'Data berhasil di tambahkan!';
		echo '<a href="tambah.php">Kembali</a>';
	}
	else{
		echo 'Gagal menambahkan data!';
		echo '<a href="tambah.php">Kembali</a>';
	}
}
else{
	echo '<script>window.history.back()</script>';
}
?>
