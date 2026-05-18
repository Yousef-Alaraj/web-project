<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "city_explorer_db;";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$sql = "SELECT place_id FROM favourites where user_id=1";
$result = $conn->query($sql);

$favourites = [];

while ($row = $result->fetch_object()) {
    $favourites[] = $row->place_id;
}

header("Content-Type: application/json");
echo json_encode($favourites);
?>