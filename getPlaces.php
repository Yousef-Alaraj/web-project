<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "city_explorer_db;";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM places";
$result = $conn->query($sql);

$places = [];

while ($row = $result->fetch_object()) {
    $places[] = $row;
}

header("Content-Type: application/json");
echo json_encode($places);
?>