<?php
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$msg=$_POST['msg'];

		$to=$email; // Receiver Email ID, Replace with your email ID
		$subject='Form Healty Care team';
		$message="Name :".$name."\n"."message:"."\n\n".$msg;
		$headers="From: ".$email;

		if(mail($to, $subject, $message, $headers)){
			echo "<h1>Sent Successfully! To"." ".$name.", Thanx!</h1>";
		}
		else{
			echo "Something went wrong!";
		}
	}
?>