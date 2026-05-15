<?php

session_start();

require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $email = $_POST['email'];

    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkSql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $checkStmt = $pdo->prepare($checkSql);
    $checkStmt->execute([$user, $email]);
    $existingUser = $checkStmt->fetch();

    if ($existingUser) {

        if ($existingUser['username'] === $user) {
            $error = "This username is already taken.";
        } elseif ($existingUser['email'] === $email) {
            $error = "This email is already in use.";
        }
    } else {

        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user, $email, $pass]);

        $_SESSION['success_message'] = "Account created successfully! Please log in.";

        header("Location: login.php");
        exit();
    }
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
    </header>

    <section>
        <h2>Create an Account</h2>

        <?php if (!empty($error)): ?>
            <p style="color: red; font-weight: bold; text-align: center; margin-bottom: 15px;">
                <?php echo $error; ?>
            </p>
        <?php endif; ?>

        <form class="contactForm" method="POST" action="register.php">

            <label for="username" style="text-align: left;">Username</label>
            <input type="text" name="username" id="username" class="contactFormInput" placeholder="Enter Username" required>

            <label for="email" style="text-align: left;">Email</label>
            <input type="email" name="email" id="email" class="contactFormInput" placeholder="Enter Email" required>

            <label for="password" style="text-align: left;">Password</label>
            <input type="password" name="password" id="password" class="contactFormInput" placeholder="Enter Password" required>

            <button type="submit" class="submitBtn">Sign Up</button>
            <p>Already have an account? <a href="login.php" style="color: #E07A5F; font-weight: bold;">Log in here</a></p>
        </form>
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