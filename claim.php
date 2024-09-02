<?php

#error_reporting(0);

include "processes/config.php";
session_start();

$session_id = $_SESSION['user_id'];
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    echo '<script>alert("Login or register to enter!")</script>';
    header('refresh:0.1;url=user-login.php');
    exit();
}

$query = mysqli_query($conn, "SELECT * FROM `user_table` WHERE id='$session_id'");
$row = mysqli_fetch_assoc($query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="bg-custom-img">

    <?php include 'include/header.php' ?>

    <section class="container my-5">
        <div class="container">
            <h3 class="card-title text-center display-4 p-3 fw-semibold hidden text-light" id="recomm">Claim Insurance</h3>
            <div class="animate-delay row row-cols-1 row-cols-md-3 g-5 my-4">
                <?php if ($row['ci_status'] == "Approved") { ?>
                    <div class="col animate-delay hidden animate__animated animate__fadeInLeft animate__delay-1s animate__faster">
                        <div class="card p-3 h-100 rounded-4 shadow-4" id="card-based">
                            <div class="card-body">
                                <h5 class="card-title fs-3 text-center fw-normal my-4">Claim Crop <br> Insurance</h5>
                                <img src="img/ci_img.png" class="card-img-top w-50 mx-auto d-block" alt="Crop Insurance Image"><br>

                                <ul class="info">
                                    <li>
                                        <i class="bi bi-check-lg"></i> Comprehensive coverage for agricultural investments.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-lg"></i> Protection against crop damage or yield reductions.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-lg"></i> Safeguard your harvest from unpredictable weather and pests.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-lg"></i> Mitigate financial risk from natural disasters, such as droughts and floods.
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="claim_ci.php" class="btn btn-outline-primary getstarted rounded-4 my-3">Claim</a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } elseif ($row['ci_claim_stat'] == "Pending") { ?>
                    <div class="col animate-delay hidden animate__animated animate__fadeInLeft animate__delay-1s animate__faster">
                        <div class="card p-3 h-100 rounded-4 shadow-4" id="card-based">
                            <div class="card-body">
                                <h5 class="card-title fs-3 text-center fw-normal my-4">Claim Crop <br> Insurance</h5>
                                <img src="img/ci_img.png" class="card-img-top w-50 mx-auto d-block" alt="Crop Insurance Image"><br>
                                <h5 class="text-center my-5">Claim Application Pending</h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($row['hvci_status'] == "Approved") { ?>
                    <div class="col animate-delay hidden animate__animated animate__fadeInLeft animate__delay-1s animate__faster">
                        <div class="card p-3 h-100 rounded-4 shadow-4" id="card-based">
                            <div class="card-body text">
                                <h5 class="card-title fs-3 text-center fw-normal my-4 based">Claim High Value Crop Insurance</h5>
                                <img src="img/hvci_img.png" class="card-img-top w-50 mx-auto d-block" alt="Crop Insurance Image"><br>

                                <ul class="info">
                                    <li>
                                        <i class="bi bi-check-lg"></i> Tailored for high-value crops like exotic fruits and specialty produce.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-lg"></i> Specialized protection for premium crops.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-lg"></i> Ensure profitability by covering unforeseen crop losses.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-lg"></i> Customizable coverage to meet the unique needs of your high-value crops.
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="claim_hvci.php" class="btn btn-outline-primary getstarted rounded-4 my-3">Claim</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } elseif ($row['hvci_claim_stat'] == "Pending") { ?>
                    <div class="col animate-delay hidden animate__animated animate__fadeInLeft animate__delay-1s animate__faster">
                        <div class="card p-3 h-100 rounded-4 shadow-4" id="card-based">
                            <div class="card-body">
                                <h5 class="card-title fs-3 text-center fw-normal my-4 based">Claim High Value Crop Insurance</h5>
                                <img src="img/hvci_img.png" class="card-img-top w-50 mx-auto d-block" alt="Crop Insurance Image"><br>
                                <h5 class="text-center my-5">Claim Application Pending</h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($row['lmi_status'] == "Approved") { ?>
                    <div class="col animate-delay hidden animate__animated animate__fadeInLeft animate__delay-1s animate__faster">
                        <div class="card p-3 h-100 rounded-4 shadow-4" id="card-based">
                            <div class="card-body">
                                <h5 class="card-title fs-3 text-center fw-normal my-4">Claim Livestock Mortality Insurance</h5>
                                <img src="img/lmi_img.png" class="card-img-top w-50 mx-auto d-block" alt="Crop Insurance Image"><br>

                                <ul class="info">
                                    <li>
                                        <i class="bi bi-check-lg"></i> Safeguard your valuable livestock assets.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-lg"></i> Coverage for animal deaths due to accidents, illnesses, and more.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-lg"></i> Coverage extends to various livestock, including horses, cattle, and poultry.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-lg"></i> Protect your business and ensure the well-being of your animals.
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="claim_lmi.php" class="btn btn-outline-primary getstarted rounded-4 my-3">Claim</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } elseif ($row['lmi_claim_stat'] == "Pending") { ?>
                    <div class="col animate-delay hidden animate__animated animate__fadeInLeft animate__delay-1s animate__faster">
                        <div class="card p-3 h-100 rounded-4 shadow-4" id="card-based">
                            <div class="card-body">
                                <h5 class="card-title fs-3 text-center fw-normal my-4">Claim Livestock Mortality Insurance</h5>

                                <img src="img/lmi_img.png" class="card-img-top w-50 mx-auto d-block" alt="Crop Insurance Image"><br>
                                <h5 class="text-center my-5">Claim Application Pending</h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <br><br><br>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>