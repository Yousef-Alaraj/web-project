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
    <section>
        <h2>Login</h2>

        <?php if (isset($_SESSION['success_message'])): ?>
            <p style="color: green; font-weight: bold; text-align: center; margin-bottom: 15px;">
                <?php
                echo $_SESSION['success_message'];
                unset($_SESSION['success_message']);
                ?>
            </p>
        <?php endif; ?>

        <form class="contactForm" method="POST" action="login.php">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="contactFormInput" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="contactFormInput" required>

            <button type="submit" class="submitBtn">Login</button>
            <p>Don't have an account? <a href="register.php" style="color: #E07A5F; font-weight: bold;">Sign up here</a></p>
        </form>
        <?php if (!empty($error)): ?>
            <p style="color: red; font-weight: bold; text-align: center;"><?php echo $error; ?></p>
        <?php endif; ?>
    </section>

    <footer>
        <h3>&copy; 2026 Jordan Visitor Guide</h3>
        <p>For further inquiries send us an email at: <a
                href="mailto:JordanVisitorGuide@gmail.com">JordanVisitorGuide@gmail.com</a></p>
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
</body>

</html>