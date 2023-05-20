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
				<table class="table" border="1">
					<thead>
						<tr>
							<td align="center" colspan="9">
						     	<a href='Tadminregister.php'>
						     		<button type='button'>
						     			Add New Customer
						     		</button>
						     	</a>
						     </td>
					    <tr>
					      <th scope="col">#</th>

					      <th scope="col">Image</th>
					      <th scope="col">User Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Password</th>
					      <th scope="col">Phone</th>
					      <th scope="col">Gender</th>

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
						      			<td><img src='$row[Image]' alt='no pic' width = '200px' height = '70px'></td>
						      			<td>$row[Name]</td>
						     			<td>$row[Price]</td>
						     			
						     			<td>
						     				<a href='delete.php ? Id=$row[Id]'>
						     					<button type='button'>
						     						Delete 
						     					</button>
						     				</a>
						     			</td>
						     			<td>
						     				<a href='delete.php ? Id=$row[Id]'>
						     					<button type='button'>
						     						Update 
						     					</button>
						     				</a>
						     			</td>
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