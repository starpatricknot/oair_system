<?php

include "processes/config.php";
session_start();

$session_id = $_SESSION['user_id'];
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    echo '<script>alert("Login or register to enter!")</script>';
    header('refresh:0.1;url=user-login.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OAIR Website</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
        .d-md-flex {
            gap: 30px;
        }

        .parallax {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 95vh;
            max-height: 95vh;
            /* Adjust this value as needed */
            overflow: hidden;
        }

        .parallax img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            transform: translate(0, 0);
            /* Reset the parallax effect */
            pointer-events: none;
        }

        #text {
            position: absolute;
            font-size: 5em;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, .2);

        }

        .parallax img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            pointer-events: none;
        }

        .sec {
            position: relative;
            background: #003329;
        }

        .custom-bg-color2 {
            background: #4faa9b;
        }
    </style>

</head>

<body>
    <?php include 'include/header.php' ?>

    <section class="parallax">
        <img src="img/hill1.png" id="hill1">
        <img src="img/hill2.png" id="hill2">
        <img src="img/hill3.png" id="hill3">
        <img src="img/hill4.png" id="hill4">
        <img src="img/hill5.png" id="hill5">
        <img src="img/tree.png" id="tree">
        <h2 id="text" class="animate__animated animate__fadeInDown">OAIR Website</h2>
        <img src="img/leaf.png" id="leaf">
        <img src="img/plant.png" id="plant">
    </section>


    <section class="sec" id="about">
        <div class="ab"></div><br>

        <div class="container-fluid">
            <div class="container mb-3 animate__animated animate__fadeInLeft animate__delay-1s">
                <div class="row">
                    <div class="col-md-3"><br>
                        <img src="img/ab2.png" class="img-fluid w-75 px-3 d-none d-lg-block" alt="logo of oair">
                    </div>
                    <div class="col-md-6"><br>
                        <h1 class="text-center my-5 fw-bold text-light">Online Agricultural Insurance Registry and Management System </h1>
                    </div>
                    <div class="col-md-3"><br>
                        <img src="img/ab1.png" class="img-fluid w-75 px-3 d-none d-lg-block" alt="logo of oair">
                    </div>
                </div>
            </div>
        </div>


        <div class="text-light text-center text-md-start animate__animated animate__fadeInLeft animate__delay-2s" id="about">
            <div class="container">
                <div class="d-md-flex align-item-center justify-content-between gx-3"><br>

                    <div class="container">
                        <br><br><p class="lead mt-5 mb-3">
                            Welcome to the Municipal Agriculture Office of San Antonio, Quezon's Online Agricultural Insurance Registry and Management System.
                            Our system revolutionizes agricultural insurance administration, making it more efficient, transparent, and accessible for local farmers. br
                            We believe in empowering farmers with timely and complete information to enhance their agricultural practices.
                            Agriculture is vital to the Philippine economy, and we aim to provide farmers with the tools and knowledge they need for success.
                            Our online platform acts as a central hub, offering valuable information on agriculture, insurance, and risk management.
                            Farmers often face various risks, such as pests, diseases, and extreme weather conditions, which can lead to significant agricultural losses,
                            impacting their livelihoods.
                        </p>
                        <a href="about-us.php" class="btn btn-primary btn-lg mb-5">Learn More About Us</a>
                    </div>

                    <img class="img-fluid w-50 rounded-4 d-none d-lg-block" src="img/agr3.jpg" alt="" id="aboutimg">
                </div>
            </div>
        </div>

        <br><br>

        <div class="container">
            <img src="img/agr1.jpg" alt="" class="img-fluid w-100 rounded-4 mx-auto d-block animate__animated animate__fadeInUp animate__delay-3s">
        </div>

        <br><br>

        <div class="text-light text-center text-md-start animate__animated animate__fadeInRight animate__delay-4s" id="about">
            <div class="container">
                <p class="lead">
                    Our system addresses these risks by offering effective risk management solutions, including agricultural insurance.
                    Using our online platform, farmers can easily register for insurance, submit required documents, and have them verified efficiently.
                    The system also calculates production input costs, assesses loss payee and total insured sums, and allows farmers to track their insurance claims online.
                    We prioritize transparency and consistency in estimating losses and reimbursements. By providing standardized techniques and processes,
                    we aim to minimize disagreements between farmers and the municipal agriculture office, fostering trust in the insurance program.
                    Real-time monitoring and evaluation are core aspects of our system. We generate reports and analytics to help the municipal agriculture
                    office assess the program's effectiveness, identify areas for improvement, and make data-driven decisions. This ensures the program remains
                    responsive to farmers' evolving needs and the agricultural sector as a whole.
                </p>
            </div>
        </div>

        <br>

        <div class="text-light text-center text-md-start animate__animated animate__fadeInLeft animate__delay-5s" id="about">
            <div class="container">
                <div class="d-md-flex align-item-center justify-content-between">

                    <img class="img-fluid my-3 w-50 rounded-4" src="img/agr4.jpg" alt="" id="aboutimg">

                    <div class="container">
                        <p class="lead mt-5">
                            Additionally, we recognize the importance of financial literacy in effective risk management. Our system includes
                            educational resources and tools to increase farmers' understanding of insurance concepts,
                            enabling them to make informed choices and engage in productive farming practices. Overall,
                            our Online Agricultural Insurance Registry and Management System aims to revolutionize the way agricultural
                            insurance is administered and managed in San Antonio, Quezon. By leveraging technology and providing a user-friendly platform, we strive to empower farmers,
                            enhance efficiency, and promote sustainable agricultural practices. Together, let's build a resilient and prosperous agricultural sector for the future.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <br><br><br><br><br><br><br><br><br>

    </section>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>