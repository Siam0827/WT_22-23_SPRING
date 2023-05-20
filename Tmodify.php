<?php
    require 'Theader.php';
    require 'Tconnection.php';

    $user_id=$_SESSION["user_id"];
    $err_user_id="";
    $username=$_SESSION["username"];
    $err_username="";
    $email=$_SESSION["email"];
    $err_email="";
    $password=$_SESSION["password"];
    $err_password="";
    $phone=$_SESSION["phone"];
    $err_phone="";
    $gender=$_SESSION["gender"];
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


        if(!$hasError)
        {
            if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "UPDATE users SET user_id ='$user_id', username ='$username', email ='$email', password ='$password', phone ='$phone', gender ='$gender' WHERE user_id ='$user_id' ";

            if ($conn->query($sql) === TRUE) 
            {
                 
                echo "Record updated successfully";

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
    <title>Burger Bliss</title>
</head>
<body>
    <center>
        <h1>Modify User Details</h1>
        <form style="max-width: 25rem" action="" method="post" >
            <fieldset>
            <legend>Profile:</legend>
                <table border="1">
                    <tr>
                        <td><b>User ID:</b></td>
                        <td ><?php echo $user_id ?></td>
                    </tr>
                    <tr>
                        <td><b>User Name:</b></td>
                        <td>
                            <input type="text" id="username" name="username" value="<?php echo $username ?>">
                        </td>
                        <td><span style="color: red"><?php echo $err_username;?> </span> </td>
                    </tr>
                    <tr>
                        <td><b>Email:</b></td>
                        <td>
                            <input type="email" id="email" name="email" value="<?php echo  $email ?>">
                        </td>
                        <td><span style="color: red"><?php echo $err_email;?> </span> </td>
                    </tr>
                    <tr>
                        <td><b>Password:</b></td>
                        <td>
                            <input type="password" id="password" name="password" value="<?php echo $_SESSION['password'] ?>">
                        </td>
                        <td><span style="color: red"><?php echo $err_password;?> </span> </td>
                    </tr>
                    <tr>
                        <td><b>Phone Number:</b></td>
                        <td>
                            <label for="phone"></label>
                            <input type="text" id="phone" name="phone" value="<?php echo $_SESSION['phone'] ?>">
                        </td>
                        <td><span style="color: red"><?php echo $err_phone;?> </span> </td>
                    </tr>
                    <tr>
                        <td><b>Gender:</b></td>
                        <td><?php echo $gender ?></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="3"><input type="submit" value="Update"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </center>
    <?php include 'Tfooter.php' ?>
</body>
</html>