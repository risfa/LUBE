<?php 
include '../connect.php';
$id_type = $_POST['series'];

$sql_series = mysqli_query($con,"SELECT * FROM `tb_type` JOIN tb_series ON tb_type.IdSeries = tb_series.IdSeries JOIN tb_brand ON tb_type.IdBrand = tb_brand.IdBrand WHERE tb_type.IdSeries = '$id_type' ORDER BY tb_type.IdBrand");
while($result_series = mysqli_fetch_array($sql_series)){
	$series[]= $result_series;
}
echo json_encode($series);
 ?>
	
