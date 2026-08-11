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

*{
    box-sizing:border-box;
}

body{
    margin:0;
    min-height:100vh;
    font-family:Arial,sans-serif;
    display:flex;
    justify-content:center;
    align-items:center;
    background:
    linear-gradient(rgba(0,0,0,0.78),rgba(0,0,0,0.78)),
    url("images/foodhouse.jpg") center/cover no-repeat;
    padding:20px;
}

.login-box{
    width:900px;
    min-height:520px;
    background:#111;
    border:1px solid #444;
    border-radius:20px;
    overflow:hidden;
    position:relative;
    box-shadow:0 20px 60px rgba(0,0,0,0.7);
    padding:60px 55px;
}

.login-box::before{
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:52%;
    height:100%;
    background:
    linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.45)),
    url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2GcHCAh5ATo7MHValQEZYFSFmpV9WRIMUAvi1Fe1rTfa097SwtSINHdzH&s=10") center/cover no-repeat;
}

.login-box::after{
    content:"";
    position:absolute;
    left:52%;
    top:0;
    width:1px;
    height:100%;
    background:#444;
}

.logo{
    position:absolute;
    left:35px;
    top:35px;
    z-index:3;
    color:white;
    font-size:28px;
    font-weight:bold;
}

.login-box h2{
    position:relative;
    z-index:3;
    width:40%;
    margin:185px 0 25px 57%;
    color:white;
    font-size:30px;
    line-height:1.2;
}

.login-box form{
    position:relative;
    z-index:3;
    width:40%;
    margin-left:57%;
}

label{
    display:block;
    margin:15px 0 7px;
    color:#ddd;
    font-size:13px;
    font-weight:bold;
}

input{
    width:100%;
    padding:13px 15px;
    border:1px solid #555;
    border-radius:8px;
    background:#222;
    color:white;
    font-size:14px;
    outline:none;
}

input::placeholder{
    color:#888;
}

input:focus{
    border-color:#ff5722;
    box-shadow:0 0 0 2px rgba(255,87,34,0.15);
}

button{
    width:100%;
    margin-top:23px;
    padding:13px;
    border:0;
    border-radius:8px;
    background:#ff5722;
    color:white;
    font-size:15px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#e65100;
    transform:translateY(-2px);
}

.message{
    position:relative;
    z-index:3;
    width:40%;
    margin:0 0 10px 57%;
    color:#ff6b6b;
    text-align:center;
    font-size:13px;
}

.register-link{
    position:relative;
    z-index:3;
    width:40%;
    margin:20px 0 0 57%;
    text-align:center;
    color:#888;
    font-size:13px;
}

.register-link a{
    color:#ff5722;
    font-weight:bold;
    text-decoration:none;
}

.register-link a:hover{
    color:#ff8a65;
}

@media(max-width:750px){

    body{
        padding:15px;
    }

    .login-box{
        width:100%;
        max-width:450px;
        min-height:auto;
        padding:40px 30px;
    }

    .login-box::before{
        display:none;
    }

    .login-box::after{
        display:none;
    }

    .logo{
        position:relative;
        left:auto;
        top:auto;
        text-align:center;
        margin-bottom:30px;
    }

    .login-box h2{
        width:100%;
        margin:0 0 25px;
        text-align:center;
    }

    .login-box form{
        width:100%;
        margin:0;
    }

    .message{
        width:100%;
        margin:0 0 15px;
    }

    .register-link{
        width:100%;
        margin:20px 0 0;
    }
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