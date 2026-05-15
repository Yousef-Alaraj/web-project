<?php
session_start();
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <section>
        <h2>Login</h2>
        <form class="contactForm" method="POST" action="login.php">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="contactFormInput" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="contactFormInput" required>

            <button type="submit" class="submitBtn">Login</button>
        </form>
    </section>
</body>

</html>