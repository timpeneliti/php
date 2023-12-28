<?php
if(isset($_GET['id'])){
	include('koneksi.php');
	$id = $_GET['id'];
	$cek = mysqli_query($koneksi, "SELECT a0 FROM a WHERE a0='$id'") or die(mysqli_error());
	if(mysqli_num_rows($cek) == 0){
		echo '<script>window.history.back()</script>';
	}
	else{
		$del = mysqli_query($koneksi, "DELETE FROM a WHERE a0='$id'");
		if($del){
			echo 'Data siswa berhasil di hapus! ';
			echo '<a href="index.php">Kembali</a>';
		}
		else{
			echo 'Gagal menghapus data! ';
			echo '<a href="index.php">Kembali</a>';
		}
	}	
}
else{
	echo '<script>window.history.back()</script>';	
}
?>