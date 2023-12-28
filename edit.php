<!DOCTYPE html>
<html>
<head>
	<title>adezayd</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function autoSave() {
        console.log("Auto-save triggered");  // This will log a message every time auto-save is triggered.
        
        const formData = {
            'id': $("input[name='id']").val(),
            '_a': $("input[name='_a']").val(),
            '_b': $("select[name='_b']").val()
        };

        $.post("edit-proses.php", formData, function(response) {
            console.log("Data saved:", response);
        });
    }

    setInterval(autoSave, 5000);  // Try with a simpler interval, like every 5 seconds.
});

</script>


</head>
<body>
	<p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>
	<?php
	include('koneksi.php');
	$id = $_GET['id'];
	$show = mysqli_query($koneksi, "SELECT * FROM a WHERE a0='$id'");
	if(mysqli_num_rows($show) == 0){
		echo '<script>window.history.back()</script>';
	}
	else{
		$data = mysqli_fetch_array($show);
	}
	?>
<form action="edit-proses.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>a</td>
				<td>:</td>
				<td>
				<input type="text" name="_a" value="<?php echo htmlspecialchars ($data["a1"]); ?>" required>
				</td>
			</tr>
			<tr>
				<td>b</td>
				<td>:</td>
				<td>
				<select name="_b"> 
					<option value="<?php echo htmlspecialchars ($data["a2"]); ?>"> <?php 
					include('koneksi.php');
					$id = $_GET['id'];
					$show = mysqli_query($koneksi, "SELECT * FROM a INNER JOIN b ON a.a2=b.b0 WHERE a0='$id'");
					if(mysqli_num_rows($show) == 0){
						echo '<script>window.history.back()</script>';
					}
					else{
						$data = mysqli_fetch_array($show);
					}
					echo $data['b1']; ?>
					</option>
					<?php
					include('koneksi.php');
					$q=mysqli_query($koneksi, "SELECT * FROM b");
					while($d=mysqli_fetch_array($q))
					{
						echo "<option value='$d[b0]'> $d[b1] </option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td></td>
			<td><input type="submit" name="simpan" value="Simpan"></td>
		</tr>
	</table>
</form>
</body>
</html>