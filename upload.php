<?php

$connection = mysqli_connect("localhost", "root", "", "docstack");


if(isset($_POST['submit']))
{
	$filename = $_POST['file']['name'];

	$destination = 'uploads/' . $filename;

	$extension = pathinfo($filename, PATHINFO_EXTENSION);

	$file = $_FILES['file']['tmp_name'];
	
	$size = $_FILES['file']['size'];


	if(!in_array($extension,['zip', 'pdf', 'png', 'doc', 'docx']))
	{
		echo 'File extension is not supported, Please try again.';
	}
	elseif ($_FILES['file']['size'] > 1000000) {
			echo 'File is too large in size :(';
	}
	else {
		if(move_uploaded_file($file, $destination))
		{
			$sql = "INSERT into files (name)
					VALUES('$filename')";

			if(mysqli_query($connection, $sql))
			{
				echo 'you banged itttt geeeezzzzzz!';
			}
			else
			{
				echo 'Failed to upload baby :(';
			}
		}
	}

}

?>