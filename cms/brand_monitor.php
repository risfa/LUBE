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
			<td>IdLube</td>
			<td>IdFuel</td>
			<td>Foto</td>
		</tr>
	<?php   
	$no = 1;
		$sql_ambil_jenis_kendaraan = mysql_query("SELECT * FROM tb_jenisbrand");
		while($row_jenis_kendaraan = mysql_fetch_array($sql_ambil_jenis_kendaraan)){
			echo "<tr>
				<td colspan='7'>".$row_jenis_kendaraan[1]."</td>
			</tr>";		
			$sql_ambil_series_kendaraan = mysql_query("SELECT *, tb_brand.NamaBrand FROM tb_type 
			JOIN tb_brand ON tb_brand.IdBrand = tb_type.IdBrand WHERE ID_jenisbrand = '$row_jenis_kendaraan[0]' ORDER BY NamaBrand ASC");
			while($row_series_kendaraan = mysql_fetch_array($sql_ambil_series_kendaraan)){
	?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $row_series_kendaraan['NamaBrand']."-".$row_series_kendaraan['IdBrand']; ?></td>
						<td><?php 
							$ambil_varian = mysql_fetch_array(mysql_query("SELECT * FROM tb_series WHERE IdSeries = '$row_series_kendaraan[IdSeries]'"));
							echo $ambil_varian['Series'];
						 ?></td>
						<td><?php echo $row_series_kendaraan['NamaMotor']; ?></td>
						<td><?php 
							$ambil_lube_mix_n_match = mysql_fetch_array(mysql_query("SELECT * FROM tb_mixnmatch WHERE IdSeries = '$row_series_kendaraan[IdSeries]' AND IdBrand = '$row_series_kendaraan[IdBrand]'AND idType = '$row_series_kendaraan[idType]'"));
							if($ambil_lube_mix_n_match['IdLube']==''){
								echo "<b style='color:red;' class='blink_me'>Lube Kosong</b>";
							}else{
								$data_lube = mysql_fetch_array(mysql_query("SELECT * FROM tb_lube WHERE IdLube = '$ambil_lube_mix_n_match[IdLube]'"));
								echo $data_lube['NamaLube'];
							}
						 ?></td>

						 <td><?php 
							$ambil_fuel_mix_n_match = mysql_fetch_array(mysql_query("SELECT * FROM tb_mixnmatch WHERE IdSeries = '$row_series_kendaraan[IdSeries]' AND IdBrand = '$row_series_kendaraan[IdBrand]'AND idType = '$row_series_kendaraan[idType]'"));
							if($ambil_fuel_mix_n_match['idfuel']==''){
								echo "<b style='color:red;' class='blink_me'>Lube Kosong</b>";
							}else{
								$data_fuel = mysql_fetch_array(mysql_query("SELECT * FROM tb_fuel WHERE idfuel = '$ambil_fuel_mix_n_match[idfuel]'"));
								echo $data_fuel['fuel'];
							}
						 ?></td>
						 <td>
						 	<img src="../public/img/img_kendaraan/<?php echo $row_series_kendaraan[idType] ?>.jpg" alt="" height="100px">
						 </td>
						
					</tr>
	<?php
			$no++;

			}
		}
	 ?>
	</table>

</body>
</html>