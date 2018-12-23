<?php
session_start();

$email = -10;
$pass = -10;
$pass2 = -10;
$age = -10;
$gender = -10;
$address = -10;


$email = $_POST['email'];
$pass = $_POST['password'];
$pass2 = $_POST['password2'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$flag=0;

if($pass!=$pass2) $flag=1;
//echo $flag;
if($email==-10) $flag=1;
//echo $flag;
if($pass==-10) $flag=1;
//echo $flag;
if($pass2==-10) $flag=1;
//echo $flag;
if($age==-10) $flag=1;
//echo $flag;
if($gender==-10) $flag=1;
//echo $flag;
if($address==-10) $flag=1;


if($flag==1)
{
	header("Location: register.php?error=1");
	exit;
}




$conn = mysqli_connect('localhost','root','','userdata');
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
$result = mysqli_query($conn,$sql);

$rowcount = mysqli_num_rows($result);
if($rowcount!=0) $flag=1;


if($flag==0) {
	$sql = "INSERT INTO users VALUES('NULL','$email','$pass','$age','$gender','$address');";
	if(mysqli_query($conn, $sql)) 
		{
			$_SESSION['register'] = 1;
			header("Location: index.php?success=1");
		}
	else echo "Error";
}
else 
{
	header("Location: register.php?error=1");
}

?>