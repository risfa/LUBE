<?php 
	include '../connect.php';
	$idBrand = $_POST['value'];
	$idVehicle = $_POST['vehicle'];


	$sql_vehicle = mysqli_query($con,"SELECT * FROM `tb_series` JOIN tb_jenisbrand ON tb_series.ID_jenisbrand = tb_jenisbrand.ID_jenisbrand JOIN tb_brand ON tb_series.IdBrand = tb_brand.IdBrand WHERE tb_series.ID_jenisbrand = '$idVehicle' and tb_series.IdBrand = '$idBrand' GROUP by tb_series.Series");
	while($result_vehicle = mysqli_fetch_assoc($sql_vehicle)){
		$vehicle [] = $result_vehicle; 
	}
	echo json_encode($vehicle);
?>