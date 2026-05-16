<?php
session_start();
require_once 'db_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Discover</title>
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
    <h1>Upcoming City Events</h1>
    <section class = "hero">
        <div class = "hero-text">
        <p>Explore live events happening in Amman, Jordan, including concerts, festivals, and cultural activities.</p>
        <p> Stay updated on the latest happenings and plan your visit around exciting events in the city.</p>
        <button id="refreshBtn" class="hero-button">Refresh Events</button>
        </div>
    </section>
    <section id="eventsContainer"></section>
    <footer>
            <h3>&copy; 2026 Jordan Visitor Guide</h3>
            <p>For further inquiries send us an email at: <a href="mailto:JordanVisitorGuide@gmail.com">JordanVisitorGuide@gmail.com</a></p>
            <div class="socials-container">
                <h3>Our Socials</h3>
                <ul class="socials">
                    <li class="socials-items"><a href="#">Instagram</a></li>
                    <li class="socials-items"><a href="#">Facebook</a></li>
                    <li class="socials-items"><a href="#">Twitter</a></li>
                    <li class="socials-items"><a href="#">Youtube</a></li>
                </ul>
            </div>
        </footer>
    <script src="js/discover.js"></script>
</body>
</html>