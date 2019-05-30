<?php
DEFINE ('DB_USER', 'cs319_1_spr2019_group6_db');
	DEFINE ('DB_PASSWORD', 'cs319$@z@Jd');
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_NAME', 'cs319_1_spr2019_group6_db');
	
	
	 $_GET['num'];
	 $_GET['im'];
	 $_GET['tx'];
	// Create database connection
  $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
  
  
$id =$_GET['id'];
$query = "DELETE FROM images IMAGES id='$id'";

$data= mysqli_query($conn, $query);
if($data)
{
	echo "Stroy Deleted";
}
else
{
	echo "Not Deleted";
}
?>