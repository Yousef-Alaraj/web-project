<?php
session_start();
require_once 'db_config.php';

// Fetch 4 places from the database
$sql = "SELECT * FROM places LIMIT 4";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$featured_places = $stmt->fetchAll();
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Jordan Visitor Guide</title>
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

        <section class="hero">
            <video class="banner-video" aria-label="Video of Jordan scenery" muted autoplay loop playsinline>
                <source src="assets/videos/banner.mp4" type="video/mp4">
            </video>

            <h2>The Wonders of Jordan</h2>
            <div class="hero-text">
                <p>Discover the ancient wonders, vibrant culture, and breathtaking landscapes of Jordan.</p>
                <p>From the rose-red city of Petra to the bustling streets of Amman, your adventure starts here.</p>
                <p>Join us in exploring the hidden gems of the Middle East.</p>

                <br>
        
                <a href="places.html" class="hero-button">Start Exploring!</a>
            </div>
        </section>

        <h1>Categories of Trips</h1>
        
        <section class="categories">
            <div class="categories-card">
                <img src="assets/images/eco-adventure.webp" alt="Jordan Trail">
                <h2>Eco & Adventure</h2>
                <p>
                    Jordan offers premier eco and adventure experiences, featuring dramatic desert 
                    landscapes, deep canyons, and diverse biodiversity. Top activities include hiking 
                    the 675km Jordan Trail, desert trekking and stargazing in Wadi Rum, canyoning 
                    through water-filled wadis like Wadi Mujib, and exploring protected areas such as 
                    Dana Biosphere Reserve.
                </p>
            </div>

            <div class="categories-card">
                <img src="assets/images/history-culture.webp" alt="Jersah Roman Ruins">
                <h2>History & Culture</h2>
                <p>
                    Jordan is an ancient land bridging Asia, Africa, and Europe, with history spanning 
                    from Nabataean rock-cut cities (Petra) and Roman ruins (Jerash) to biblical sites. 
                    As an independent Hashemite Kingdom since 1946, its culture is rooted in Arab-Islamic 
                    traditions, deeply valuing hospitality (especially Bedouin) and preserving a rich 
                    mosaic of cultural heritage.
                </p>
            </div>

            <div class="categories-card">
                <img src="assets/images/leisure-wellness.webp" alt="Ma'in Hot Springs">
                <h2>Leisure & Wellness</h2>
                <p>
                    Jordan is a premier leisure and wellness destination in the Middle East, seamlessly 
                    blending ancient history, dramatic landscapes, and natural therapeutic sites with 
                    world-class, modern spa resorts. The kingdom offers a holistic escape designed to 
                    rejuvenate mind and body through its unique geography and cultural experiences.
                </p>
            </div>

            <div class="categories-card">
                <img src="assets/images/religion-faith.webp" alt="The Cave of the Seven Sleepers">
                <h2>Religion & Faith</h2>
                <p>
                    Jordan is a predominantly Sunni Muslim country (over 95% of the population) with a 
                    small, deeply rooted Christian minority. Islam is the state religion, heavily 
                    influencing social life and culture, yet the constitution guarantees freedom of 
                    worship. Jordan is renowned for interfaith harmony and hosts significant Biblical, 
                    Abrahamic, and Islamic holy sites.
                </p>
            </div>
        </section>

        <h1>Featured Places</h1>

        <section class="places">
            <?php foreach ($featured_places as $place): ?>
                <?php 
                $imagesArray = json_decode($place['images'], true);
                $coverImage = $imagesArray[0]; 
                ?>
                
                <div class="places-card">
                    <img src="<?php echo $coverImage; ?>" alt="Picture of <?php echo $place['name']; ?>">
                    <h2><?php echo $place['name']; ?></h2>
                    
                    <p><?php echo $place['description']; ?></p>
                    
                    <a href="details.php?id=<?php echo $place['id']; ?>" class="places-button">View Details</a>
                </div>
                
            <?php endforeach; ?>
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

        <script src="js/index.js"></script>
    </body>
</html>