<?php 
	include '../connect.php';
	 $id = $_POST['value'];
     // $id = '14';
	 // echo $id;
     $sql_car = "SELECT * FROM `tb_series` JOIN tb_jenisbrand ON tb_series.ID_jenisbrand = tb_jenisbrand.ID_jenisbrand WHERE tb_series.IdBrand = '$id' GROUP by tb_jenisbrand.JenisBrand";
     $query_car = mysqli_query($con,$sql_car);

     while ($result_car = mysqli_fetch_assoc($query_car)) {
     	$feedback [] = $result_car;
     	// echo $result_car['JenisBrand'];
     }
    echo json_encode($feedback);
     ?>