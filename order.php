<?php
session_start();
include 'db.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

$cart = $_SESSION['cart'];
$total = 0;

foreach ($cart as $item) {
    $price = isset($item['price']) ? (float)$item['price'] : 0;
    $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 1;
    $total += $price * $quantity;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customer_name = trim($_POST['customer_name']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    if ($customer_name == "" || $phone == "" || $address == "") {
        $message = "Please fill all fields.";
    } else {

        $stmt = $conn->prepare("INSERT INTO orders (restaurant_id, restaurant_name, food_name, price, quantity, customer_name, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Database error: " . $conn->error);
        }

        foreach ($cart as $item) {

            $restaurant_id = $item['restaurant_id'];
            $restaurant_name = $item['restaurant_name'];
            $food_name = $item['food'];
            $price = $item['price'];
            $quantity = $item['quantity'];

            $stmt->bind_param(
                "issdisss",
                $restaurant_id,
                $restaurant_name,
                $food_name,
                $price,
                $quantity,
                $customer_name,
                $phone,
                $address
            );

            $stmt->execute();
        }

        $stmt->close();

        $_SESSION['cart'] = [];

        echo "<script>alert('Order placed successfully!'); window.location='index.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Place Order | FoodieHub</title>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #fff3e0;
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

.order-box {
    width: 90%;
    max-width: 650px;
    margin: 45px auto;
    background: white;
    padding: 35px;
    border-radius: 20px;
    border: 3px solid #ff9800;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

h1 {
    text-align: center;
    color: #e65100;
    margin-bottom: 25px;
}

.cart-summary {
    background: #fff3e0;
    padding: 20px;
    border-radius: 15px;
    margin-bottom: 25px;
}

.cart-item {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid #ffcc80;
}

.food-name {
    font-weight: bold;
}

.quantity {
    color: #777;
    margin-top: 5px;
}

.item-price {
    color: #e65100;
    font-weight: bold;
}

.total {
    text-align: right;
    color: #e65100;
    font-size: 22px;
    font-weight: bold;
    margin-top: 18px;
}

label {
    display: block;
    margin: 15px 0 7px;
    font-weight: bold;
}

input,
textarea {
    width: 100%;
    padding: 13px;
    border: 2px solid #ffcc80;
    border-radius: 10px;
    font-size: 15px;
}

textarea {
    height: 100px;
    resize: vertical;
}

button {
    width: 100%;
    margin-top: 22px;
    padding: 14px;
    background: #e65100;
    color: white;
    border: none;
    border-radius: 30px;
    font-size: 17px;
    font-weight: bold;
    cursor: pointer;
}

button:hover {
    background: #bf360c;
}

.error {
    background: #ffebee;
    color: #c62828;
    padding: 12px;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
}
</style>
</head>

<body>

<div class="navbar">
    <div class="logo">🍴 FoodieHub</div>
    <a href="cart.php">🛒 Back to Cart</a>
</div>

<div class="order-box">

<h1>🛒 Complete Your Order</h1>

<?php if ($message != ""): ?>
<div class="error">
    <?php echo htmlspecialchars($message); ?>
</div>
<?php endif; ?>

<div class="cart-summary">

<?php foreach ($cart as $item): ?>

<div class="cart-item">

<div>
    <div class="food-name">
        <?php echo htmlspecialchars($item['food']); ?>
    </div>

    <div class="quantity">
        <?php echo htmlspecialchars($item['restaurant_name']); ?>
        · Quantity: <?php echo $item['quantity']; ?>
    </div>
</div>

<div class="item-price">
    Rs. <?php echo number_format($item['price'] * $item['quantity'], 2); ?>
</div>

</div>

<?php endforeach; ?>

<div class="total">
    Total: Rs. <?php echo number_format($total, 2); ?>
</div>

</div>

<form method="POST">

<label>Your Name</label>
<input type="text" name="customer_name" placeholder="Enter your name" required>

<label>Phone Number</label>
<input type="tel" name="phone" placeholder="Enter your phone number" required>

<label>Delivery Address</label>
<textarea name="address" placeholder="Enter your delivery address" required></textarea>

<button type="submit">
    🍽️ Place Order
</button>

</form>

</div>

</body>
</html>