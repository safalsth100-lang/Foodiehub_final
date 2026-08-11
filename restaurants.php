<?php

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");

    exit();

}

include 'db.php';

$sql = "SELECT * FROM restaurants ORDER BY id ASC";

$result = $conn->query($sql);

if (!$result) {

    die("Database Error: " . $conn->error);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FoodieHub | Restaurants</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;

            background: linear-gradient(
                135deg,
                #fff3e0,
                #ffe0b2,
                #fff8e1
            );
        }

        /* NAVBAR */

        .navbar {
            background: #e65100;
            padding: 18px 8%;

            display: flex;
            justify-content: space-between;
            align-items: center;

            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .logo {
            color: white;
            font-size: 28px;
            font-weight: bold;
        }

        .navbar-links {
            display: flex;
            gap: 25px;
        }

        .navbar-links a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar-links a:hover {
            color: #ffe0b2;
        }

        /* HEADER */

        .page-header {
            text-align: center;
            padding: 45px 20px 30px;
        }

        .page-header h1 {
            color: #e65100;
            font-size: 40px;
            margin-bottom: 10px;
        }

        .page-header p {
            color: #666;
            font-size: 17px;
        }

        /* GRID */

        .restaurant-container {
            width: 90%;
            max-width: 1100px;

            margin: auto;

            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 25px;

            padding-bottom: 50px;
        }

        /* CARD */

        .restaurant-card {
            background: white;

            border: 3px solid #ffb74d;

            border-radius: 20px;

            padding: 25px;

            text-align: center;

            box-shadow: 0 8px 20px rgba(0,0,0,0.12);

            transition: 0.3s;
        }

        .restaurant-card:hover {
            transform: translateY(-8px);

            border-color: #ff5722;

            box-shadow:
                0 12px 25px rgba(255,87,34,0.25);
        }

        /* ICON */

        .restaurant-icon {
            width: 80px;
            height: 80px;

            margin: 0 auto 15px;

            border-radius: 50%;

            background: #fff3e0;

            border: 3px solid #ff9800;

            display: flex;

            justify-content: center;
            align-items: center;

            font-size: 38px;
        }

        /* NAME */

        .restaurant-card h2 {
            color: #e65100;
            margin-bottom: 10px;
        }

        /* LOCATION */

        .location {
            color: #f57c00;

            font-weight: bold;

            margin-bottom: 15px;
        }

        /* DESCRIPTION */

        .description {
            color: #666;

            line-height: 1.5;

            margin-bottom: 20px;
        }

        /* BUTTON */

        .view-btn {
            display: inline-block;

            background: #ff5722;

            color: white;

            text-decoration: none;

            padding: 11px 22px;

            border-radius: 25px;

            font-weight: bold;

            transition: 0.3s;
        }

        .view-btn:hover {
            background: #e65100;

            transform: scale(1.05);
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {

            .restaurant-container {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 600px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .navbar-links {
                gap: 15px;
            }

            .restaurant-container {
                grid-template-columns: 1fr;
            }

            .page-header h1 {
                font-size: 30px;
            }

        }
.logout-btn {
    background: white;
    color: #e65100 !important;
    padding: 8px 16px;
    border-radius: 20px;
    transition: 0.3s;
}

.logout-btn:hover {
    background: #ffe0b2;
    color: #bf360c !important;
}
.stha{
    background-image:url('https://mir-s3-cdn-cf.behance.net/projects/404/3f933b88225973.Y3JvcCwxMjAwLDkzOCwwLDg5.jpg');
  
}
    </style>

</head>

<body>


<nav class="navbar">

    <div class="logo">
        🍴 FoodieHub
    </div>

    <div class="navbar-links">

        <a href="index.php">
            Home
        </a>

        <a href="restaurants.php">
            Restaurants
        </a>

        <a href="about.php">
            About
        </a>
            <a href="founder.php">Founders</a>

        

        <a href="logout.php" class="logout-btn">
            Logout
        </a>

    </div>

</nav>
<div class="stha">
<div class="page-header">

    <h1>
        🍽️ Explore Restaurants
    </h1>

    <p>
        Discover delicious food and explore restaurant menus.
    </p>

</div>


<!-- RESTAURANTS -->

<div class="restaurant-container">

<?php

if ($result->num_rows > 0) {

    while ($restaurant = $result->fetch_assoc()) {

?>

        <div class="restaurant-card">

            <div class="restaurant-icon">
                🍴
            </div>

            <h2>
                <?php
                echo htmlspecialchars($restaurant['name']);
                ?>
            </h2>

            <div class="location">

                📍

                <?php
                echo htmlspecialchars($restaurant['location']);
                ?>

            </div>

            <p class="description">

                Discover delicious food at
                <?php
                echo htmlspecialchars($restaurant['name']);
                ?>.

            </p>

            <a
                href="restaurant.php?id=<?php echo $restaurant['id']; ?>"
                class="view-btn"
            >
                View Restaurant →
            </a>

        </div>

<?php

    }

} else {

?>

        <div style="
            grid-column: 1 / -1;
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 20px;
        ">

            <h2>
                No restaurants found.
            </h2>

        </div>

<?php

}

?>

</div>
</div>
</body>

</html>