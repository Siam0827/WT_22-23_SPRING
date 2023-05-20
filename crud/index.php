<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<center>
		<div class="main">
			<form action="insert.php" method="POST" enctype="multipart/form-data">
				<label for="">Name:</label>
				<input type="text" name="name"><br>

				<label for="">Price:</label>
				<input type="text" name="price" id=""><br>

				<label for="">Image:</label>
				<input type="file" name="image" id=""><br>

				<button name="upload">Upload</button>

				<table class="table" border="1">
				<thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Price</th>
				      <th scope="col">Image</th>
				      <th scope="col">Delete</th>
				      <th scope="col">Update</th>
				    </tr>
				</thead>
				<tbody>
				   <?php
					   include 'config.php';
					   $pic = mysqli_query($con, "SELECT * FROM tblcard");

						while($row = mysqli_fetch_array($pic)) 
						{
						    echo "<tr>
					      			<th>$row[Id]</th>
					      			<td>$row[Name]</td>
					     			<td>$row[Price]</td>
					     			<td><img src='$row[Image]' alt='no pic' width = '200px' height = '70px'></td>
					     			<td>
					     				<a href='delete.php ? Id=$row[Id]'>
					     					<button type='button'>
					     						Delete 
					     					</button>
					     				</a>
					     			</td>
					     			<td><a href=''>Update</a></td>
					     		  </tr> 
					   			 ";
						}
					?>  
				</tbody>
				</table>
			</form>
		</div>
	</center>

</body>
</html>