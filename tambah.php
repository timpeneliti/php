<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD by adezayd</title>
</head>
<body>
<p><a href="index.php">Beranda</a>
	<form action="tambah-proses.php" method="post">
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>NIS</td>
				<td>:</td>
				<td><input type="text" name="_a" required></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td><select name="_b"> 
					<option>Select</option>
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
			<td><input type="submit" name="tambah" value="Tambah"></td>
		</tr>
	</table>
</form>
</body>
</html>