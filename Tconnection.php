<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="bb";
$conn = new mysqli($servername, $username, $password,$dbname);
if(!$conn = mysqli_connect($servername, $username, $password,$dbname))
{
	die("failed to connect!");
}
