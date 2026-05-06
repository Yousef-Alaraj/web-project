<?php
require_once 'php/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $email = $_POST['email'];
    // Phase 2 Requirement: Passwords must be hashed [cite: 2532, 14]
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user, $email, $pass]);

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register - Jordan Visitor Guide</title>
</head>

<body>
    <header>
        <img src="assets/images/logo.jpg" alt="Jordan Visitor Guide Logo" id="logo">
        <nav>
            <ul id="navigation">
                <li><a href="index.html" class="nav-link">Home</a></li>
                <li><a href="contact.html" class="nav-link">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Create an Account</h2>
        <form class="contactForm" method="POST" action="register.php">

            <label for="username" style="text-align: left;">Username</label>
            <input type="text" name="username" id="username" class="contactFormInput" placeholder="Enter Username" required>

            <label for="email" style="text-align: left;">Email</label>
            <input type="email" name="email" id="email" class="contactFormInput" placeholder="Enter Email" required>

            <label for="password" style="text-align: left;">Password</label>
            <input type="password" name="password" id="password" class="contactFormInput" placeholder="Enter Password" required>

            <button type="submit" class="submitBtn">Sign Up</button>
        </form>
    </section>

    <footer>
        <h3>&copy; 2026 Jordan Visitor Guide</h3>
    </footer>
</body>

</html>