<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Burger Bliss</title>
</head>

<body>

<table border="1" style="border-collapse: collapse; width: 100%;">
    <tbody>
        <tr>
            <td align="center" ><a href="Thome.php"><img width="200px" height="100px" src=img/burger.jpg alt="Logo"></a></td>
            <?php
                if (isset($_SESSION["username"])) 
                {
                    echo '<td align="center" >
                            <h2>
                                <a href="Thome.php">Home</a> 
                            </h2>
                          </td>

                          <td align="center" >
                            <h2>
                                <a href="Tsearch.php">Search Foods</a> 
                            </h2>
                          </td>

                          <td align="center" >
                            <h2>
                                <a href="Tprofile.php">View Profile</a> 
                            </h2>
                          </td>
                        
                          <td align="center" >
                            <h2>
                                <p>Welcome ' . $_SESSION["username"] . '     
                            </h2>
                          </td>
                          <td align="center" >
                            <h2>
                                <a href="Tlogout.php"> Sign out</a>
                            </h2>
                          </td>

                          ';
                }
            ?>
        </tr>
    </tbody>
</table>

<hr>
</body>
</html>