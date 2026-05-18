<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
            <img src="assets/images/logo.jpg" alt="Jordan Visitor Guide Logo" id="logo">

            <nav>
                <ul id="navigation">
                    <li><a href="index.php" class="nav-link">Home</a></li>
                    <li><a href="places.php" class="nav-link">Places</a></li>
                    <li><a href="discover.php" class="nav-link">Discover</a></li>
                    <li><a href="contact.php" class="nav-link">Contact Us</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="dashboard.php" class="nav-link">Dashboard</a></li>
                        <li><a href="logout.php" class="nav-link">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="nav-link">Login / Register</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <?php if (isset($_SESSION['username'])): ?>
                <div class="user-greeting">
                    <span class="user-icon"><?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?></span>
                    <span class="user-name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                </div>
            <?php endif; ?>
        </header>
</body>
</html>