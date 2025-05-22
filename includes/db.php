<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "knizef_dyn2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Připojení selhalo: " . $conn->connect_error);
}