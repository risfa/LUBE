<?php 
include '../connect.php';
$id_series = $_POST['value'];

$sql_type = mysqli_query($con,"SELECT * FROM `tb_series` JOIN tb_brand ON tb_series.IdBrand = tb_brand.IdBrand WHERE tb_series.IdBrand = '$id_series' ORDER BY tb_series.IdBrand");
while($result_type = mysqli_fetch_array($sql_type)){
	$type[]= $result_type;
}
echo json_encode($type);
 ?>
	
