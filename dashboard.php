<?php
session_start();
require_once 'db_config.php';

// FIX 1: Added exit()
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit(); 
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

    <h1>Welcome to Your Dashboard, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    
    <div class="dashboard-content">
        <div class="dashboard-section">
            <h2>Recent Reviews</h2>
            <div id="reviews-list">
                <?php
                $review_sql = "SELECT reviews.review_text, reviews.rating, reviews.created_at, users.username 
                                FROM reviews 
                                JOIN users ON reviews.user_id = users.id
                                WHERE reviews.user_id = ?
                                ORDER BY reviews.created_at DESC";
                
                $review_stmt = $pdo->prepare($review_sql);
                $review_stmt->execute([$_SESSION['user_id']]);
                $fetched_reviews = $review_stmt->fetchAll();
                $my_reviews = array_slice($fetched_reviews, 0, 3);
                
                if (count($my_reviews) > 0):
                    foreach ($my_reviews as $rev):
                ?>
                    <div class="review-card">
                        <h4>👤 <?php echo htmlspecialchars($rev['username']); ?></h4>

                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] === $rev['username']): ?>
                            <span style="background-color: #B59A7A; color: white; padding: 2px 8px; border-radius: 12px; font-size: 12px; margin-left: 8px;">
                                You
                            </span>
                        <?php endif; ?>
                        
                        <p class="review-meta">
                            <?php echo str_repeat('⭐', $rev['rating']); ?> 
                            <span class="review-timestamp">
                                🕒 <?php echo date('F j, Y \a\t g:i a', strtotime($rev['created_at'])); ?>
                            </span>
                        </p>
                        
                        <p class="review-text">
                            <?php echo nl2br(htmlspecialchars($rev['review_text'])); ?>
                        </p>
                    </div>
                <?php
                    endforeach;
                else:
                    echo "<p>No reviews yet. Go have some fun discovering places!</p>";
                endif;
                ?>
            </div>
        </div>
        
        <div class="dashboard-section">
            <?php
        $c = count($fetched_reviews);
        echo "<h2>You have left {$c} reviews.</h2>";
        $sql = "SELECT * FROM favourites 
                JOIN places ON favourites.place_id = places.id 
                WHERE favourites.user_id = ?
                ORDER BY places.rating DESC";
        $stmt = $pdo->prepare($sql);    
        $stmt->execute([$_SESSION['user_id']]);
        $favorites = $stmt->fetchAll();

        if (count($favorites) > 0):
            echo "<h3>Keep it up!</h3>";
            $images_array = json_decode($favorites[0]['images'], true);
            echo "<h2>Your Favorite Place</h2>";
            ?>
            <a href="details.php?id=<?php echo $favorites[0]['place_id']; ?>" class="dashboard-button">
                <img src="<?php echo htmlspecialchars($images_array[0]); ?>" alt="Picture of favorite place" />
            </a>
            <h3>click the image to view details</h3>
            <?php else: ?>
                <h2>You haven't favorited any places yet.</h2>
                <?php endif; ?>
        </div>
    </div>
            
            <h3 style="text-align: center;">Keep exploring and sharing your experiences to help others discover the best of Amman!</h3>
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
        </body>
        </html>