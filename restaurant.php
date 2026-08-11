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


$menus = [

    1 => [
        [
            "name" => "Chicken Momo",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGPLOQDZ1HQtjZSzVSK1gKRRbjgc-EdxejHjrcQl6Cuw&s=10",
            "price" => 220,
            "description" => "Steamed chicken momos served with spicy chutney."
        ],
        [
            "name" => "Chicken Sekuwa",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR88DGySpJUXUlj8PfTFZ8SGFx4Sav9LxPgb9CmayUZSw&s=10",
            "price" => 350,
            "description" => "Traditional Nepali grilled chicken with spices."
        ],
        [
            "name" => "Thakali Khana Set",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLzXtRG-GR5xWmMbTOW7npu-bl6VyAtU-ovvIS1om5lNxJ6eH_Qx1ngC-z&s=10",
            "price" => 450,
            "description" => "Rice, dal, vegetables, pickle and chicken."
        ],
        [
            "name" => "Chow Mein",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZPM2C5TbgBiK3qhK6w6oUCnsjSmEOJXfT4aBu7ZbpGpBm_jaNrFo-jm0&s=10",
            "price" => 250,
            "description" => "Stir-fried noodles with vegetables and chicken."
        ],
        [
            "name" => "Mango Lassi",
            "image" => "https://biancazapatka.com/wp-content/uploads/2020/09/mango-lassi-smoothie.jpg",
            "price" => 150,
            "description" => "Refreshing creamy mango yogurt drink."
        ]
    ],

    2 => [
        [
            "name" => "Urban Chicken Burger",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdnTB8rej_siTDaML4Oppi8lJFwbK6kY8UG97v_IIhudrm1okptw-16mg&s=10",
            "price" => 320,
            "description" => "Crispy chicken burger with fresh vegetables."
        ],
        [
            "name" => "Loaded Fries",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpZ7a8Txybiw3DUhxNZp9QH5nHT8GNl9rb9Yuuauy8kV5eod_SlmWyrPY&s=10",
            "price" => 250,
            "description" => "Crispy fries topped with cheese and sauces."
        ],
        [
            "name" => "Chicken Pizza",
            "image" => "https://www.allrecipes.com/thmb/qZ7LKGV1_RYDCgYGSgfMn40nmks=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/AR-24878-bbq-chicken-pizza-beauty-4x3-39cd80585ad04941914dca4bd82eae3d.jpg",
            "price" => 450,
            "description" => "Cheesy pizza topped with seasoned chicken."
        ],
        [
            "name" => "Pasta Alfredo",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRi9LmTbPTRRGNTv94v0WBQZWJ4CUHzmFIva22pN7N4BWsu86T_xqZ6yKwb&s=10",
            "price" => 380,
            "description" => "Creamy Alfredo pasta with herbs."
        ],
        [
            "name" => "Cold Coffee",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQX9w6f8SkkIDsc1p6AxcwyCIr0rRqqRcE6tcbaOYpfsk0vVARfb16asy4&s=10",
            "price" => 180,
            "description" => "Smooth and refreshing chilled coffee."
        ]
    ],

    3 => [
        [
            "name" => "Newari Khaja Set",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCI2dn0PDvUK3YSbhJSa2jES545XcD44YDzCkNdpTpXiasCaYBlKsuZEq_&s=10",
            "price" => 350,
            "description" => "Traditional Newari platter with local specialties."
        ],
        [
            "name" => "Buff Choila",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZTqly9TmjudnbJQuQln4Rr_pa7C7q0l5Jk8NzK4fzsQP9xcJ-n8ynVmtR&s=10",
            "price" => 300,
            "description" => "Spicy grilled buff prepared in Newari style."
        ],
        [
            "name" => "Chatamari",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0dpknVwwdNccB4vMVU05eHtq-nhgcZn8q5UdBwdJ0gg&s=10",
            "price" => 220,
            "description" => "Traditional Newari rice-flour pizza."
        ],
        [
            "name" => "Yomari",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEUaTduRngV607_06rZs4qucbQMSmahld8EAMGnv2hAQ&s=10",
            "price" => 150,
            "description" => "Sweet traditional Newari dumpling."
        ],
        [
            "name" => "Masala Tea",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3sMraPzAj6gcHzT_95wLV6ygfjMaPBXFpvDZmoArGTeW-u8ayIL20t6yR&s=10",
            "price" => 80,
            "description" => "Hot Nepali tea with aromatic spices."
        ]
    ],

    4 => [
        [
            "name" => "Chicken Momo",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRE359gM7mrFUmcoC0HgdS-2cCf1jNYTwY_Qs50V-PxGQ&s=10",
            "price" => 180,
            "description" => "Juicy steamed chicken momos with chutney."
        ],
        [
            "name" => "Jhol Momo",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgSSYwhTe_L_A97IVXrJi_6gb9xJjXw_BDwqJj5g4jhz-YYGIPRQa38_A&s=10",
            "price" => 220,
            "description" => "Momos served in a flavorful spicy soup."
        ],
        [
            "name" => "Fried Momo",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUAimtYJLw3Ro-ZdduHUN-rLWEmA0LExOnk2eXPU46goUalDq1Kdt5qrI&s=10",
            "price" => 200,
            "description" => "Crispy fried momos with special sauce."
        ],
        [
            "name" => "Chilli Momo",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6H1YhX4qe0fedUIpK4U5GGFjZsCAaXBcWbIIvDoGXVw&s=10",
            "price" => 230,
            "description" => "Spicy momos tossed with vegetables and sauce."
        ],
        [
            "name" => "Veg Momo",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQD0sSMCU6xDvFYzVrFrnQ4JTsawesQr5yLcqyniZFJw&s=10",
            "price" => 160,
            "description" => "Fresh vegetable-filled steamed momos."
        ]
    ],

    5 => [
        [
            "name" => "Margherita Pizza",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKMlvNvCk8QfJIthn0Ow_2S49Zq-2y-fpPHo62ZOdHyD1qFbYTa-ZxJ9Y&s=10",
            "price" => 400,
            "description" => "Classic pizza with tomato, mozzarella and basil."
        ],
        [
            "name" => "Chicken Pizza",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNv2EHZsaI4c7BuazPrEKAkG1ljh59oUdnj6epUP9QWQ&s=10",
            "price" => 500,
            "description" => "Cheesy pizza topped with seasoned chicken."
        ],
        [
            "name" => "Pepperoni Pizza",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSK99paLqcnHp1ol8z3fXX3RQYAzJBP8OIfmKge64PKjbFnHljs_x9PT0bf&s=10",
            "price" => 550,
            "description" => "Classic pepperoni with melted cheese."
        ],
        [
            "name" => "Garlic Bread",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZR4sLkiB4PH8RV549v5SSGThsZ8h3e9B4EGauSoftS9FhU7LHarEpEJU&s=10",
            "price" => 200,
            "description" => "Freshly baked garlic bread with herbs."
        ],
        [
            "name" => "Chocolate Brownie",
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFOAAVAwijNK6d86_sGPYNcRSrvoMQj41T3DJxlksDKw&s=10",
            "price" => 180,
            "description" => "Warm chocolate brownie for dessert."
        ]
    ]

];

$maps = [

    1 => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108167.80874853964!2d85.15944659726561!3d27.716975000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e2cce54d2f%3A0xb4bb919dc16ae274!2sThamel%20House%20Restaurant!5e1!3m2!1sen!2snp!4v1786337819932!5m2!1sen!2snp',

    2 => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3381.687334845843!2d85.30877117516994!3d27.67037462712171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1955afd5b07f%3A0xe3f6bfb9f4552b6e!2sUrbanBites!5e1!3m2!1sen!2snp!4v1786338150263!5m2!1sen!2snp',

    3 => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3381.6472725036215!2d85.42379299678952!3d27.671669100000013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1b001a547161%3A0x481b67b62c33385b!2sHimalayan%20Java%20Coffee%20-%20Bhaktapur%20Durbar%20Square!5e1!3m2!1sen!2snp!4v1786338280702!5m2!1sen!2snp',

    4 => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108220.96254716991!2d85.1638661972656!3d27.663338000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19d4624f77ad%3A0xefb5b6b4b9fa982d!2sMo%20Mo%20Station!5e1!3m2!1sen!2snp!4v1786338327217!5m2!1sen!2snp',

    5 => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3382.1856544389807!2d85.3012206751693!3d27.654268527831054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1788358c4e33%3A0xca6ca6ccf55f0994!2sThe%20Pizza%20Palace!5e1!3m2!1sen!2snp!4v1786338362751!5m2!1sen!2snp'

];

$menu = $menus[$id] ?? [];
$map = $maps[$id] ?? '';

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
    background: linear-gradient(135deg,#fff3e0,#ffe0b2,#fff8e1);
    color: #333;
}

.navbar {
    background: #e65100;
    padding: 18px 8%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.20);
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

.restaurant-header {
    width: 90%;
    max-width: 1100px;
    margin: 45px auto 30px;
    padding: 35px;
    background: white;
    text-align: center;
    border-radius: 22px;
    border: 3px solid #ff9800;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
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

.restaurant-content {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto 35px;
    display: grid;
    grid-template-columns: 1.4fr 1fr;
    gap: 25px;
    align-items: start;
}

.menu-container {
    padding: 30px;
    background: #fffaf3;
    border: 3px solid #ff9800;
    border-radius: 22px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
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
    gap: 15px;
    background: white;
    padding: 15px;
    margin-bottom: 16px;
    border: 2px solid #ffb74d;
    border-left: 8px solid #ff7043;
    border-radius: 14px;
    transition: 0.3s ease;
}

.menu-item:hover {
    transform: translateX(6px);
    background: #fff3e0;
    border-color: #ff5722;
    box-shadow: 0 7px 18px rgba(255,87,34,0.25);
}

.food-image {
    width: 105px;
    height: 90px;
    object-fit: cover;
    border-radius: 12px;
    flex-shrink: 0;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.food-info {
    flex: 1;
}

.food-info h3 {
    color: #333;
    font-size: 19px;
    margin-bottom: 7px;
}

.food-info p {
    color: #777;
    font-size: 13px;
    line-height: 1.5;
}

.price {
    background: #ff5722;
    color: white;
    padding: 10px 15px;
    border-radius: 25px;
    font-size: 15px;
    font-weight: bold;
    white-space: nowrap;
}

.map-container {
    background: white;
    padding: 15px;
    border: 3px solid #ff9800;
    border-radius: 22px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    position: sticky;
    top: 20px;
}

.map-title {
    color: #e65100;
    text-align: center;
    font-size: 25px;
    margin-bottom: 15px;
}

.map-container iframe {
    width: 100%;
    height: 500px;
    border: 0;
    border-radius: 14px;
}

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

@media (max-width: 850px) {

    .restaurant-content {
        grid-template-columns: 1fr;
    }

    .map-container {
        position: static;
    }

    .map-container iframe {
        height: 400px;
    }

}

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

    .restaurant-content {
        width: 92%;
    }

    .menu-container {
        padding: 20px;
    }

    .menu-title {
        font-size: 27px;
    }

    .menu-item {
        padding: 12px;
        gap: 10px;
    }

    .food-image {
        width: 75px;
        height: 70px;
    }

    .food-info h3 {
        font-size: 15px;
    }

    .food-info p {
        font-size: 11px;
    }

    .price {
        font-size: 12px;
        padding: 7px 10px;
    }

    .map-container {
        padding: 10px;
    }

    .map-container iframe {
        height: 350px;
    }

}
.food-actions {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 10px;
}

.order-button {
    background: #e65100;
    color: white;
    padding: 9px 16px;
    border-radius: 25px;
    text-decoration: none;
    font-size: 13px;
    font-weight: bold;
    white-space: nowrap;
    transition: 0.3s;
}

.order-button:hover {
    background: #bf360c;
    transform: scale(1.05);
}

@media (max-width: 600px) {

    .food-actions {
        align-items: center;
    }

    .order-button {
        font-size: 11px;
        padding: 7px 11px;
    }

}
.food-actions {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 10px;
}

.order-button {
    display: inline-block;
    background: #e65100;
    color: white;
    padding: 10px 16px;
    border-radius: 25px;
    text-decoration: none;
    font-size: 14px;
    font-weight: bold;
    transition: 0.3s;
}

.order-button:hover {
    background: #bf360c;
    transform: scale(1.05);
}
.cc{
    background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_VzACHB3el2-ah2GBQs8L8sTaYng27CgboZ9c0DH95A&s=10');
}
.food-actions {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 10px;
}

.cart-button {
    border: none;
    background: #e65100;
    color: white;
    padding: 10px 15px;
    border-radius: 25px;
    font-weight: bold;
    cursor: pointer;
}

.cart-button:hover {
    background: #bf360c;
}

.favorite-button {
    display: block;
    width: fit-content;
    margin: 0 auto 25px;
    padding: 12px 22px;
    background: #ffebee;
    color: #c62828;
    border: 2px solid #ef9a9a;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
}

.favorite-button:hover {
    background: #ffcdd2;
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
<a href="favorites.php">
    ❤️ Favorites
</a>

<a href="cart.php">
    🛒 Cart
</a>
    </div>

</nav>
<div class="cc">
<section class="restaurant-header">

    <h1>
        <?php echo htmlspecialchars($restaurant['name']); ?>
    </h1>

    <div class="location">

        📍

        <?php echo htmlspecialchars($restaurant['location']); ?>

    </div>

    <p class="restaurant-description">

        Discover delicious food and explore
        the menu at

        <strong>
            <?php echo htmlspecialchars($restaurant['name']); ?>
        </strong>.

    </p>

</section>


<div class="restaurant-content">

    <section class="menu-container">

        <h2 class="menu-title">
            🍽️ Our Menu
        </h2>

        <?php if (!empty($menu)): ?>

            <?php foreach ($menu as $item): ?>

                <div class="menu-item">

                    <img
                        src="<?php echo htmlspecialchars($item['image']); ?>"
                        alt="<?php echo htmlspecialchars($item['name']); ?>"
                        class="food-image"
                    >

                    <div class="food-info">

                        <h3>
                            <?php echo htmlspecialchars($item['name']); ?>
                        </h3>

                        <p>
                            <?php echo htmlspecialchars($item['description']); ?>
                        </p>

                    </div>

                  <div class="food-actions">

 <div class="food-actions">
    <div class="price">
        Rs. <?php echo $item['price']; ?>
    </div>
        <form action="add_cart.php" method="POST">

        <input type="hidden" name="restaurant_id" value="<?php echo $id; ?>">

        <input type="hidden" name="restaurant_name" value="<?php echo htmlspecialchars($restaurant['name']); ?>">

        <input type="hidden" name="food" value="<?php echo htmlspecialchars($item['name']); ?>">

        <input type="hidden" name="price" value="<?php echo $item['price']; ?>">

        <button type="submit" class="cart-button">
            🛒 Add to Cart
        </button>

    </form>

    <a
        href="order.php?restaurant_id=<?php echo $id; ?>&food=<?php echo urlencode($item['name']); ?>&price=<?php echo $item['price']; ?>"
        class="order-button"
    >
        🛒 Order Now
    </a>

</div>
    
</div>


</div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <p style="text-align:center;color:#777;padding:20px;">
                Menu not available.
            </p>

        <?php endif; ?>

    </section>

    <section class="map-container">

        <h2 class="map-title">
            📍 Find Us
        </h2>

        <?php if (!empty($map)): ?>

            <iframe
                src="<?php echo htmlspecialchars($map); ?>"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="strict-origin-when-cross-origin">
            </iframe>

        <?php else: ?>

            <p style="text-align:center;color:#777;padding:20px;">
                Map not available.
            </p>

        <?php endif; ?>

    </section>

</div>

<a
    href="restaurants.php"
    class="back-button"
>
    ← Back to Restaurants
</a>
        </div>
</body>

</html>