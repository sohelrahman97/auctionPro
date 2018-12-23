<?php


$name = $_POST['name'];
$email = $_POST['email'];
$skill = $_POST['skill'];

$conn = mysqli_connect('localhost','root','','userdata');
if($conn) {
	$sql = "INSERT INTO tbl_user VALUES(NULL,'$name','$email','$skill');";
	if(mysqli_query($conn, $sql)) echo 'Inserted';
}
else 
{
	echo "Error";
}

?>