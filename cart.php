<?php

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['remove'])) {

    $remove = intval($_GET['remove']);

    if (isset($_SESSION['cart'][$remove])) {
        unset($_SESSION['cart'][$remove]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }

    header("Location: cart.php");
    exit();

}

if (isset($_GET['clear'])) {

    $_SESSION['cart'] = [];

    header("Location: cart.php");
    exit();

}

$total = 0;

foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cart | FoodieHub</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #fff3e0, #ffe0b2);
            color: #333;
        }

        .navbar {
            background: #e65100;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 28px;
            font-weight: bold;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 45px auto;
        }

        h1 {
            text-align: center;
            color: #e65100;
            margin-bottom: 30px;
        }

        .cart-item {
            background: white;
            padding: 22px;
            margin-bottom: 15px;
            border-radius: 18px;
            border: 2px solid #ff9800;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .food-name {
            font-size: 19px;
            font-weight: bold;
            color: #333;
        }

        .restaurant-name {
            color: #f57c00;
            margin-top: 5px;
        }

        .quantity {
            color: #666;
            margin-top: 5px;
        }

        .item-price {
            color: #e65100;
            font-weight: bold;
            margin-top: 5px;
        }

        .remove {
            color: #c62828;
            text-decoration: none;
            font-weight: bold;
        }

        .total-box {
            background: white;
            margin-top: 25px;
            padding: 25px;
            border-radius: 20px;
            border: 3px solid #ff9800;
            text-align: center;
        }

        .total {
            font-size: 25px;
            font-weight: bold;
            color: #e65100;
            margin-bottom: 20px;
        }

        .checkout {
            display: inline-block;
            background: #e65100;
            color: white;
            padding: 13px 28px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
        }

        .clear {
            display: inline-block;
            margin-left: 10px;
            background: #ffebee;
            color: #c62828;
            padding: 13px 22px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
        }

        .empty {
            background: white;
            padding: 50px;
            text-align: center;
            border-radius: 20px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.12);
        }

        .empty p {
            color: #777;
            margin: 15px 0;
        }

        .empty a {
            display: inline-block;
            background: #e65100;
            color: white;
            padding: 12px 22px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
        }

        @media (max-width: 600px) {

            .cart-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

        }

    </style>

</head>

<body>

    <nav class="navbar">

        <div class="logo">
            🍴 FoodieHub
        </div>

        <a href="index.php">
            Home
        </a>

    </nav>

    <div class="container">

        <h1>
            🛒 Your Cart
        </h1>

        <?php if (empty($_SESSION['cart'])): ?>

            <div class="empty">

                <h2>
                    Your Cart is Empty
                </h2>

                <p>
                    Add delicious food from our restaurants.
                </p>

                <a href="restaurants.php">
                    Browse Restaurants
                </a>

            </div>

        <?php else: ?>

            <?php foreach ($_SESSION['cart'] as $index => $item): ?>

                <div class="cart-item">

                    <div>

                        <div class="food-name">
                            <?php echo htmlspecialchars($item['food']); ?>
                        </div>

                        <div class="restaurant-name">
                            <?php echo htmlspecialchars($item['restaurant_name']); ?>
                        </div>

                        <div class="quantity">
                            Quantity:
                            <?php echo $item['quantity']; ?>
                        </div>

                        <div class="item-price">
                            Rs.
                            <?php echo number_format($item['price'] * $item['quantity'], 2); ?>
                        </div>

                    </div>

                    <a
                        href="cart.php?remove=<?php echo $index; ?>"
                        class="remove"
                    >
                        Remove
                    </a>

                </div>

            <?php endforeach; ?>

            <div class="total-box">

                <div class="total">
                    Total: Rs. <?php echo number_format($total, 2); ?>
                </div>

                <a
                    href="order.php"
                    class="checkout"
                >
                    Proceed to Order
                </a>

                <a
                    href="cart.php?clear=1"
                    class="clear"
                >
                    Clear Cart
                </a>

            </div>

        <?php endif; ?>

    </div>

</body>

</html>