<?php
require 'config.php';
if(isset($_POST["submit"]))
{
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpass = $_POST["cpass"];
    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email' ");

    if(mysqli_num_rows($duplicate) > 0)
    {
        echo "<script>alert('User already exists.');</script>";
    }
    else
    {
        if($password == $cpass)
        {
            $query = "INSERT INTO user VALUES('','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo "<script>alert('Registered Successfully.');</script>";
        }
        else
        {
            echo "<script>alert('Password does not match.');</script>";
        }
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
        <form name="form" id="form" action="./registration.php" method="POST">
            <input type="name" id="name" name="username" placeholder="username" required>
            <input type="email" id="email" name="email" placeholder="Email address" required>
            <input type="password" id="password" name="password" placeholder="Password" autocomplete="none" required>
            <input type="password" id="cpass" name="cpass" placeholder="Confirm Password" autocomplete="none" required>
            <input type="submit" name="submit" value="Register">
            <a href="./login.php">Login Here</a>
        </form>
    </div>
</body>



</html>

