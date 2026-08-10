<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

if (!isset($_GET['id'])) {
    die("Restaurant not found.");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM restaurants WHERE id = $id";

$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Restaurant not found.");
}

$restaurant = $result->fetch_assoc();


// =====================================================
// GOOGLE MAPS
// =====================================================

$mapEmbeds = [

    1 => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108167.80874853964!2d85.15944659726561!3d27.716975000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e2cce54d2f%3A0xb4bb919dc16ae274!2sThamel%20House%20Restaurant!5e1!3m2!1sen!2snp!4v1786337819932!5m2!1sen!2snp",

    2 => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3381.687334845843!2d85.30877117516994!3d27.67037462712171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1955afd5b07f%3A0xe3f6bfb9f4552b6e!2sUrbanBites!5e1!3m2!1sen!2snp!4v1786338150263!5m2!1sen!2snp",

    3 => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3381.6472725036215!2d85.42379299678952!3d27.671669100000013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1b001a547161%3A0x481b67b62c33385b!2sHimalayan%20Java%20Coffee%20-%20Bhaktapur%20Durbar%20Square!5e1!3m2!1sen!2snp!4v1786338280702!5m2!1sen!2snp",

    4 => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108220.96254716991!2d85.1638661972656!3d27.663338000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19d4624f77ad%3A0xefb5b6b4b9fa982d!2sMo%20Mo%20Station!5e1!3m2!1sen!2snp!4v1786338327217!5m2!1sen!2snp",

    5 => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3382.1856544389807!2d85.3012206751693!3d27.654268527831054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1788358c4e33%3A0xca6ca6ccf55f0994!2sThe%20Pizza%20Palace!5e1!3m2!1sen!2snp!4v1786338362751!5m2!1sen!2snp"

];

$mapLink = $mapEmbeds[$id] ?? "";


// =====================================================
// RESTAURANT MENUS
// =====================================================

$menus = [

    1 => [

        [
            "name" => "Chicken Momo",
            "price" => 220,
            "description" => "Steamed chicken momos served with spicy chutney."
        ],

        [
            "name" => "Chicken Sekuwa",
            "price" => 350,
            "description" => "Traditional Nepali grilled chicken with spices."
        ],

        [
            "name" => "Thakali Khana Set",
            "price" => 450,
            "description" => "Rice, dal, vegetables, pickle and chicken."
        ],

        [
            "name" => "Chow Mein",
            "price" => 250,
            "description" => "Stir-fried noodles with vegetables and chicken."
        ],

        [
            "name" => "Mango Lassi",
            "price" => 150,
            "description" => "Refreshing creamy mango yogurt drink."
        ]

    ],
    2 => [

        [
            "name" => "Urban Chicken Burger",
            "price" => 320,
            "description" => "Crispy chicken burger with fresh vegetables."
        ],
        [
            "name" => "Loaded Fries",
            "price" => 250,
            "description" => "Crispy fries topped with cheese and sauces."
        ],

        [
            "name" => "Chicken Pizza",
            "price" => 450,
            "description" => "Cheesy pizza topped with seasoned chicken."
        ],

        [
            "name" => "Pasta Alfredo",
            "price" => 380,
            "description" => "Creamy Alfredo pasta with herbs."
        ],

        [
            "name" => "Cold Coffee",
            "price" => 180,
            "description" => "Smooth and refreshing chilled coffee."
        ]

    ],

    3 => [

        [
            "name" => "Newari Khaja Set",
            "price" => 350,
            "description" => "Traditional Newari platter with local specialties."
        ],

        [
            "name" => "Buff Choila",
            "price" => 300,
            "description" => "Spicy grilled buff prepared in Newari style."
        ],

        [
            "name" => "Chatamari",
            "price" => 220,
            "description" => "Traditional Newari rice-flour pizza."
        ],

        [
            "name" => "Yomari",
            "price" => 150,
            "description" => "Sweet traditional Newari dumpling."
        ],

        [
            "name" => "Masala Tea",
            "price" => 80,
            "description" => "Hot Nepali tea with aromatic spices."
        ]

    ],

    4 => [

        [
            "name" => "Chicken Momo",
            "price" => 180,
            "description" => "Juicy steamed chicken momos with chutney."
        ],

        [
            "name" => "Jhol Momo",
            "price" => 220,
            "description" => "Momos served in a flavorful spicy soup."
        ],

        [
            "name" => "Fried Momo",
            "price" => 200,
            "description" => "Crispy fried momos with special sauce."
        ],

        [
            "name" => "Chilli Momo",
            "price" => 230,
            "description" => "Spicy momos tossed with vegetables and sauce."
        ],

        [
            "name" => "Veg Momo",
            "price" => 160,
            "description" => "Fresh vegetable-filled steamed momos."
        ]

    ],

    5 => [

        [
            "name" => "Margherita Pizza",
            "price" => 400,
            "description" => "Classic pizza with tomato, mozzarella and basil."
        ],

        [
            "name" => "Chicken Pizza",
            "price" => 500,
            "description" => "Cheesy pizza topped with seasoned chicken."
        ],

        [
            "name" => "Pepperoni Pizza",
            "price" => 550,
            "description" => "Classic pepperoni with melted cheese."
        ],

        [
            "name" => "Garlic Bread",
            "price" => 200,
            "description" => "Freshly baked garlic bread with herbs."
        ],

        [
            "name" => "Chocolate Brownie",
            "price" => 180,
            "description" => "Warm chocolate brownie for dessert."
        ]

    ]

];

$menu = $menus[$id] ?? [];

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo htmlspecialchars($restaurant['name']); ?> - FoodieHub
    </title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #fff3e0, #ffe0b2, #fff8e1);
            color: #333;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            background: #e65100;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.20);
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
            transition: 0.3s;
        }

        .navbar-links a:hover {
            color: #ffe0b2;
        }

        /* ================= RESTAURANT HEADER ================= */

        .restaurant-header {
            width: 90%;
            max-width: 900px;
            margin: 45px auto 30px;
            padding: 35px;
            background: white;
            text-align: center;
            border-radius: 22px;
            border: 3px solid #ff9800;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .restaurant-header h1 {
            color: #e65100;
            font-size: 38px;
            margin-bottom: 12px;
        }

        .location {
            color: #f57c00;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .restaurant-description {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
        }

        /* ================= MAP ================= */

        .map-container {
            width: 90%;
            max-width: 900px;
            margin: 0 auto 35px;
            background: white;
            padding: 15px;
            border: 3px solid #ff9800;
            border-radius: 22px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .map-container iframe {
            width: 100%;
            height: 400px;
            border: 0;
            border-radius: 15px;
        }

        /* ================= MENU ================= */

        .menu-container {
            width: 90%;
            max-width: 900px;
            margin: 0 auto 35px;
            padding: 30px;
            background: #fffaf3;
            border: 3px solid #ff9800;
            border-radius: 22px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .menu-title {
            text-align: center;
            color: #e65100;
            font-size: 32px;
            margin-bottom: 25px;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            background: white;
            padding: 20px;
            margin-bottom: 16px;
            border: 2px solid #ffb74d;
            border-left: 8px solid #ff7043;
            border-radius: 14px;
            transition: 0.3s;
        }

        .menu-item:hover {
            transform: translateX(8px);
            background: #fff3e0;
            border-color: #ff5722;
            box-shadow: 0 7px 18px rgba(255, 87, 34, 0.25);
        }

        .food-info {
            flex: 1;
        }

        .food-info h3 {
            color: #333;
            font-size: 21px;
            margin-bottom: 7px;
        }

        .food-info p {
            color: #777;
            font-size: 14px;
            line-height: 1.5;
        }

        .price {
            background: #ff5722;
            color: white;
            padding: 10px 17px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            white-space: nowrap;
            box-shadow: 0 3px 8px rgba(255, 87, 34, 0.25);
        }

        /* ================= BACK BUTTON ================= */

        .back-button {
            display: block;
            width: fit-content;
            margin: 0 auto 45px;
            padding: 13px 27px;
            background: #e65100;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            transition: 0.3s;
        }

        .back-button:hover {
            background: #bf360c;
            transform: scale(1.05);
        }

        /* ================= MOBILE ================= */

        @media (max-width: 600px) {

            .navbar {
                flex-direction: column;
                gap: 12px;
                padding: 16px 5%;
            }

            .navbar-links {
                gap: 15px;
            }

            .restaurant-header {
                width: 92%;
                padding: 25px 18px;
            }

            .restaurant-header h1 {
                font-size: 29px;
            }

            .map-container {
                width: 92%;
                padding: 10px;
            }

            .map-container iframe {
                height: 300px;
            }

            .menu-container {
                width: 92%;
                padding: 20px;
            }

            .menu-title {
                font-size: 27px;
            }

            .menu-item {
                padding: 16px;
                gap: 12px;
            }

            .food-info h3 {
                font-size: 17px;
            }

            .food-info p {
                font-size: 12px;
            }

            .price {
                font-size: 13px;
                padding: 8px 12px;
            }

        }

    </style>

</head>

<body>

    <!-- ================= NAVBAR ================= -->

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

        </div>

    </nav>


    <!-- ================= RESTAURANT HEADER ================= -->

    <section class="restaurant-header">

        <h1>
            <?php echo htmlspecialchars($restaurant['name']); ?>
        </h1>

        <div class="location">
            📍 <?php echo htmlspecialchars($restaurant['location']); ?>
        </div>

        <p class="restaurant-description">
            Discover delicious food and explore the menu at
            <strong>
                <?php echo htmlspecialchars($restaurant['name']); ?>
            </strong>.
        </p>

    </section>


    <!-- ================= GOOGLE MAP ================= -->

    <div class="map-container">

        <iframe
            src="<?php echo htmlspecialchars($mapLink); ?>"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="strict-origin-when-cross-origin">
        </iframe>

    </div>


    <!-- ================= MENU ================= -->

    <section class="menu-container">

        <h2 class="menu-title">
            🍽️ Our Menu
        </h2>

        <?php if (!empty($menu)): ?>

            <?php foreach ($menu as $item): ?>

                <div class="menu-item">

                    <div class="food-info">

                        <h3>
                            <?php echo htmlspecialchars($item['name']); ?>
                        </h3>

                        <p>
                            <?php echo htmlspecialchars($item['description']); ?>
                        </p>

                    </div>

                    <div class="price">
                        Rs. <?php echo $item['price']; ?>
                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <p style="text-align:center; color:#777; padding:20px;">
                Menu not available.
            </p>

        <?php endif; ?>

    </section>


    <!-- ================= BACK BUTTON ================= -->

    <a href="restaurants.php" class="back-button">
        ← Back to Restaurants
    </a>

</body>

</html>