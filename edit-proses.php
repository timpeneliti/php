<?php
if(isset($_POST['simpan'])){
	include('koneksi.php');
//	$id		= $_POST['id'];
//	$_1		= $_POST['_a'];
//	$_2		= $_POST['_b'];
	
	$id		= mysqli_real_escape_string($koneksi, $_POST['id']);
	$_1		= mysqli_real_escape_string($koneksi, $_POST['_a']);
	$_2		= mysqli_real_escape_string($koneksi, $_POST['_b']);
	
	$update	= mysqli_query($koneksi, "UPDATE a SET a1='$_1', a2='$_2' WHERE a0='$id'") or die(mysqli_error());
	if($update){
		echo 'Data berhasil di simpan! Auto-save aktif. ';
		echo '<a href="edit.php?id='.$id.'">Kembali</a>';
	}
	else{
		echo 'Gagal menyimpan data! Auto-save aktif. ';
		echo '<a href="edit.php?id='.$id.'">Kembali</a>';
	}
	
}
else{
	echo '<script>window.history.back()</script>';
}
?>