<?php
session_start();
$servername = "localhost";
$username = "id10671800_alikaakati";
$password = "p)wNI5XjL~n{uB_n";
$database = "id10671800_lms";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "connected successfully";
}
?>