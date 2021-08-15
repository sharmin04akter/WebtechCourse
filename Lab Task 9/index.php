<?php

	$email = $_POST['email'];

	if($email == null){
		echo 'invalid email';
	}else{
		if(filter_var($email,FILTER_VALIDATE_EMAIL)==false)
		{
			echo 'invalid email';
		}
		else{
		echo "Valid data: ".$email;	
		$conn = mysqli_connect('localhost', 'root', '', 'test');
		$sql = "insert into email_db values('','$email')"; 
		$result = mysqli_query($conn, $sql);	
		}
	}

?> 