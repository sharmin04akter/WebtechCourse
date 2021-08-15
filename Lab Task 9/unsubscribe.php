<?php

	$email = $_POST['email'];

	$conn = mysqli_connect('localhost', 'root', '', 'test');
	$sql = "select* from email_db where email='$email'";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows==1) {
		$row=mysqli_fetch_assoc($result);
		$eml=$row['email'];

			if($email == $eml){
				echo "Email unsubscribed: ".$email;	
				$conn = mysqli_connect('localhost', 'root', '', 'test');
			    $sql = "delete from email_db where email='$email'";
	            $result = mysqli_query($conn, $sql);
			
				
			}
	}
	else{
		echo"Not found";
	}

?> 