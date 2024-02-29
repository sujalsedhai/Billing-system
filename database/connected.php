<?php
$servername = "localhost";
$dbname = "test";
$dbusername = "root";
$dbpassword = "";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_errno != 0) {
    die("Error connecting to server: " . $conn->connect_errno);
}