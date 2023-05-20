<?php
	include 'config.php';
	$ID =$_GET['Id'];
	echo "$ID";
	mysqli_query($con, "DELETE FROM tblcard WHERE Id = $ID ");
	header('location: index.php');
?>