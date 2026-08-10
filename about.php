<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About Us | FoodieHub</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
<style>
    /* ================= FOUNDERS ================= */

.founders {
    padding: 90px 8%;
    background: #fff8f2;
}

.founders-heading {
    max-width: 750px;
    margin: 0 auto 55px;
    text-align: center;
}

.founders-heading span {
    color: #ff5722;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 2px;
}

.founders-heading h2 {
    margin: 12px 0 18px;
    color: #222;
    font-size: 42px;
    line-height: 1.2;
}

.founders-heading p {
    color: #666;
    font-size: 16px;
    line-height: 1.7;
}

.founders-grid {
    max-width: 1150px;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.founder-card {
    background: white;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.10);
    border: 1px solid #ffe0cc;
    transition: 0.35s ease;
}

.founder-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.18);
}

.founder-image {
    width: 180px;
    height: 180px;
    margin: 25px auto 0;
    border-radius: 50%;
    overflow: hidden;
    background: #f5f5f5;
    border: 5px solid #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
}

.founder-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: 0.4s ease;
}

.founder-card:hover .founder-image img {
    transform: scale(1.08);
}

.founder-info {
    padding: 25px;
    text-align: center;
}

.founder-info h3 {
    margin-bottom: 7px;
    color: #222;
    font-size: 25px;
}

.founder-info span {
    color: #ff5722;
    font-size: 14px;
    font-weight: 600;
}

.founder-info p {
    margin-top: 15px;
    color: #666;
    font-size: 14px;
    line-height: 1.7;
}


/* ================= FOUNDERS MOBILE ================= */

@media (max-width: 900px) {

    .founders {
        padding: 70px 5%;
    }

    .founders-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}

@media (max-width: 600px) {

    .founders {
        padding: 60px 5%;
    }

    .founders-heading h2 {
        font-size: 32px;
    }

    .founders-grid {
        grid-template-columns: 1fr;
        max-width: 400px;
    }

    .founder-image {
        height: 400px;
    }

}
</style>
</head>

<body>

    <header class="navbar">

        <div class="logo">
            🍴 Foodie<span>Hub</span>
        </div>

        <nav>

            <a href="index.php">Home</a>

            <a href="about.php" class="active">About</a>

            <a href="restaurants.php">Restaurants</a>
             <a href="founder.php">Founders</a>

            <a href="#">Reviews</a>

            <a href="#">Contact</a>

        </nav>

        <div class="nav-actions">

            <a href="login.php" class="login-link">
                Login
            </a>

            <a href="register.php" class="signup-btn">
                Sign Up
            </a>

        </div>

    </header>


    <!-- ================= ABOUT HERO ================= -->

    <section class="food-about-hero">

        <div>

            <span>ABOUT FOODIEHUB</span>

            <h1>
                Discover Great Food.<br>
                Share Your Experience.
            </h1>

            <p>
                Your trusted platform for discovering restaurants,
                exploring delicious food and sharing honest reviews.
            </p>

        </div>

    </section>


    <!-- ================= ABOUT INTRO ================= -->

    <section class="food-about-intro">

        <div class="about-food-image">

            <img
                src="https://images.unsplash.com/photo-1504674900247-0877df9cc836"
                alt="Delicious Food">

            <div class="food-stat">

                <strong>10K+</strong>

                <span>
                    Food lovers<br>
                    discovering
                </span>

            </div>

        </div>


        <div class="food-about-text">

            <span>WHO WE ARE</span>

            <h2>
                Making food discovery
                simple and exciting.
            </h2>

            <p>
                FoodieHub is a food discovery and review platform
                created for people who love exploring new places
                to eat.
            </p>

            <p>
                Instead of wondering where to eat, users can
                discover restaurants, explore menus, check ratings
                and read experiences shared by other food lovers.
            </p>

            <p>
                Our goal is to connect people with great food
                while helping restaurants reach new customers.
            </p>

        </div>

    </section>


    <!-- ================= WHAT WE OFFER ================= -->

    <section class="what-we-do">

        <div class="about-heading">

            <span>WHAT WE OFFER</span>

            <h2>
                Everything you need<br>
                to find great food.
            </h2>

            <p>
                From discovering a restaurant to sharing
                your experience, FoodieHub makes it easy.
            </p>

        </div>


        <div class="about-card-grid">

            <div class="about-feature-card">

                <div class="about-feature-icon">
                    🔍
                </div>

                <h3>
                    Discover Restaurants
                </h3>

                <p>
                    Find restaurants based on location,
                    cuisine, ratings and popularity.
                </p>

            </div>


            <div class="about-feature-card">

                <div class="about-feature-icon">
                    ⭐
                </div>

                <h3>
                    Read Reviews
                </h3>

                <p>
                    See ratings and genuine experiences
                    from other food lovers before you visit.
                </p>

            </div>


            <div class="about-feature-card">

                <div class="about-feature-icon">
                    🍽️
                </div>

                <h3>
                    Explore Menus
                </h3>

                <p>
                    Explore dishes, food categories and
                    menus to decide what you want to eat.
                </p>

            </div>


            <div class="about-feature-card">

                <div class="about-feature-icon">
                    ✍️
                </div>

                <h3>
                    Share Your Reviews
                </h3>

                <p>
                    Share your dining experience and help
                    other users discover great places.
                </p>

            </div>

        </div>

    </section>



    <section class="mission">

        <div class="mission-image">

            <img
                src="https://images.unsplash.com/photo-1515003197210-e0cd71810b5f"
                alt="People enjoying food">

        </div>


        <div class="mission-content">

            <span>OUR MISSION</span>

            <h2>
                Helping people make
                better food choices.
            </h2>

            <p>
                Choosing a restaurant can sometimes be difficult.
                There are hundreds of options, but finding the
                right one can take time.
            </p>

            <p>
                FoodieHub brings restaurants, food information
                and community reviews together in one place.
            </p>


            <div class="mission-points">

                <div>

                    <strong>01</strong>

                    <span>
                        Discover new restaurants
                    </span>

                </div>


                <div>

                    <strong>02</strong>

                    <span>
                        Make informed food choices
                    </span>

                </div>


                <div>

                    <strong>03</strong>

                    <span>
                        Share experiences with others
                    </span>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= STATISTICS ================= -->

    <section class="about-stats">

        <div>

            <strong>500+</strong>

            <span>
                Restaurants
            </span>

        </div>


        <div>

            <strong>10K+</strong>

            <span>
                Food Lovers
            </span>

        </div>


        <div>

            <strong>25K+</strong>

            <span>
                Reviews
            </span>

        </div>


        <div>

            <strong>50+</strong>

            <span>
                Food Categories
            </span>

        </div>

    </section>


    <!-- ================= CTA ================= -->

    <section class="about-food-cta">

        <h2>
            Ready to discover your next favorite meal?
        </h2>

        <p>
            Join FoodieHub and start exploring today.
        </p>

        <a href="register.php">
            Join FoodieHub →
        </a>

    </section>


    <!-- ================= FOOTER ================= -->

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

                <a href="index.php">
                    Home
                </a>

                <a href="restaurants.php">
                    Restaurants
                </a>

                <a href="#">
                    Reviews
                </a>

                <a href="#">
                    Food
                </a>

            </div>


            <div>

                <h3>
                    Company
                </h3>

                <a href="about.php">
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

                <p class="social">
                    Instagram<br>
                    Facebook<br>
                    TikTok
                </p>

            </div>

        </div>


        <div class="copyright">

            © 2026 FoodieHub. All Rights Reserved.

        </div>

    </footer>

</body>

</html>