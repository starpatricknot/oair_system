<?php
session_start();
    include "../processes/config.php";

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pw = mysqli_real_escape_string($conn, md5($_POST['pw']));

    $query = mysqli_query($conn, "SELECT * FROM `admin_table` WHERE username='$username' && password='$pw'");

    if (mysqli_num_rows($query) == 0) {
        echo '<script>alert("Incorrect ID or Password!")</script>';
        header('refresh:0.1;url=admin_login.php');
    } else {
        $row = mysqli_fetch_array($query);
        $_SESSION['admin_id'] = $row['id'];
        header('location:dashboard.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign Up</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(45deg, #E3F4F4, #98EECC, #EEE2DE, #967E76);
            background-size: 400% 400%;
            animation: wavingColor 10s ease infinite;
        }

        @keyframes wavingColor {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .wrapper {
            position: relative;
            width: 450px;
            height: 650px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .form-wrapper {
            display: flex;
            align-items: center;
            width: 100%;
            height: 100%;
            transition: 1s ease-in-out;
            margin-left: 6%;
        }

        .wrapper.active .form-wrapper.sign-up {
            transform: scale(0) translate(-300px, 500px);
        }

        .wrapper .form-wrapper.Log-in {
            position: absolute;
            top: 0;
            transform: scale(0) translate(200px, 500px);
        }

        .wrapper.active .form-wrapper.Log-in {
            transform: scale(1) translate(0, 0);
        }

        h2 {
            font: 30px;
            color: #47A992;
            text-align: center;
        }

        .input-group {
            position: relative;
            margin: 30px 0;
            border-bottom: 2px solid white;
        }

        .input-group label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 16px;
            color: black;
            pointer-events: none;
        }

        .input-group input {
            width: 320px;
            height: 40px;
            font-size: 16px;
            color: black;
            padding: 0 50px;
            background: transparent;
            border: none;
            outline: none;
        }

        .input-group input:focus~label,
        .input-group input:valid~label {
            top: -5px;
        }

        .remember {
            margin: -5px 0 15px 5px;
        }

        .remember label {
            color: black;
            font-size: 14px;
        }

        .remember input {
            accent-color: black;

        }

        button {
            position: relative;
            width: 100%;
            height: 40px;
            background: #666968;
            font-size: 16px;
            color: white;
            cursor: pointer;
            border-radius: 30px;
            border: none;
            outline: none;

        }

        button:hover {
            background: #359381;
            color: black;
            transition: 0.5s;
        }

        .signUp-link {
            font-size: 14px;
            text-align: center;
            margin: 15px 0;
        }

        .signUp-link p {
            color: black;

        }

        .signUp-link p a {
            color: #47A992;
            text-decoration: none;
            font-weight: 500;
        }

        .signUp-link p a:hover {
            text-decoration: underline;
        }

        .signIn-link {
            font-size: 14px;
            text-align: center;
            margin: 15px 0;
        }

        .signIn-link p {
            color: black;

        }

        .signIn-link p a {
            color: #666968;
            text-decoration: none;
            font-weight: 500;
        }

        .signIn-link p a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .wrapper {
                width: 90%;
                max-width: 450px;
                height: auto;
            }

            .form-wrapper.sign-up {
                transform: scale(1) translate(0, 0);
            }

            .form-wrapper.Log-in {
                transform: scale(1) translate(0, 0);
            }

            .input-group input {
                width: 100%;
            }
        }
    </style>

</head>

<body class="bg-custom-img">

    <?php

    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
        }
    }

    ?>

    <div class="wrapper">

        <div class="form-wrapper sign-up" id="login">
            <form action="" method="POST">
                <h2>Admin Login</h2>

                <div class="input-group">
                    <input type="text" value="<?php if (isset($_COOKIE["user"])) {
                                                    echo $_COOKIE["user"];
                                                } ?>" name="username" required>
                    <label for="">Username</label>
                </div>

                <div class="input-group">
                    <input type="password" value="<?php if (isset($_COOKIE["password"])) {
                                                        echo $_COOKIE["password"];
                                                    } ?>" name="pw" required>
                    <label for="">Password</label>
                </div>
                <button type="submit" name="login">Sign In</button>
            </form>

        </div>
    </div>
</body>

</html>