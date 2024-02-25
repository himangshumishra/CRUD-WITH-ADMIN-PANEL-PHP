<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbtsk";

// dbconnection
$conn = mysqli_connect($servername, $username, $password, $dbname,"3307");

// Check connection
if ($conn->connect_error) {
    // die("Connection failed: " . $conn->connect_error);
}
?>
