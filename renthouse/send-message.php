<?php
session_start();
isset($_SESSION["email"]);
include "config/config.php";


  $u_email=$_SESSION["email"];
  $message=$_POST['message'];
	$owner_id=$_POST['owner_id'];
	$tenant_id=$_POST['tenant_id'];
	
    
	$sql="INSERT INTO chat(message,owner_id,tenant_id) VALUES ('$message','$owner_id','$tenant_id')";

	$query = mysqli_query($db,$sql);
	if($query)
	{
		header('Location:'. $_SERVER['HTTP_REFERER']);
	}
	else
	{
		echo "Something went wrong";
	}
	
?>