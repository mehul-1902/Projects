<?php
    session_start();
    $localhost="127.0.0.1";
    $user="root";
    $pass="";
    $database="epiz_27280881_coder";
   
    $con=mysqli_connect($localhost,$user,$pass,$database);
    if(!$con)
    {
        die("Connection Failed :".mysqli_connect_error());
    }
   
        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($con,$email);
        $pass = stripslashes($_POST['password']);
        $pass = mysqli_real_escape_string($con,$pass);
        $pass = md5($pass);
        $query="select *from user where email='$email' && password='$pass';";
        $result = mysqli_query($con,$query);
        
        $row=mysqli_fetch_array($result);
        
        if($row!=null)
        {
            $_SESSION['id'] = $row[0];
            $_SESSION['mail'] = $email;
            $_SESSION['uname']= $row[1];
            header("location:../project8logout");
        }
        else
        {
            echo "<script type='text/javascript'>alert('WRONG EMAIL or PASSWORD');";
            echo  'window.location= "../index.php";';
            echo "</script>";
            //header("location:../index.php");
        }
?>