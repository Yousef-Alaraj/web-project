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
                <h2><?php echo $place['name']; ?></h2>
                <h3><?php echo $place['category_name']; ?></h3>
                <p><?php echo $place['rating']?>/5</p>
            </section>
    
            <h2 id="pictures-featuring">Pictures featuring <?php echo $place['name']; ?></h2>
            <section class="gallery" id="place-gallery">
                <?php
                $imagesArray = json_decode($place['images'], true);

                if ($imagesArray) {
                    foreach ($imagesArray as $imagePath) {
                        echo "<img src='" . $imagePath . "' alt='Picture of " . $place['name'] . "'>";
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