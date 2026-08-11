<?php

session_start();

$admin_password = "foodie123";

if (!isset($_SESSION['admin_logged_in'])) {

    if (
        isset($_POST['admin_password']) &&
        $_POST['admin_password'] === $admin_password
    ) {

        $_SESSION['admin_logged_in'] = true;

    } else {

?>

<!DOCTYPE html>
<html>

<head>

<title>FoodieHub Admin Login</title>

<style>

body {
    font-family: Arial;
    background: #fff3e0;
}

.login-box {
    width: 350px;
    margin: 120px auto;
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,.15);
    text-align: center;
}

h1 {
    color: #e65100;
}

input {
    width: 100%;
    padding: 12px;
    margin: 20px 0;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 12px;
    background: #e65100;
    color: white;
    border: none;
    border-radius: 25px;
    cursor: pointer;
}

</style>

</head>

<body>

<div class="login-box">

<h1>
🔐 Admin
</h1>

<form method="POST">

<input
    type="password"
    name="admin_password"
    placeholder="Admin password"
    required
>

<button type="submit">
Login
</button>

</form>

</div>

</body>

</html>

<?php

        exit();

    }
}

include 'db.php';

$sql = "
    SELECT *
    FROM orders
    ORDER BY created_at DESC
";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FoodieHub Orders</title>

<style>

body {
    font-family: Arial;
    background: #fff3e0;
    margin: 0;
}

header {
    background: #e65100;
    color: white;
    padding: 22px 8%;
    display: flex;
    justify-content: space-between;
}

.container {
    width: 92%;
    max-width: 1200px;
    margin: 35px auto;
}

h1 {
    color: #e65100;
}

.order {
    background: white;
    padding: 25px;
    margin-bottom: 20px;
    border-radius: 18px;
    border-left: 7px solid #ff5722;
    box-shadow: 0 5px 18px rgba(0,0,0,.1);
}

.order h2 {
    color: #e65100;
}

.order p {
    line-height: 1.6;
}

.pending {
    color: #e65100;
    font-weight: bold;
}

</style>

</head>

<body>

<header>

<strong>
🍴 FoodieHub
</strong>

<span>
🔔 Order Dashboard
</span>

</header>

<div class="container">

<h1>
📦 Customer Orders
</h1>

<?php if ($result->num_rows > 0): ?>

<?php while ($order = $result->fetch_assoc()): ?>

<div class="order">

<h2>
🔔 New Order #<?php echo $order['id']; ?>
</h2>

<p>
<strong>Restaurant:</strong>
<?php echo htmlspecialchars($order['restaurant_name']); ?>
</p>

<p>
<strong>Food:</strong>
<?php echo htmlspecialchars($order['food_name']); ?>
</p>

<p>
<strong>Quantity:</strong>
<?php echo $order['quantity']; ?>
</p>

<p>
<strong>Total:</strong>
Rs.
<?php echo number_format(
    $order['price'] * $order['quantity'],
    2
); ?>
</p>

<p>
<strong>Customer:</strong>
<?php echo htmlspecialchars($order['customer_name']); ?>
</p>

<p>
<strong>Phone:</strong>
<?php echo htmlspecialchars($order['phone']); ?>
</p>

<p>
<strong>Address:</strong>
<?php echo htmlspecialchars($order['address']); ?>
</p>

<p>
<strong>Status:</strong>

<span class="pending">
<?php echo htmlspecialchars($order['status']); ?>
</span>

</p>

<p>
<strong>Ordered:</strong>
<?php echo $order['created_at']; ?>
</p>

</div>

<?php endwhile; ?>

<?php else: ?>

<div class="order">

<h2>
No orders yet 📭
</h2>

<p>
Customer orders will appear here.
</p>

</div>

<?php endif; ?>

</div>

</body>

</html>