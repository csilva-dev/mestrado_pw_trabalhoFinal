<?php

$servername = "localhost:3306";
$username = "root";
$password = "projetoWEB";
$bd = "stand";

// Create connection
$conn = new mysqli($servername, $username, $password, $bd);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?> 