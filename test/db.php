<?php 
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "rcs-web-final";

// connection

$conn = new mysqli($servername,$username,$pass,$dbname);

// connection check

if ($conn->connect_error) {
    die("Error" .$conn->connect_error);
};

?>