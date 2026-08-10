<?php

include 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {

        $message = "Please fill all fields.";

    } else {

        // Check whether email already exists
        $check = $conn->prepare(
            "SELECT id FROM users WHERE email = ?"
        );

        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {

            $message = "Email already registered.";

        } else {

            // Securely hash the password
            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            // Insert user into database
            $stmt = $conn->prepare(
                "INSERT INTO users (name, email, password)
                 VALUES (?, ?, ?)"
            );

            $stmt->bind_param(
                "sss",
                $name,
                $email,
                $hashed_password
            );

            if ($stmt->execute()) {

                header("Location: login.php");
                exit();

            } else {

                $message = "Registration failed.";

            }

            $stmt->close();
        }

        $check->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>FoodieHub | Register</title>

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

        .register-box {

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

        .login-link {

            text-align: center;

            margin-top: 20px;

            color: #666;
        }

        .login-link a {

            color: #e65100;

            font-weight: bold;

            text-decoration: none;
        }

    </style>

</head>

<body>

    <div class="register-box">

        <div class="logo">
            🍴 FoodieHub
        </div>

        <h2>
            Create Your Account
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
                Name
            </label>

            <input
                type="text"
                name="name"
                placeholder="Enter your name"
                required
            >


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
                Create Account
            </button>

        </form>


        <div class="login-link">

            Already have an account?

            <a href="login.php">
                Login
            </a>

        </div>

    </div>

</body>

</html>