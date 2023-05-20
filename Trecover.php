<?php
    require 'Theader.php';
    require 'Trecovary.php';
    require 'Tconnection.php';

    $email="";
    $err_email="";
    
    $hasError = false;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        
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
  
    }
?>
    <center>
        <h1>Account Recovery</h1><br>
        <h3>Recover your Burger Bliss account</h3>
        <form style="max-width: 25rem" action="" method="post">
            <fieldset>
            <legend>Recover:</legend>
                <table border="1" >
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" id="email" name="email" value="<?php echo  $email ?>" placeholder="Email"> </td>
                        <td><span style="color: red"><?php echo $err_email;?> </span> </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="3"><input type="submit" value="Recover"> </td>   
                    </tr>
                           
                </table>
            </fieldset>
            <br><br><br>
            <span style="float:left;">Back to <a href="Tlogin.php">Login</a></span>
            <span style="float:right;"><a href="Tregister.php">Create a New Account</a></span>
        </form>
        <br><br>
        <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST" && !$hasError) 
            {
                Trecovary(); 
            }
        ?>
        <br><br>
        <br><br>
    </center>

<?php include 'Tfooter.php'; ?>