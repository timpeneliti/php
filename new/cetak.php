<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<table cellpadding="5" cellspacing="0" border="1" style="width: 100%">
		<tr bgcolor="#CCCCCC">
			<th>No</th>
			<th>a</th>
			<th>b</th>
		</tr>
		<?php
		include('koneksi.php');
		$query = mysqli_query($koneksi, "SELECT * FROM a LEFT JOIN b ON a.a2 = b.b0 ORDER BY a0 ASC") or die(mysqli_error());
		if(mysqli_num_rows($query) == 0){
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
		}
		else{
			$no = 1;
			while($data = mysqli_fetch_assoc($query)){
				echo '<tr>';
				echo '<td>'.$no.'</td>';
				echo '<td>'.$data['a1'].'</td>';
				echo '<td>'.$data['b1'].'</td>';
				$no++;
			}
		}
		
		
		?>
	</table>
		<script>
		window.print();
	</script>
</body>
</html>