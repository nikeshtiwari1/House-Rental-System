<?php 

$admin_id='';
$email='';
$password='';

$errors=array();

$db = new mysqli('localhost','root','','renthouse');

if($db->connect_error){
	echo "Error connecting database";
}

if(isset($_POST['admin_login'])){
	admin_login();
}


function admin_login(){
	global $email,$db;
	$email=validate($_POST['email']);
	$password=validate($_POST['password']);

		$sql = "SELECT * FROM admin where email='$email' AND password='$password' LIMIT 1";
		$result = $db->query($sql);
		if($result->num_rows==1){
			$data = $result-> fetch_assoc();
			$logged_user = $data['email'];
			session_start();
			$_SESSION['email']=$email;
			header('location:admin/admin-index.php');
    

		}
		else{
			
?>

<style>
.alert {
  padding: 20px;
  background-color: #DC143C;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<div class="container">
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Incorrect Email/Password or you are not registered as admin.</strong>
</div></div>


<?php
		}
}


function validate($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



 ?>