<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Founders | FoodieHub</title>

    <link rel="stylesheet" href="founder.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background: #fff;
    color: #222;
}


/* NAVBAR */

.navbar {
    min-height: 75px;
    padding: 0 7%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
    box-shadow: 0 2px 15px rgba(0,0,0,0.08);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.logo {
    font-size: 25px;
    font-weight: 800;
}

.logo span {
    color: #ff5722;
}

.navbar nav {
    display: flex;
    gap: 22px;
}

.navbar nav a {
    text-decoration: none;
    color: #444;
    font-size: 14px;
    font-weight: 500;
    transition: 0.3s;
}

.navbar nav a:hover,
.navbar nav a.active {
    color: #ff5722;
}

.nav-actions {
    display: flex;
    align-items: center;
    gap: 15px;
}

.login {
    text-decoration: none;
    color: #333;
    font-weight: 500;
}

.signup {
    text-decoration: none;
    background: #ff5722;
    color: #fff;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 600;
}


/* HERO */

.founder-hero {
    min-height: 360px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 60px 20px;
    background: linear-gradient(135deg, #fff3e8, #ffe1d0);
}

.founder-hero span {
    color: #ff5722;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 2px;
}

.founder-hero h1 {
    font-size: 52px;
    margin: 15px 0;
    font-weight: 800;
}

.founder-hero p {
    color: #666;
    font-size: 17px;
}


/* FOUNDERS */

.founders-section {
    padding: 90px 7%;
}

.section-heading {
    max-width: 750px;
    margin: 0 auto 60px;
    text-align: center;
}

.section-heading span {
    color: #ff5722;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 2px;
}

.section-heading h2 {
    font-size: 38px;
    margin: 12px 0;
}

.section-heading p {
    color: #666;
    line-height: 1.7;
}


/* CARDS */

.founders-container {
    max-width: 1100px;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 35px;
}

.founder-card {
    background: #fff;
    border-radius: 25px;
    padding: 30px 25px;
    text-align: center;
    border: 1px solid #ffe0d0;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: 0.35s ease;
}

.founder-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.15);
}


/* CIRCULAR MEDIUM IMAGE */

.founder-image {
    width: 180px;
    height: 180px;
    margin: 0 auto 25px;
    border-radius: 50%;
    overflow: hidden;
    border: 6px solid #fff;
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
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


/* DETAILS */

.founder-details h3 {
    font-size: 26px;
    margin-bottom: 6px;
}

.founder-details span {
    color: #ff5722;
    font-size: 14px;
    font-weight: 600;
}

.founder-details p {
    color: #666;
    font-size: 14px;
    line-height: 1.7;
    margin-top: 15px;
}


/* QUOTE */

.founder-quote {
    text-align: center;
    padding: 80px 20px;
    background: #fff5ef;
}

.founder-quote h2 {
    color: #ff5722;
    font-size: 35px;
    margin-bottom: 12px;
}

.founder-quote p {
    color: #666;
}


/* FOOTER */

footer {
    background: #222;
    color: #fff;
    padding: 60px 7% 20px;
}

.footer-content {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 50px;
    max-width: 1100px;
    margin: auto;
}

.footer-content h2 {
    margin-bottom: 10px;
}

.footer-content h3 {
    margin-bottom: 15px;
}

.footer-content p {
    color: #bbb;
}

.footer-content a {
    display: block;
    text-decoration: none;
    color: #bbb;
    margin: 8px 0;
    transition: 0.3s;
}

.footer-content a:hover {
    color: #ff5722;
}

.copyright {
    text-align: center;
    border-top: 1px solid #444;
    margin-top: 45px;
    padding-top: 20px;
    color: #999;
    font-size: 13px;
}


/* RESPONSIVE */

@media (max-width: 1000px) {

    .navbar nav {
        gap: 12px;
    }

    .founders-container {
        grid-template-columns: repeat(2, 1fr);
    }

}

@media (max-width: 700px) {

    .navbar {
        padding: 20px;
        flex-direction: column;
        gap: 15px;
    }

    .navbar nav {
        flex-wrap: wrap;
        justify-content: center;
    }

    .founder-hero h1 {
        font-size: 40px;
    }

    .founders-container {
        grid-template-columns: 1fr;
        max-width: 400px;
    }

    .footer-content {
        grid-template-columns: 1fr;
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

            <a href="about.php">About</a>

            <a href="restaurants.php">Restaurants</a>

            <a href="founder.php" class="active">Founders</a>

            <a href="#">Reviews</a>

            <a href="#">Contact</a>

        </nav>

        

    </header>


    <!-- ================= HERO ================= -->

    <section class="founder-hero">

        <div>

            <span>THE TEAM BEHIND FOODIEHUB</span>

            <h1>
                Meet Our Founders
            </h1>

            <p>
                Meet the people behind FoodieHub and the idea
                of making food discovery simple and exciting.
            </p>

        </div>

    </section>


    <!-- ================= FOUNDERS ================= -->

    <section class="founders-section">

        <div class="section-heading">

            <span>OUR FOUNDERS</span>

            <h2>
                The people behind FoodieHub
            </h2>

            <p>
                FoodieHub was created by three passionate individuals
                who believe discovering great food should be simple,
                exciting and enjoyable.
            </p>

        </div>


        <div class="founders-container">


            <!-- SAFAL -->

            <div class="founder-card">

                <div class="founder-image">

                    <img src="images\safal.png.png" alt="Safal">

                </div>

                <div class="founder-details">

                    <h3>
                        Safal
                    </h3>

                    <span>
                        Co-Founder & Developer
                    </span>

                    <p>
                        Passionate about technology and web development,
                        Safal works on building and improving the FoodieHub
                        platform.
                    </p>

                </div>

            </div>


            <!-- PARAS -->

            <div class="founder-card">

                <div class="founder-image">

                    <img
                        src="images/paras.jpeg.jpeg"
                        alt="Paras">

                </div>

                <div class="founder-details">

                    <h3>
                        Paras
                    </h3>

                    <span>
                        Co-Founder & Designer
                    </span>

                    <p>
                        Paras focuses on creative ideas and user-friendly
                        designs that make FoodieHub simple and enjoyable.
                    </p>

                </div>

            </div>


            <!-- SUYOG -->

            <div class="founder-card">

                <div class="founder-image">

                    <img
                        src="images/suyog.png.png"
                        alt="Suyog">

                </div>

                <div class="founder-details">

                    <h3>
                        Suyog
                    </h3>

                    <span>
                        Co-Founder & Developer
                    </span>

                    <p>
                        Suyog contributes to the development of FoodieHub
                        and helps turn ideas into useful features.
                    </p>

                </div>

            </div>


        </div>

    </section>


    <!-- ================= QUOTE ================= -->

    <section class="founder-quote">

        <h2>
            Discover. Review. Enjoy.
        </h2>

        <p>
            Our goal is to make finding your next favorite restaurant
            easier for everyone.
        </p>

    </section>


    <!-- ================= FOOTER ================= -->

    <footer>

        <div class="footer-content">

            <div>

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

                <a href="about.php">
                    About
                </a>

                <a href="restaurants.php">
                    Restaurants
                </a>

                <a href="founder.php">
                    Founders
                </a>

            </div>


            <div>

                <h3>
                    Account
                </h3>

                <a href="login.php">
                    Login
                </a>

                <a href="register.php">
                    Sign Up
                </a>

            </div>

        </div>


        <div class="copyright">

            © 2026 FoodieHub. All Rights Reserved.

        </div>

    </footer>

</body>

</html>