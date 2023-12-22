<?php


$connection = mysqli_connect("localhost", "root", "", "docstack");

$query = "DELETE from files where id = $_GET[p]";

if(mysqli_query($connection,$query))
{
    header("location:./vault.php");
    header("location:./vault.php");
}

?>