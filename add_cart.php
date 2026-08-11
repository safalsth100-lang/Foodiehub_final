<?php

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$restaurant_id = intval($_POST['restaurant_id'] ?? 0);
$restaurant_name = $_POST['restaurant_name'] ?? '';
$food = $_POST['food'] ?? '';
$price = floatval($_POST['price'] ?? 0);

if ($restaurant_id > 0 && $food != '' && $price > 0) {

    $found = false;

    foreach ($_SESSION['cart'] as &$item) {

        if (
            $item['restaurant_id'] == $restaurant_id &&
            $item['food'] == $food
        ) {

            $item['quantity']++;
            $found = true;
            break;

        }

    }

    unset($item);

    if (!$found) {

        $_SESSION['cart'][] = [
            'restaurant_id' => $restaurant_id,
            'restaurant_name' => $restaurant_name,
            'food' => $food,
            'price' => $price,
            'quantity' => 1
        ];

    }

}

header("Location: cart.php");
exit();

?>