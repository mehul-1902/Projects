<?php

session_start();

$connection = mysqli_connect("localhost", "root", "", "docstack");


if(isset($_POST['submit']))
{
    $user = $_SESSION['id'];

	$filename = $_FILES["myfile"]["name"];

    $destiation = 'uploads/' . $filename;

    $extension = pathinfo($filename,PATHINFO_EXTENSION);

    $file = $_FILES["myfile"]["tmp_name"];

    $size = $_FILES["myfile"]["size"];  

    $allowed_type = array('zip','pdf','docx','doc');

    if(!(in_array($extension, $allowed_type)))
    {
        echo "<script>alert('file extenstion not supported.');</script>"; 

    }
    elseif($_FILES["myfile"]["size"] >1000000)
    {
        echo "<script>alert('file is too large :(');</script>";
    }
    else
    {
        if(move_uploaded_file($file, $destiation))
        {
            $sql = "INSERT INTO files VALUES('','$filename','$user')";

            if(mysqli_query($connection,$sql))
            {
                echo "<script>alert('file uploaded successfully');</script>";
            }
            else
            {
                echo "<script>alert('something went wrong :(');</script>";
            }
        }
        
    }
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>DOCSTACK</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body>
        <a class="h2" href="./afterindex.php">DOCSTACK</a>

        <div class="plus">
            <div class="bg"></div>
            <i class="fa fa-plus" id="fa" onclick="toggle()"></i>
        </div>
        <div class="vault" id="vault">
            <h1>Upload a new Document</h1>
            <form action="./vault.php" enctype="multipart/form-data" method="POST">
                <input type="text" id="Title" name="Title" placeholder="Enter Title" required>
                <input type="file" id="myfile" name="myfile" required>
                <input type="submit" name="submit" value="Upload">
            </form>
        </div>
        <section class="passList">
            <h1>Refresh page to use delete & download option.</h1>
            <?php
                $user = $_SESSION['id'];
                

                if($user == true)
                {
                    $query = "SELECT * FROM files WHERE user_id = '$user' ";
                
                    $result = mysqli_query($connection, $query);
    
                    while($row = mysqli_fetch_assoc($result))
                    {
                            echo "<div class='item'>";
                            echo " <h2>$row[name] </h2>";
                              echo  "<p><a href=#></a></p>";
                              echo  "<a href='./delete.php?p=$row[id]'><i class='fa fa-trash'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;";
                              echo  "<a href='uploads/$row[name]'><i class='fa fa-download'></i></a>";
                            echo "</div>";
                    }
                }
                else
                {
                    header("location:user/login.php");
                }
                // $query = "SELECT * FROM files";
                
                // $result = mysqli_query($connection, $query);

                // while($row = mysqli_fetch_assoc($result))
                // {
                //         echo "<div class=item>";
                //         echo " <h2>$row[name] </h2>";
                //           echo  "<p><a href=#></a></p>";
                //            echo  "<a href='./delete.php?p=$row[id]'><i class='fa fa-trash'></i></a>";
                //         echo "</div>";
                // }
            ?>
           

        </section>
        <script>
            function toggle() {
                var vault = document.getElementById('vault');
                vault.classList.toggle('active');
                var plus = document.getElementById('fa');
                plus.classList.toggle('active');
            }
        </script>

    </body>

    </html>