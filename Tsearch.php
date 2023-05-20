<?php
    require 'Theader.php';
    require 'TsearchFoods.php';
    $search="";
    $err_search="";

    $hasError=false;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {     
        if(empty($_POST["search"]))
        {
            $err_search="*Search Required ";
            $hasError = true;
        }

        else
        {
            $search=$_POST["search"];
        }

        if(!$hasError)
        {
            echo $_POST["search"]."<br>";
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
        <h1>Search for Your Favourite Foods</h1>
        <form action="" method="post">
            <table border="1">
                <tr>
                    <td><input type="text" name="search" placeholder="Type anything to search" value="<?php echo $search ?>"></td>
                </tr>
                <tr>
                    <td><span style="color: red"><?php echo $err_search;?> </span> </td>
                </tr>
                <tr>
                     <td align="center"><input type="submit" value="Search"></td>
                </tr>
            </table>
        </form>
        <br><br>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') Tsearch(); ?>
        <br><br>
        <h3>Go Back to <a href="Thome.php">Home</a></h3>
    </center>
    <?php include 'Tfooter.php'; ?>
</body>
</html>
