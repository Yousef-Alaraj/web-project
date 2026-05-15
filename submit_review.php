<?php
session_start();
require_once 'db_config.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id = $_SESSION['user_id'];
    $place_id = $_POST['place_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['user_review'];

    $sql = "INSERT INTO reviews (user_id, place_id, rating, review_text) VALUES (?, ?, ?, ?)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $place_id, $rating, $review_text]);

    header("Location: details.php?id=" . $place_id);
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>