<?php
session_start();
require_once 'db_config.php';

if (isset($_GET['id'])) {
    $place_id = $_GET['id'];
    
    $sql = "SELECT * FROM places WHERE id = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$place_id]);
    
    $place = $stmt->fetch();
    
    if (!$place) {
        header("Location: index.php");
        exit();
    }
    
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title id="title">Details</title>
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

        <main class="place-details-container">
            <section class="title">
                <h2><?php echo $place['name']; ?></h2>
                <h3><?php echo $place['category_name']; ?></h3>
                <p><?php echo "Rating: " . $place['rating']?>/5🌟</p>
            </section>
    
            <h2 id="pictures-featuring">Pictures featuring <?php echo $place['name']; ?></h2>
            <section class="gallery" id="place-gallery">
                <?php
                $imagesArray = json_decode($place['images'], true);

                if ($imagesArray) {
                    foreach ($imagesArray as $imagePath) {
                        echo '<img src="' . htmlspecialchars($imagePath) . '" alt="Picture of ' . htmlspecialchars($place['name']) . '">';
                    }
                } else {
                    echo "<p>No images available.</p>";
                }
                ?>
            </section>
    
            <section class="details">
                <p><?php echo $place['description']; ?></p>
                    
                <div class="place-info">
                    <h3>Visitor Information</h3>
                    <ul>
                        <li><strong>📍 Location:</strong> <?php echo $place['location']; ?></li>
                        <li><strong>🕒 Duration:</strong> <?php echo $place['trip_duration']?></li>
                        <li><strong>🎟️ Entry Fee:</strong> <?php echo $place['fee']?></li>
                        <li><strong>📞 Contact:</strong> <?php echo $place['contact_number']?></li>
                        <li><strong>🏷️ Tags:</strong> <?php echo $place['tags']?></li>
                    </ul>
                </div>
            </section>
        </main>

        <section class="reviews-section">
            <h3>Leave a Review</h3>
            <form class="review-form" method="POST" action="submit_review.php">
                <input type="hidden" name="place_id" value="<?php echo $place['id']; ?>">
                
                <select name="rating" required>
                    <option value="" disabled selected>Select a Rating...</option>
                    <option value="5">⭐⭐⭐⭐⭐ (5/5)</option>
                    <option value="4">⭐⭐⭐⭐ (4/5)</option>
                    <option value="3">⭐⭐⭐ (3/5)</option>
                    <option value="2">⭐⭐ (2/5)</option>
                    <option value="1">⭐ (1/5)</option>
                </select>

                <textarea name="user_review" placeholder="Write your feedback here..." rows="4" required></textarea>
                <button type="submit" class="submitBtn">Submit Review</button>
            </form>
            
            <h3>Recent Reviews</h3>
            <div id="reviews-list">
                <?php
                $review_sql = "SELECT reviews.review_text, reviews.rating, reviews.created_at, users.username 
                               FROM reviews 
                               JOIN users ON reviews.user_id = users.id 
                               WHERE reviews.place_id = ? 
                               ORDER BY reviews.created_at DESC";
                
                $review_stmt = $pdo->prepare($review_sql);
                $review_stmt->execute([$place_id]);
                $fetched_reviews = $review_stmt->fetchAll();

                if (count($fetched_reviews) > 0):
                    foreach ($fetched_reviews as $rev):
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
                    echo "<p>No reviews yet. Be the first to share your experience!</p>";
                endif;
                ?>
            </div>
        </section>

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