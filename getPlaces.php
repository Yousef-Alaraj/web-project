<?php
session_start();
require_once 'db_config.php';

$sql = "SELECT * FROM places";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$places = $stmt->fetchAll(PDO::FETCH_OBJ);

header("Content-Type: application/json");
echo json_encode($places);
?>