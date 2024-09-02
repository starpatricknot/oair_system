<?php

session_start();
include "processes/config.php";

if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $account_no = mysqli_real_escape_string($conn, $_POST['account_no']);
    $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pw = mysqli_real_escape_string($conn, md5($_POST['pw']));
    $cpw = mysqli_real_escape_string($conn, md5($_POST['cpw']));

    $select = mysqli_query($conn, "SELECT * FROM `user_table` WHERE account_no = '$account_no' AND password = '$pw'") or die("query failed");

    if ($pw == $cpw) {
        if (mysqli_num_rows($select) > 0) {
            $message[] = '<script>alert("User Already Exists")</script>';
        } else {
            $message[] = '<script>Alert("User Registration Complete.")</script>';
            mysqli_query($conn, "INSERT INTO `user_table` (name, account_no, contact_no, address, email, password) VALUES ('$fullname', '$account_no', '$contact_no', '$address', '$email', '$pw')") or die("query failed");
            header('location:user-login.php#login');
        }
    } else {
        echo "<script>alert('Password Not Matched.')</script>";
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
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

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
            height: 700px;
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
            <form action="processes/login.php" method="POST">
                <h2>Log in</h2>
                <div class="input-group">
                    <input type="text" class="text-light" value="<?php if (isset($_COOKIE["user"])) {
                                                    echo $_COOKIE["user"];
                                                } ?>" name="account_no" required>
                    <label for="" class="text-light">Account Number</label>
                </div>
                <div class="input-group">
                    <input type="password" class="text-light" value="<?php if (isset($_COOKIE["password"])) {
                                                        echo $_COOKIE["password"];
                                                    } ?>" name="pw" required>
                    <label for="" class="text-light">Password</label>
                </div>

                <button type="submit" name="login">Sign In</button>
                <div class="signIn-link">
                    <p>Don't have an account? <a href="#" class="signInBtn-link">Sign Up</a></p>
                </div>
            </form>

        </div>

        <div class="form-wrapper Log-in">
            <form action="" method="POST">
                <h2>Sign Up</h2>
                <div class="input-group">
                    <input type="text" class="text-light" id="fullname" name="fullname" required>
                    <label for="" class="text-light">Full Name</label>
                </div>
                <div class="input-group">
                    <input type="text" class="text-light" id="account_no" name="account_no" required>
                    <label for="" class="text-light">Account Number</label>
                </div>
                <div class="input-group">
                    <input type="text" class="text-light" id="contact_no" name="contact_no" required>
                    <label for="" class="text-light">Contact Number</label>
                </div>
                <div class="input-group">
                    <input type="text" class="text-light" id="address" name="address" required>
                    <label for="" class="text-light">Address</label>
                </div>
                <div class="input-group">
                    <input type="email" class="text-light" id="email" name="email" required>
                    <label for="" class="text-light">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" class="text-light" id="pw" name="pw" required>
                    <label for="" class="text-light">Password</label>
                </div>
                <div class="input-group">
                    <input type="password" class="text-light" id="cpw" name="cpw" required>
                    <label for="" class="text-light">Confirm Password</label>
                </div>
                <button type="submit" name="submit">Sign Up</button>
                <div class="signUp-link">
                    <p>Already have an account? <a href="#" class="signUpBtn-link">Sign Up</a></p>
                </div>


            </form>
        </div>
    </div>

    <script src="assets/js/services.js"></script>
</body>

</html>