<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit();
}
$user_id = $_SESSION['user_id'];

$sql = "SELECT place_id FROM favourites where user_id= ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);


$favourites = [];

while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    $favourites[] = $row->place_id; 
}

header("Content-Type: application/json");
echo json_encode($favourites);
?>