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
        <form name="form" id="form" action="/" method="GET">
            <span class="error" id="userError" style="color: rgb(255, 80, 80); text-align: center;">&nbsp;</span>
            <input type="text" id="userName" name="userName" placeholder="Username">
            <span class="error" id="emailError" style="color: rgb(255, 80, 80); text-align: center;"> &nbsp;</span>
            <input type="email" id="email" name="email" placeholder="Email address">
            <span class="error" id="passError" style="color: rgb(255, 80, 80); text-align: center;">&nbsp; </span>
            <input type="password" id="pass" name="password" placeholder="Password" autocomplete="none">
            <input type="submit" name="submit" value="Login">
            <a href="./indexregister.html">Register Here</a>
        </form>
    </div>
</body>

<script>
    const userName = document.getElementById('userName');
    const userError = document.getElementById('userError');
    const email = document.getElementById('email'); 
    const emailError = document.getElementById('emailError'); 
    const password = document.getElementById('pass');
    const passError = document.getElementById('passError');
    const form = document.getElementById('form');
    
    form.addEventListener('submit', (e) =>{
        let msg = []
        let emailerr = []
        let passerr = []

        if(userName.value === '' || userName.value == null)
        {
            msg.push('*Username cannot be blank.');
            userName.style.border = "2px solid red";
        }
        else
        {
            msg.push('');
            userName.style.border = "2px solid lime";
        }

        if(email.value === '' || email.value == null)
        {
            emailerr.push('*Email cannot be blank.');
            email.style.border = "2px solid red";
        }
        else
        {
            emailerr.push('');
            email.style.border = "2px solid lime";
        }

        if(password.value === '' || password.value == null)
        {
            passerr.push('*Password cannot be blank.')
            pass.style.border = "2px solid red";
        }
        else
        {
            passerr.push('');
            pass.style.border = "2px solid lime";
        }

        if(msg.length > 0){
            e.preventDefault();
            userError.innerText = msg.join(',')
        }        
        else{}
        if(emailerr.length > 0){
            e.preventDefault();
            emailError.innerText = emailerr.join(',')
        }        
        else{}
        if(passerr.length > 0){
            e.preventDefault();
            passError.innerText = passerr.join(',')
        }
        else{}
    });
</script>

</html>

<?php
   
    $servername = "localhost"; 
    $username = "root"; 
    $password = "";
   
    $database = "geeksforgeeks";
   
     // Create a connection 
     $conn = mysqli_connect($servername, 
         $username, $password, $database);
   
    // Code written below is a step taken
    // to check that our Database is 
    // connected properly or not. If our 
    // Database is properly connected we
    // can remove this part from the code 
    // or we can simply make it a comment 
    // for future reference.
   
    if($conn) {
        echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    } 
?>