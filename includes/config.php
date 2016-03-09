<?php
$mysql_hostname="localhost";
$mysql_user="root";
$mysql_password="";
$mysql_database="moblib";

$bd=mysqli_connect($mysql_hostname,$mysql_user,$mysql_password,$mysql_database)or die("Something went wrong. Try again.");
//mysql_select_db("$mysql_database,$bd") or die("Something went wrong. Try again.");
?>
