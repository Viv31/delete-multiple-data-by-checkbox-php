<?php 
$db_host = "localhost";
$db_user = "root";
$db_pwd = "";
$db_name = "delete_multiple_records_php";
$conn = mysqli_connect($db_host,$db_user,$db_pwd,$db_name);
if($conn){
}else{
	echo "Connection Error";
}

?>