<?php
include 'db.php';
if (!isset($_GET['query']) || empty(trim($_GET['query']))) {
    header("Location: index.php");
    exit();
}
$query = trim($_GET['query']);
$sql = "SELECT * FROM restaurants
        WHERE name LIKE ?
        OR location LIKE ?
        LIMIT 1";
$stmt = $conn->prepare($sql);
$search = "%" . $query . "%";
$stmt->bind_param("ss", $search, $search);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $restaurant = $result->fetch_assoc();
    header("Location: restaurant.php?id=" . $restaurant['id']);
    exit();

} else {

    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<title>Restaurant Not Found</title>";

    echo "<style>
        body {
            font-family: Arial;
            text-align: center;
            padding-top: 100px;
            background: #fff8f3;
        }

        h1 {
            color: #ff5722;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background: #ff5722;
            color: white;
            text-decoration: none;
            border-radius: 25px;
        }
      
    </style>";

    echo "</head>";
    echo "<body>";

    echo "<h1>😕 Restaurant Not Found</h1>";

    echo "<p>We couldn't find a restaurant matching <strong>"
        . htmlspecialchars($query)
        . "</strong>.</p>";

    echo '<a href="index.php">← Back to Home</a>';

    echo "</body>";
    echo "</html>";
}

?>