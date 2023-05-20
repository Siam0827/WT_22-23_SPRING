<?php
    require 'Theader.php';
    require 'Tconnection.php';
    $user_id="";
    $err_user_id="";
    $username="";
    $err_username="";
    $email="";
    $err_email="";
    $password="";
    $err_password="";
    $phone="";
    $err_phone="";
    $gender="";
    $err_gender="";

    $hasError = false;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

       
        if(empty($_POST["username"]))
        {
            $err_username="*Username Required";
            $hasError = true;
        }
        elseif(strlen($_POST["username"]) < 2)
        {
            $err_username="*Username must be grater than 2";
            $hasError = true;
        }
        else
        {
            $username=$_POST["username"];
        }


         if(empty($_POST["email"]))
        {
            $err_email="*Email Required";
            $hasError = true;
        }
        elseif(strlen($_POST["email"]) < 2)
        {
            $err_email="*Email must be grater than 2";
            $hasError = true;
        }
        else
        {
            $email=$_POST["email"];
        }


        if(empty($_POST["password"]))
        {
            $err_password="*Password Required";
            $hasError = true;
        }
        elseif(strlen($_POST["password"]) < 2)
        {
            $err_password="*Password must be grater than 2";
            $hasError = true;
        }
        else
        {
            $password=$_POST["password"];
        }


        if(empty($_POST["phone"]))
        {
            $err_phone="*Phone Required";
            $hasError = true;
        }
        elseif(strlen($_POST["phone"]) < 2)
        {
            $err_phone="*Phone must be grater than 2";
            $hasError = true;
        }
        else
        {
            $phone=$_POST["phone"];
        }

        if(!isset($_POST["gender"]))
		{
			$err_gender = "* Gender Required";
			$hasError = true;
		}
		else
		{
			$gender = $_POST["gender"];
		}


        if(!$hasError)
        {
            if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            }

            
          
            $sql = "INSERT INTO users (username, email, password, phone, gender)VALUES ('$username', '$email', '$password', '$phone', '$gender')";
            
            if ($conn->query($sql) === TRUE) 
            {
                 
                echo "New record created successfully";

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
            }
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }     
        }
        
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
	<center>
	<h1>Create an Account</h1>
		<form style="max-width: 25rem" action="" method="post">
			<fieldset>
	            <legend>Register Profile:</legend>
	                <table border="1">
                        
	                    <tr>
	                        <td>Username: </td>
							<td><input type="text" name="username" value="<?php echo $username;?>" placeholder="Username"> </td>
							<td><span style="color: red"><?php echo $err_username;?> </span> </td>
	                   	</tr>
	                    <tr>
	                        <td>Email:</td>
	                        <td><input type="email" name="email" value="<?php echo  $email ?>" placeholder="Email"> </td>
	                        <td><span style="color: red"><?php echo $err_email;?> </span> </td>
	                    </tr>
	                    <tr>
	                        <td>Password:</td>
	                        <td><input type="password" id="password" name="password" value="<?php echo $password ?>" placeholder="Password"></td>
	                        <td><span style="color: red"><?php echo $err_password;?> </span> </td>
	                    </tr>
	                    <tr>
	                        <td>Phone Number:</td>
	                        <td><input type="text" id="phone" name="phone" value="<?php echo $phone ?>" placeholder="Phone Number"> </td>
	                        <td><span style="color: red"><?php echo $err_phone;?> </span> </td>
	                    </tr>
	                    <tr>
							<td>Gender: </td>
							<td><input type="radio" value="Male" <?php if($gender =="Male") echo "checked";?> name="gender"> Male <input type="radio" value="Female" <?php if($gender =="Female") echo "checked";?> name="gender"> Female </td>
							<td><span style="color: red"><?php echo $err_gender;?> </span> </td>
						</tr>

	                    <tr>
	                        <td align="center" colspan="3"><input type="submit" value="Register"></td>
                           
	                    </tr>
	                </table>
	        </fieldset>
	        <br><br><br>
            <span>Already have an account? <a href="Tlogin.php">Sign in</a></span>
	    </form>
	</center>
	<?php include 'Tfooter.php';  ?>
</body>
</html>

	
	


