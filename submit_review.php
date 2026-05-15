<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id = $_SESSION['user_id'];
    $place_id = $_POST['place_id'];
    $review_text = $_POST['review_text'];

    $sql = "INSERT INTO reviews (user_id, place_id, review_text) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $place_id, $review_text]);

    header("Location: details.php?id=" . $place_id);
} else {
    header("Location: index.php");
    exit();
}
?>