<?php 
$dbhost = 'localhost';
$dbuser = 'dapps';
$dbpass = 'l1m4d1g1t';
$dbname = 'dapps_joker_pertamina_lubricantapp';

// mysql_connect($dbhost,$dbuser,$dbpass);
// mysql_select_db($dbname);


$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


?>