<?php
$servername = "localhost";
$usernamee = "root";
$password = "";
$dbname = "tenderdb";

$conn = new mysqli($servername, $usernamee, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 