<?php

	//include db connection_aborted()
	include 'config.php';

	if(isset($_POST['upload']))
	{
		$NAME =$_POST['name'];
		$PRICE =$_POST['price'];
		$IMAGE =$_FILES['image'];
		print_r($_FILES['image']);
		$img_loc = $_FILES['image']['tmp_name'];
		$img_name = $_FILES['image']['name'];
		move_uploaded_file($img_loc, 'uploadimage/'.$img_name);
		$img_des = "uploadimage/".$img_name;
		// insert data

		mysqli_query($con, "INSERT INTO tblcard(Name, Price, Image) VALUES ('$NAME','$PRICE','$img_des')");
		header('location: index.php');
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

</body>
</html>