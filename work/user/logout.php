<?php
 require 'config.php';
 include 'login.php';
 $_SESSION = [''];
session_unset();
session_destroy();
header("Location: ../index.html");

?>