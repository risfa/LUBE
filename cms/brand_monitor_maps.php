<?php 
	mysql_connect("localhost","dapps","l1m4d1g1t");
	mysql_select_db("dapps_joker_pertamina_lubricantapp");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Brand Monitor</title>
	<style type="text/css">
		.blink_me {
		  animation: blinker 0.5s linear infinite;
		}

		@keyframes blinker {
		  100% {
		    opacity: 0;
		  }
		}
	</style>
</head>
<body>
	<table border="1">
		<tr>
			<td>No</td>
			<td>Nama Brand</td> 
			<td>Series</td>
			<td>Tipe</td>
			<td>Lat</td>
			<td>Long</td>
			<td>Foto</td>
		</tr>
	<?php   
	$no = 1;
		$sql_ambil_jenis_kendaraan = mysql_query("SELECT * FROM tb_gmaps JOIN tb_admin ON tb_gmaps.id_admin = tb_admin.id_admin ORDER BY tb_admin.username");
		while($row_jenis_kendaraan = mysql_fetch_array($sql_ambil_jenis_kendaraan)){
			
	?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $row_jenis_kendaraan['name'] ?></td>
						<td>
							<?php  							echo $row_jenis_kendaraan['kota'];
						 ?></td>
						<td><?php echo $row_jenis_kendaraan['address']; ?></td>

						 <td><?php 
							
								echo $row_jenis_kendaraan['lat'];
							
						 ?></td>
						<td><?php 
							
								echo $row_jenis_kendaraan['lng'];
							
						 ?></td>
						  <td>
						 	<?php 	echo $row_jenis_kendaraan['type'] ?>
						 </td>
						 <td>
						 	<?php 	echo $row_jenis_kendaraan['username'] ?>
						 </td>
						
					</tr>
	<?php
			$no++;

		
		}
	 ?>
	</table>

</body>
</html>