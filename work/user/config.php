<?php
 session_start();
$conn = mysqli_connect("localhost", "root", "", "docstack");

// Checking the  connection
if (!$conn) {
  die("Failed ". mysqli_connect_error());
}

?>