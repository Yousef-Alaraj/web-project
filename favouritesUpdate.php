<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "city_explorer_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}




$user_id = $_SESSION["user_id"];
$place_id = $_POST["place_id"];
$action = $_POST["action"];

echo json_encode($_POST);
if ($action === "add") {
    $sql = "INSERT INTO favourites (user_id, place_id)
            VALUES ($user_id, $place_id)";
} else if ($action === "remove") {
    $sql = "DELETE FROM favourites
            WHERE user_id = $user_id AND place_id = $place_id";
}

$conn->query($sql);

echo json_encode(["success" => true]);

?>