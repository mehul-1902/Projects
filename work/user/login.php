<?php

require 'config.php';


if(isset ($_POST["submit"])){
	$usernameemail = $_POST["usernameemail"];
	$password = $_POST["password"];
	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail' ");
	$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) > 0){

	if($password == $row["password"])
	{
		$_SESSION["login"] = true;
		$_SESSION["id"] = $row["id"];
		header("Location: ../afterindex.php");

	}
	else
	{
		echo
		"<script>alert('wrong password.');</script>";
	}
}
else
{	
		echo
		"<script>alert('not registered yet.');</script>";
}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1><a href="../index.html">DOCSTACK</a></h1>
        <form name="form" id="form" action="./login.php" method="POST">
            <input type="email" id="usernameemail" name="usernameemail" placeholder="Email address" required>
            <input type="password" id="password" name="password" placeholder="Password" autocomplete="none" required>
            <input type="submit" name="submit" value="Login">
            <a href="./registration.php">Register Here</a>
        </form>
    </div>
</body>



</html>

