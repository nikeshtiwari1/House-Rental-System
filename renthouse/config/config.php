<?php 

$db = new mysqli('localhost','root','','renthouse');

if($db->connect_error){
	echo "Error connecting database";
}

 ?>