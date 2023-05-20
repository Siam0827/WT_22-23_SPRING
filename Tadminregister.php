<?php
require 'Tconnection.php';
function pic_upload($des)
{
        $con = getConnection();
        $sql = "UPDATE `user` SET `img` = '$des' WHERE `user`.`ID` = 126";
        if(mysqli_query($con, $sql)){
            return true;
    }else{
        return false;
    }   
}
    
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
    $image=[];
    $img_des="";
    $img_loc="";
    $img_name="";
    $err_image="";
    $path=[];

    

    $hasError = false;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        if(empty($_FILES['image']['tmp_name']))
        {
            $err_image="*Image Required";
            $hasError = true;
        }
        else
        {
            $image =$_FILES['image'];
            $img_loc = $_FILES['image']['tmp_name'];
            $img_name = $_FILES['image']['name'];
            $path = pathinfo($img_name);

            move_uploaded_file($img_loc, 'CustomerImage/'.$img_name);
            $img_des = "CustomerImage/".$img_name;
        }


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
            $sql = "INSERT INTO customer (username, email, password, phone, gender, image)VALUES ('$username', '$email', '$password', '$phone', '$gender' ,'$img_des')";
            
            if ($conn->query($sql) === TRUE) 
            { 
                echo "New record created successfully";
                print_r($image);
                print_r($path);

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
		<form style="max-width: 25rem" action="" method="post" enctype="multipart/form-data">
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
                            <td>Image: </td>
                            <td>
                                <input type="file" name="image" value="<?php echo $path ?>"  accept="image/*">
                            </td>
                            <td><span style="color: red"><?php echo $err_image;?> </span> </td>
                        </tr>

	                    <tr>
	                        <td align="center" colspan="3"><input type="submit" value="Register"></td>
                           
	                    </tr>
	                </table>
	        </fieldset>
	        <br><br><br>
            <span><a href="TcrudOperationCustomer.php">Go Back</a></span>
	    </form>
	</center>
	<?php include 'Tfooter.php';  ?>
</body>
</html>