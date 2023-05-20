<?php
	require 'Theader.php';
	require 'Tconnection.php';

	$username="";
	$err_username="";
	$password="";
	$err_password="";

	$Invalid_User="";

	$hasError=false;

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{

		if(empty($_POST["username"]))
		{
			$err_username="*Username Required ";
			$hasError = true;
		}
		else
		{
			$username=$_POST["username"];
		}


		if(empty($_POST["password"]))
		{
			$err_password="*Password Required ";
			$hasError = true;
		}
		else
		{
			$password=$_POST["password"];
		}

		if(!$hasError)
		{
			echo $_POST["username"]."<br>";
			echo $_POST["password"]."<br>";

			$query = "SELECT * FROM users WHERE username = '$username' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
						$_SESSION["user_id"] = $user_data["user_id"];
						$_SESSION["username"] = $user_data["username"];
						$_SESSION["email"] = $user_data["email"];
						$_SESSION["password"] = $user_data["password"];
						$_SESSION["phone"] = $user_data["phone"];
						$_SESSION["gender"] = $user_data["gender"];
						$conn->close();
						header("Location: Thome.php");
						die;
					}
				}
			}
			$Invalid_User="*Wrong username or password!";
			
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Burger Bliss</title>
</head>
<body>
	<center>
		<h1>Welcome to Burger Bliss!</h1><br>
        <h3>User Login</h3>
			<form style="max-width: 25rem" action="" method="post">
				<fieldset>
            	<legend>Login:</legend>
					<table border="2">
						<tr>
							<td>Username: </td>
							<td><input type="text" name="username" value="<?php echo $username;?>" placeholder="Username"> </td>
							<td><span style="color: red"><?php echo $err_username;?> </span> </td>
						</tr>

						<tr>
							<td>Password: </td>
							<td><input type="password" name="password" value="<?php echo $password;?>" placeholder="Password"> </td>
							<td><span style="color: red"><?php echo $err_password;?> </span> </td>
						</tr>

						<tr>
							<td align="center" colspan="3"><span style="color: red"><?php echo $Invalid_User;?> </span> </td>
						</tr>

						<tr>
							<td align="center" colspan="3"><input type="submit" name="login" value="Login"> </td>
						</tr>					
					 </table>
				</fieldset>
				<br><br><br>
				<span style="float:left;">New here? <a href="Tregister.php">Register</a></span>
				<span style="float:right;"><a href="Trecover.php">Forgot Password</a></span>
			</form>
	</center>
	<?php include 'Tfooter.php'; ?>
</body>
</html>