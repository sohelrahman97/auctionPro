<?php
session_start();

$email = $_SESSION['email'];
$u_id = $_SESSION['u_id'];
$name = $_POST['name'];
$description = $_POST['desc'];
$category = $_POST['cat'];
$price = $_POST['price'];
$time = date("Y-m-d H:i:s");

$conn = mysqli_connect('localhost','root','','userdata');
if($conn) {
	$sql = "INSERT INTO products VALUES('$u_id','','$name','$description','$category','$price','$time','No');";
	if(mysqli_query($conn, $sql)) 
		{
			header("Location: welcome.php");
		}
}
else 
{
	echo "Error";
}

?>