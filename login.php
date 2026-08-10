<?php

session_start();

include 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {

        $message = "Please enter email and password.";

    } else {
       $stmt = $conn->prepare(
    "SELECT id, name, password
     FROM users
     WHERE email = ?"
);

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {

            $user = $result->fetch_assoc();

          
            if (password_verify($password, $user['password'])) {

            
               $_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

              header("Location: index.php");

                exit();

            } else {

                $message = "Incorrect password.";

            }

        } else {

            $message = "No account found with this email.";

        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>FoodieHub | Login</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {

            margin: 0;

            font-family: Arial, sans-serif;

            min-height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

            background:
                linear-gradient(
                    135deg,
                    #fff3e0,
                    #ffccbc
                );
        }

        .login-box {

            width: 400px;

            background: white;

            padding: 35px;

            border-radius: 20px;

            box-shadow:
                0 10px 30px rgba(0,0,0,0.15);
        }

        .logo {

            text-align: center;

            color: #e65100;

            font-size: 30px;

            font-weight: bold;

            margin-bottom: 10px;
        }

        h2 {

            text-align: center;

            margin-bottom: 25px;

            color: #333;
        }

        label {

            display: block;

            margin-top: 12px;

            font-weight: bold;

            color: #444;
        }

        input {

            width: 100%;

            padding: 13px;

            margin-top: 7px;

            border: 2px solid #ffcc80;

            border-radius: 10px;

            font-size: 15px;
        }

        input:focus {

            outline: none;

            border-color: #ff5722;
        }

        button {

            width: 100%;

            margin-top: 22px;

            padding: 13px;

            border: none;

            border-radius: 10px;

            background: #ff5722;

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;
        }

        button:hover {

            background: #e65100;
        }

        .message {

            text-align: center;

            color: #d32f2f;

            margin-bottom: 15px;

            font-weight: bold;
        }

        .register-link {

            text-align: center;

            margin-top: 20px;

            color: #666;
        }

        .register-link a {

            color: #e65100;

            font-weight: bold;

            text-decoration: none;
        }

    </style>

</head>

<body>

    <div class="login-box">

        <div class="logo">
            🍴 FoodieHub
        </div>

        <h2>
            Welcome Back!
        </h2>


        <?php if ($message != ""): ?>

            <div class="message">

                <?php
                echo htmlspecialchars($message);
                ?>

            </div>

        <?php endif; ?>


        <form method="POST">

            <label>
                Email
            </label>

            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                required
            >


            <label>
                Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Enter your password"
                required
            >


            <button type="submit">
                Login
            </button>

        </form>


        <div class="register-link">

            Don't have an account?

            <a href="register.php">
                Create Account
            </a>

        </div>

    </div>

</body>

</html>