<?php
session_start();
require_once 'db_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>places</title>
    <link rel="stylesheet" href="places.css">

    
    <!-- <script src="js/places.js" defer></script> -->
     <script src="https://unpkg.com/react@18/umd/react.development.js"></script>

    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>

    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

    <script type="text/babel" src="js/places.js"></script>

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

    
        
   
    <section class="hero">
        

        <div class="hero-text">
        <h1 class="title">Wonders of Jordan</h1>
        

        <p class="description">
            Journey through a land where ancient history meets timeless landscapes. From the rose-red cliffs of Petra to the Roman ruins of Jerash, explore the architectural marvels and sacred sites that have shaped the Hashemite Kingdom for millennia. 
        </p>
        </div>
        <img class="background-img" src="assets/images/placesBackground1.jpg">

    </section>

    <section class="main">

        <section class="filters">
            <h2>filters</h2>
            
           <div class="category-filter filter">
                <span>Category:</span>
                <br>
                
                <label>
                    Adventure & eco
                    <input name="category" type="checkbox" value="Adventure & eco">
                </label>
                
                <label>
                    History & culture
                    <input name="category" type="checkbox" value="history & culture">
                </label>
                
                <label>
                    Leisure & wellness
                    <input name="category" type="checkbox" value="leisure & wellness">
                </label>
                
                <label>
                    Religious & faith
                    <input name="category" type="checkbox" value="religious & faith">
                </label>
            </div>
            <br>
            <hr>
            <div class="rating-filter filter">
                <span>Rating:</span>
                <br>
                
                <label>
                    1 ⭐
                    <input type="checkbox" name="rating" value="1">
                </label>
                
                <label>
                    2 ⭐⭐
                    <input type="checkbox" name="rating" value="2">
                </label>
                
                <label>
                    3 ⭐⭐⭐
                    <input type="checkbox" name="rating" value="3">
                </label>
                
                <label>
                    4 ⭐⭐⭐⭐
                    <input type="checkbox" name="rating" value="4">
                </label>
                
                <label>
                    5 ⭐⭐⭐⭐⭐
                    <input type="checkbox" name="rating" value="5">
                </label>
            </div>
            <hr>
            <div >
            <span>favourites:</span>
            <br>
            <br>
            <label>
                    show favourites
                    <input name="favourites" type="checkbox" value="favourites" id="favouritesCheckbox">
            </label>
            </div>


        </section>

        
        <section class="place-cards">

            <section class="search">

                
                <input type="text" name="search-bar" placeholder="Search.." class="search-bar">

            </section>

            <hr>

            <section class="cards">

                <div class="cards-container"></div>


            </section>

        </section>

        
     


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