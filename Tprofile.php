<?php
    require 'Theader.php';  
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
        <h1>User Profile</h1>
        <form style="max-width: 25rem" method="post" >
            <fieldset>
            <legend>Profile:</legend>
                <table border="1" >
                    <tr>
                        <td><b>User ID:</b></td>
                        <td><?php echo $_SESSION['user_id'] ?></td>
                    </tr>
                    <tr>
                        <td><b>User Name:</b></td>
                        <td><?php echo $_SESSION['username'] ?></td>
                    </tr>
                    <tr>
                        <td><b>User Email:</b></td>
                        <td><?php echo $_SESSION['email'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Password:</b></td>
                        <td><?php echo $_SESSION['password'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Phone Number:</b></td>
                        <td><?php echo $_SESSION['phone'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Gender:</b></td>
                        <td><?php echo $_SESSION['gender'] ?></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type="submit" value="Modify Details"></td>
                    </tr>  
                </table>
            </fieldset>
        </form>
    </center>
    <?php 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            header("location: Tmodify.php");
            die();
        } 
    ?>
    <?php include 'Tfooter.php' ?>
</body>
</html>