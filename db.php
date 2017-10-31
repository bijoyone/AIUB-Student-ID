<?php

$servername = "localhost";
$databaename="personal";
$dbusername="root";
$dbpassword="";

$conn = new mysqli($servername, $dbusername, $dbpassword,$databaename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

?>

