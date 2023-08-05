<?php
$conn = mysqli_connect("localhost","root","","zoo_db");
if (!$conn) {
  echo "connecton failed";
  die("Connection failed: " . mysqli_connect_error());
}

?>

