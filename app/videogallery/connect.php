<?php

$title = $_POST['title'];
$description = $_POST['description'];
$url = $_POST['url'];


// Database connection
$conn = new mysqli('localhost', 'root', '', 'phish_db');
if ($conn->connect_error) {
	echo "$conn->connect_error";
	die("Connection Failed : " . $conn->connect_error);
} else {
	$stmt = $conn->prepare("insert into videos(title, description, url) values( ?, ?, ?)");
	$stmt->bind_param("sss", $title, $description, $url);
	$execval = $stmt->execute();
	echo $execval;
	echo "Added successfully...";
	$stmt->close();
	$conn->close();
}




?>