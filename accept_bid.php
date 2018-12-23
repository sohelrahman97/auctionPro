<?php

$conn = mysqli_connect('localhost','root','','userdata');

if($_GET["pid"])
{
	$sold_pid = $_GET['pid'];
}

if($_GET["bid"])
{
	$accepted_bid = $_GET["bid"];
}

$sql = "UPDATE products
		SET sold = 'Yes'
		WHERE p_id = $sold_pid";

mysqli_query($conn, $sql);

$sql = "UPDATE bids
		SET Accepted = 1
		WHERE b_id = $accepted_bid";

mysqli_query($conn, $sql);


header("Location: welcome.php");	



?>