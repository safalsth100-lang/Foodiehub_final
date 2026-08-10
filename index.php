<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    .trending-grid {
    width: 90%;
    max-width: 1200px;
    margin: 40px auto;

    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.trending-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;

    box-shadow: 0 8px 25px rgba(0,0,0,0.12);

    transition: 0.3s ease;
}

.trending-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.18);
}

.trending-card > img {
    display: block;

    width: 100% !important;
    height: 210px !important;

    object-fit: cover !important;
}

.trending-info {
    padding: 20px;
}

.trending-info h3 {
    color: #ff5722;
    font-size: 22px;
    margin-top: 0;
}

.trending-info p {
    color: #666;
    margin: 8px 0;
}

.trending-info a {
    display: inline-block;

    margin-top: 12px;
    padding: 11px 22px;

    background: linear-gradient(135deg, #ff5722, #ff7043);

    color: white;
    text-decoration: none;

    border-radius: 25px;

    font-weight: bold;

    transition: 0.3s;
}

.trending-info a:hover {
    transform: translateY(-3px);
    box-shadow: 0 7px 15px rgba(255,87,34,0.3);
}

@media (max-width: 900px) {
    .trending-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 600px) {
    .trending-grid {
        grid-template-columns: 1fr;
    }
}
</style>
    <title>FoodieHub | Food Discovery & Reviews</title>

 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .menu-btn {
    display: inline-block;
    background: #ff5722;
    color: white;
    text-decoration: none;
    padding: 10px 18px;
    border-radius: 20px;
    font-weight: 600;
    transition: 0.3s;
}

.menu-btn:hover {
    background: #e65100;
    transform: scale(1.05);
}
/* =========================
   CONTACT SECTION
========================= */

.contact-section {
    padding: 80px 5%;

    background:
        radial-gradient(
            circle at top right,
            rgba(255, 87, 34, 0.15),
            transparent 35%
        ),
        linear-gradient(
            135deg,
            #fff8f3,
            #ffffff
        );
}


.contact-container {
    max-width: 1100px;

    margin: auto;

    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 50px;

    align-items: center;
}


/* Contact information */

.contact-info h2 {
    font-size: 34px;

    color: #ff5722;

    margin-bottom: 20px;
}

.contact-info > p {
    color: #666;

    line-height: 1.7;

    font-size: 16px;
}


.contact-details {
    margin-top: 25px;
}

.contact-details p {
    margin: 18px 0;

    color: #555;

    font-size: 16px;
}


/* Contact form */

.contact-form {
    background: rgba(255, 255, 255, 0.95);

    padding: 30px;

    border-radius: 20px;

    border: 2px solid #ff7043;

    box-shadow:
        0 10px 30px rgba(0, 0, 0, 0.10);
}

.contact-form h3 {
    margin-top: 0;

    margin-bottom: 20px;

    color: #333;

    font-size: 24px;
}


.contact-form input,
.contact-form textarea {
    width: 100%;

    padding: 14px;

    margin-bottom: 15px;

    border: 1px solid #ddd;

    border-radius: 10px;

    font-family: Arial, sans-serif;

    font-size: 14px;

    outline: none;

    transition: 0.3s;

    box-sizing: border-box;
}


.contact-form input:focus,
.contact-form textarea:focus {
    border-color: #ff5722;

    box-shadow:
        0 0 0 3px rgba(255, 87, 34, 0.1);
}


.contact-form textarea {
    resize: vertical;
}


.contact-form button {
    width: 100%;

    padding: 14px;

    border: none;

    border-radius: 30px;

    background:
        linear-gradient(
            135deg,
            #ff5722,
            #ff7043
        );

    color: white;

    font-size: 16px;

    font-weight: bold;

    cursor: pointer;

    transition: 0.3s;
}


.contact-form button:hover {
    transform: translateY(-3px);

    box-shadow:
        0 8px 18px rgba(255, 87, 34, 0.3);
}



@media (max-width: 700px) {

    .contact-container {
        grid-template-columns: 1fr;

        gap: 30px;
    }

    .contact-info h2 {
        font-size: 28px;
    }

}
    </style>
</head>


<body>
<div class="founders">
    <span>🍴 FoodieHub</span>
    <span>Founded by</span>
    <strong style="font-size:30px;">Safal • Paras • Suyog</strong>
</div>


<header class="navbar">

    <div class="logo">
        🍴 Foodie<span>Hub</span>
    </div>
   <div class="logo">
    🍴 Foodie<span>Hub</span>
</div>

<div class="logo">
    🍴 Foodie<span>Hub</span>
</div>

<nav>

    <a href="index.php" class="active">
        Home
    </a>

   <a href="about.php">About</a>

    <a href="#categories">
        Explore
    </a>

    <a href="restaurants.php">
        Restaurants
    </a>
<a href="founder.php">Founders</a>
    <a href="#reviews">
        Reviews
    </a>
<a href="#contact">Contact</a>

</nav>

<div class="nav-actions">

 <?php if (isset($_SESSION['user_id'])): ?>

    <span class="welcome-user">
        👋 <?php echo htmlspecialchars($_SESSION['user_name']); ?>
    </span>

    <a href="logout.php" class="logout-btn">
        Logout
    </a>

<?php else: ?>

    <a href="login.php" class="login-link">
        Login
    </a>

    <a href="register.php" class="signup-btn">
        Sign Up
    </a>

<?php endif; ?>

</div>
</header>

<section class="hero" id="home">

    <div class="hero-content">

        <span class="small-title">
            🍽️ YOUR NEXT FOOD ADVENTURE
        </span>
        <h1>
            Discover Food.<br>
            <span>Discover Happiness.</span>
        </h1>
        <p>
            Explore the best restaurants around you,
            read honest reviews and find your next
            favorite meal.

        </p>

      <form action="search.php" method="GET" class="search-form">

    <input
        type="text"
        name="query"
        placeholder="Search restaurant..."
        required
    >

    <button type="submit">
        🔍 Search
    </button>

</form>
        <div class="suiii">
            <span>Popular:</span>
            <a href="#">Momo</a>
            <a href="#">Pizza</a>
            <a href="#">Burger</a>
            <a href="#">Thakali</a>
        </div>
    </div>
</section>
<section class="about-section" id="about">
    <div class="about-image">
        <img
            src="https://images.unsplash.com/photo-1504674900247-0877df9cc836"
            alt="Delicious Food"
        >
        <div class="about-stat">

            <strong>10K+</strong>

            <span>
                Food lovers<br>
                discovering
            </span>

        </div>

    </div>
    <div class="about-content">

        <span>
            ABOUT FOODIEHUB
        </span>
        <h2>
            Discover great food.
            Share your experience.
        </h2>
        <p>
            FoodieHub is a food discovery and review
            platform created for people who love
            exploring new places to eat.
        </p>
        <p>
            Discover restaurants, explore menus,
            check ratings and read reviews from
            other food lovers before deciding where
            to eat.

        </p>


        <p>

            You can also share your own dining
            experiences and help others discover
            great food.

        </p>
        <div class="about-features">
            <div>
                <strong>✓</strong>
                Discover Restaurants
            </div>
            <div>
                <strong>✓</strong>
                Read Reviews
            </div>
            <div>
                <strong>✓</strong>
                Explore Menus
            </div>
            <div>
                <strong>✓</strong>
                Share Experiences
            </div>
        </div>
        <a href="restaurants.php" class="about-btn">
    Explore Restaurants →
</a>
    </div>
</section>
<section class="categories" id="categories">
    <div class="section-heading">
        <div>
            <span>
                EXPLORE
            </span>
            <h2>
                What are you craving?
            </h2>
        </div>
        <a href="#">
            View all →
        </a>
    </div>
    <div class="category-grid">
        <div class="category-card">
            <div class="category-icon">
                🥟
            </div>
            <h3>
                Momo
            </h3>
            <p>
                120+ places
            </p>

        </div>
        <div class="category-card">
            <div class="category-icon">
                🍕
            </div>
            <h3>
                Pizza
            </h3>
            <p>
                85+ places
            </p>
        </div>
        <div class="category-card">
            <div class="category-icon">
                🍔
            </div>
            <h3>
                Burgers
            </h3>
            <p>
                70+ places
            </p>

        </div>
        <div class="category-card">
            <div class="category-icon">
                🍜
            </div>

            <h3>
                Noodles
            </h3>

            <p>
                60+ places
            </p>

        </div>
        <div class="category-card">
            <div class="category-icon">
                🍛
            </div>

            <h3>
                Thakali
            </h3>

            <p>
                45+ places
            </p>

        </div>
        <div class="category-card">

            <div class="category-icon">
                🍰
            </div>

            <h3>
                Desserts
            </h3>

            <p>
                55+ places
            </p>

        </div>

    </div>

</section>
<section class="trending-section">

    <h2>🔥 Trending Restaurants</h2>

    <div class="trending-grid">

        <!-- 1. The Food House -->
        <div class="trending-card">

            <img
                src="images/foodhouse.jpg"
                alt="The Food House"
            >

            <div class="trending-info">

                <h3>The Food House</h3>

                <p>📍 Thamel, Kathmandu</p>

                <p>⭐ 4.8/5</p>

                <p>🍴 Multi Cuisine</p>

                <a href="restaurant.php?id=1">
                    View Restaurant →
                </a>

            </div>

        </div>


        <!-- 2. Urban Bites -->
        <div class="trending-card">

            <img
                src="images/urbanbites.jpg"
                alt="Urban Bites"
            >

            <div class="trending-info">

                <h3>Urban Bites</h3>

                <p>📍 Pulchowk, Lalitpur</p>

                <p>⭐ 4.6/5</p>

                <p>🍴 Fast Food</p>

                <a href="restaurant.php?id=2">
                    View Restaurant →
                </a>

            </div>

        </div>


        <!-- 3. Taste Corner -->
        <div class="trending-card">

            <img
                src="images/tastecorner.jpg"
                alt="Taste Corner"
            >

            <div class="trending-info">

                <h3>Taste Corner</h3>

                <p>📍 Bhaktapur Durbar Square</p>

                <p>⭐ 4.7/5</p>

                <p>🍴 Newari Food</p>

                <a href="restaurant.php?id=3">
                    View Restaurant →
                </a>

            </div>

        </div>


        <!-- 4. Momo Station -->
        <div class="trending-card">

            <img
                src="images/momostation.jpg"
                alt="Momo Station"
            >

            <div class="trending-info">

                <h3>Momo Station</h3>

                <p>📍 New Road, Kathmandu</p>

                <p>⭐ 4.7/5</p>

                <p>🍴 Momo & Snacks</p>

                <a href="restaurant.php?id=4">
                    View Restaurant →
                </a>

            </div>

        </div>


        <!-- 5. Pizza Palace -->
        <div class="trending-card">

            <img
                src="images/pizzapalace.jpg"
                alt="Pizza Palace"
            >

            <div class="trending-info">

                <h3>Pizza Palace</h3>

                <p>📍 Jhamsikhel, Lalitpur</p>

                <p>⭐ 4.5/5</p>

                <p>🍴 Pizza & Italian</p>

                <a href="restaurant.php?id=5">
                    View Restaurant →
                </a>

            </div>

        </div>

    </div>

</section>

    
<section class="why-us">
    <div class="safal-content">

        <span>
            WHY FOODIEHUB?
        </span>


        <h2>

            Your food journey,
            <br>
            made easier.

        </h2>


        <p>

            We help food lovers discover hidden gems,
            compare restaurants and make better dining
            decisions.

        </p>


        <div class="features">


            <div>

                <strong>
                    01
                </strong>

                <h3>
                    Discover
                </h3>

                <p>
                    Find amazing restaurants near you.
                </p>

            </div>


            <div>

                <strong>
                    02
                </strong>

                <h3>
                    Review
                </h3>

                <p>
                    Read honest reviews from food lovers.
                </p>

            </div>


            <div>

                <strong>
                    03
                </strong>

                <h3>
                    Enjoy
                </h3>

                <p>
                    Visit your favorite place and enjoy!
                </p>

            </div>

        </div>

    </div>



    <div class="safal-image">

        <img
            src="https://images.unsplash.com/photo-1515003197210-e0cd71810b5f"
            alt="People enjoying food"
        >


        <div class="floating-card">

            <span>
                ⭐
            </span>


            <div>

                <strong>
                    4.9/5
                </strong>

                <p>
                    Average rating
                </p>

            </div>

        </div>

    </div>
</section>
<section class="reviews" id="reviews">
    <div class="messi">

        <span>
            FOOD LOVERS
        </span>
        <h2>
            What people are saying
        </h2>
        <p>
            Real experiences from our community.
        </p>
    </div>



    <div class="review-safal">
        <div class="review-card">
            <div class="user">
                <div class="avatar">
                    A
                </div>
                <div>
                    <h3>
                        Safal
                    </h3>

                    <small>
                        Lamjung
                    </small>

                </div>

            </div>


            <div class="stars">
                ⭐⭐⭐⭐⭐
            </div>
            <p>

                "FoodieHub helped me discover some
                amazing momo places that I never
                knew existed!
            </p>
        </div>
        <div class="review-card">
            <div class="user">
                <div class="avatar">
                    P
                </div>


                <div>

                    <h3>
                        Paras
                    </h3>
                    <small>
                        Palpa
                    </small>
                </div>
            </div>
            <div class="stars">
                ⭐⭐⭐⭐⭐
            </div>
            <p>
                "The restaurant ratings are really
                helpful. I always check FoodieHub
                before trying somewhere new."

            </p>
        </div>
        <div class="review-card">
            <div class="user">
                <div class="avatar">
                    S
                </div>
                <div>
                    <h3>
                        Suyog
                    </h3>
                    <small>
                        Kalanki
                    </small>
                </div>
            </div>
            <div class="stars">
                ⭐⭐⭐⭐
            </div>
            <p>
                "Clean design, useful reviews and
                lots of restaurants to explore.
                Love it!"
            </p>
        </div>
         <div class="review-card">
            <div class="user">
                <div class="avatar">
                    S
                </div>


                <div>

                    <h3>
                        Shisir
                    </h3>
                    <small>
                        Palpa
                    </small>
                </div>
            </div>
            <div class="stars">
                ⭐⭐⭐⭐⭐
            </div>
            <p>
                "The restaurant ratings are really
                helpful. I always check FoodieHub
                before trying somewhere new."

            </p>
        </div>
         <div class="review-card">
            <div class="user">
                <div class="avatar">
                    S
                </div>
                <div>

                    <h3>
                        Supriya
                    </h3>
                    <small>
                        Patan
                    </small>
                </div>
            </div>
            <div class="stars">
                ⭐⭐⭐⭐⭐
            </div>
            <p>
                "The restaurant ratings are really
                helpful. I always check FoodieHub
                before trying somewhere new."

            </p>
        </div>

        <div class="review-card">
            <div class="user">
                <div class="avatar">S</div>
                <div>
                    <h3>Sejal</h3>
                    <small>Bauddha</small>
                </div>
            </div>
            <div class="stars">
                ⭐⭐⭐⭐⭐
            </div>
            <p>
                "FoodieHub made it really easy to discover
                new restaurants. I found a great place for
                dinner and absolutely loved the food!"
            </p>
        </div>
        <div class="review-card">
            <div class="user">
                <div class="avatar">S</div>
                <div>
                    <h3>Sumit</h3>
                    <small>Bhaktapur</small>
                </div>
            </div>
            <div class="stars">
                ⭐⭐⭐⭐⭐
            </div>
            <p>
                "I really like the restaurant ratings and
                reviews. They help me decide where to eat
                without wasting time."
            </p>
        </div>
        <div class="review-card">
            <div class="user">
                <div class="avatar">A</div>

                <div>
                    <h3>Abhinav</h3>
                    <small>Pallu</small>
                </div>
            </div>
            <div class="stars">
                ⭐⭐⭐⭐
            </div>
            <p>
                "The restaurant information is simple to
                understand and the food categories make
                finding what I want much easier."
            </p>
        </div>
        <div class="review-card">
            <div class="user">
                <div class="avatar">N</div>
                <div>
                    <h3>Nisip</h3>
                    <small>Bhaktapur</small>
                </div>
            </div>
            <div class="stars">
                ⭐⭐⭐⭐⭐
            </div>
            <p>
                "I discovered a small restaurant through
                FoodieHub that I had never noticed before.
                The food was amazing!"
            </p>
        </div>
        <div class="review-card">
            <div class="user">
                <div class="avatar">S</div>
                <div>
                    <h3>Shysa</h3>
                    <small>Chitwan</small>
                </div>
            </div>
            <div class="stars">
                ⭐⭐⭐⭐
            </div>
            <p>
                "The interface is clean and easy to use.
                I especially like being able to compare
                different restaurants."
            </p>
        </div>
        <div class="review-card">
            <div class="user">
                <div class="avatar">A</div>
                <div>
                    <h3>Aaha</h3>
                    <small>Kathmandu</small>
                </div>
            </div>
            <div class="stars">
                ⭐⭐⭐⭐⭐
            </div>

            <p>
                "Finding good food has become much easier
                for me. The reviews give a useful idea
                about what to expect."
            </p>

        </div>

        <div class="review-card">
            <div class="user">
                <div class="avatar">B</div>
                <div>
                    <h3>Bibas</h3>
                    <small>Morang</small>
                </div>

            </div>

            <div class="stars">
                ⭐⭐⭐⭐⭐
            </div>

            <p>
                "FoodieHub is a great platform for food
                lovers. I enjoy exploring different
                restaurants and sharing my experience."
            </p>

        </div>

    </div>

</section>
    </div>
</section>
<section class="cta">
    <h2>
        Ready to discover something delicious?
    </h2>
    <p>
        Join thousands of food lovers exploring
        great restaurants.
    </p>
    <a href="register.html">
        Create Free Account →
    </a>
</section>
<footer>
    <div class="footer-content">
        <div class="footer-brand">
            <h2>
                🍴 FoodieHub
            </h2>
            <p>
                Discover. Review. Enjoy.
            </p>
        </div>
        <div>
            <h3>
                Explore
            </h3>
            <a href="#home">
                Home
            </a>
            <a href="#about">
                About
            </a>
            <a href="#restaurants">
                Restaurants
            </a>
            <a href="#reviews">
                Reviews
            </a>
        </div>
        <div>

            <h3>
                Company
            </h3>
            <a href="#about">
                About Us
            </a>
            <a href="#">
                Contact
            </a>
            <a href="#">
                Privacy
            </a>
            <a href="#">
                Terms
            </a>
        </div>
        <div>

            <h3>
                Follow Us
            </h3>
            <div class="social">
                Instagram<br>
                Facebook<br>
                TikTok
            </div>
        </div>
    </div>
    <div class="copyright">
        © 2026 FoodieHub.
        All Rights Reserved.
    </div>
    <!-- Contact Section -->
<section class="contact-section" id="contact">

    <div class="contact-container">

        <div class="contact-info">

            <h2>📞 Contact FoodieHub</h2>

            <p>
                Have a question, suggestion, or want to recommend a restaurant?
                We'd love to hear from you!
            </p>

            <div class="contact-details">

                <p>📧 <strong>Email:</strong> foodiehub@gmail.com</p>

                <p>📱 <strong>Phone:</strong> +977 9766605856</p>

                <p>📍 <strong>Location:</strong> Kathmandu, Nepal</p>

            </div>

        </div>


        <div class="contact-form">

            <h3>Send Us a Message</h3>

            <form>

                <input
                    type="text"
                    placeholder="Your Name"
                    required
                >

                <input
                    type="email"
                    placeholder="Your Email"
                    required
                >

                <textarea
                    placeholder="Write your message..."
                    rows="5"
                    required
                ></textarea>

                <button type="submit">
                    Send Message →
                </button>

            </form>

        </div>

    </div>

</section>
</footer>
<script src="script.js"></script>
</body>
</html>
