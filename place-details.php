<?php
// 1. Start the session and connect to the database
session_start();
require_once 'db_config.php';

// 2. Check if an ID is in the URL
if (isset($_GET['id'])) {
    $place_id = $_GET['id'];
    
    // 3. Write the SQL query (we use a ? for security)
    $sql = "SELECT * FROM places WHERE id = ?";
    
    // 4. Prepare and execute the query safely
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$place_id]); // This swaps the ? with the actual ID number
    
    // 5. Fetch the single row of data from the database
    $place = $stmt->fetch();
    
    // 6. If the ID doesn't exist in the database, send them back home
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
        <title id="title">Title</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <header>
            <img src="assets/images/logo.jpg" alt="Jordan Visitor Guide Logo" id="logo">

            <nav>
                <ul id="navigation">
                    <li><a href="index.html" class="nav-link">Home</a></li>
                    <li><a href="places.html" class="nav-link">Places</a></li>
                    <li><a href="discover.html" class="nav-link">Discover</a></li>
                    <li><a href="contact.html" class="nav-link">Contact Us</a></li>
                </ul>
            </nav>
        </header>

        <main class="place-details-container">
            <section class="title">
                <h2 id="place-title">Loading Title...</h2>
                <h3 id="place-category">Loading Category...</h3>
                <p><span id="place-rating">#</span>/5🌟 Stars</p>
            </section>
    
            <h2 id="pictures-featuring">Pictures featuring <span id="gallery-title-name">#</span></h2>
            <section class="gallery" id="place-gallery">
            </section>
    
            <section class="details">
                <p id="place-description">Loading description...</p>
                    
                <div class="place-info">
                    <h3>Visitor Information</h3>
                    <ul>
                        <li><strong>📍 Location:</strong> <span id="info-location">...</span></li>
                        <li><strong>🕒 Duration:</strong> <span id="info-duration">...</span></li>
                        <li><strong>🎟️ Entry Fee:</strong> <span id="info-fee">...</span></li>
                        <li><strong>📞 Contact:</strong> <span id="info-contact">...</span></li>
                        <li><strong>🏷️ Tags:</strong> <span id="info-tags">...</span></li>
                    </ul>
                </div>
            </section>
        </main>

        <section class="reviews-section">
            <h3>Leave a Review</h3>
            <form class="review-form" method="POST" action="submit_review.php">
                <textarea name="user_review" placeholder="Write your feedback here..." rows="4" required></textarea>
                <button type="submit" class="submitBtn">Submit Review</button>
            </form>
            
            <h3>Recent Reviews</h3>
            <div id="reviews-list">
                <p><em>Loading reviews...</em></p>
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
        <script src="js/place-details.js"></script>
    </body>
</html>