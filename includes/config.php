<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "besda";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
global $conn;
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$current = $_SERVER['PHP_SELF'];

session_start();



   
    