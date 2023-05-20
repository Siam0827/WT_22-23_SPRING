<?php
    require 'Theader.php';
    require 'TloadFoods.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Burger Bliss</title>
</head>
<body> 
    <?php
    if (isset($_SESSION["username"])) 
    {
        TloadFoods();
        include 'Tfooter.php';
        
    }  
    else
    {
        header("Location: Tlogin.php");
        die();
    }

    ?>

</body>
</html>