<?php
$mysqli = new mysqli("localhost","root","","zoo_db");
if ($mysqli->connect_error){
  die("Connection failed: " . mysqli_connect_error());
}

?>

