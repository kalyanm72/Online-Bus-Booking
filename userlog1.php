<?php
session_start();
$message="";

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","root","","bus_ticket");


	$email=$_POST['email'];
	$password=$_POST['password'];
	$password=crypt($password,"something");
	$result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $email . "' and password = '". $password."'");

	$row=mysqli_fetch_array($result);
	$count  = mysqli_num_rows($result);
	if($count==0) {
		alert("invalid password or email_id entered");
		echo "<a href='index.html'>go to home</a>";
		exit ;
	} else {
			if($row['verified']==1){
				$_SESSION['access_token']="1";
				$_SESSION['user_first_name']=$row['username'];
				$_SESSION['user_email_address']=$row['email'];
				$_SESSION['user_last_name']="";
			}
			else{
				$date=$row['CreatedOn'];
				$date=strtotime($date);
				$date=DATE('D M Y',$date);
				alert("email not verified mail sent on $email at $date");
				echo "<a href='index.html'>go to home</a>";
				exit;
			}
	}
	header('location:'. $_SESSION['prev_url']);
}
?>
