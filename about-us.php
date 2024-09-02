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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
        .bg-custom-img {
            background-image: url('img/bg-img.jpg');
            background-size: cover;
        }

        .custom-bg-color {
            background: #d8e3dd;
        }

        .custom-bg-color2 {
            background: #4faa9b;
        }

        .custom-bg-color3 {
            background: #215b6c;
        }
    </style>

</head>

<body>
    <?php include 'include/header.php' ?>

    <section>
        <div class="text-light text-center text-md-start custom-bg-color" id="about"><br><br>
            <div class="container">
                <div class="d-md-flex align-item-center justify-content-between gx-3"><br>

                    <div class="container">
                        <h2 class="mt-5 fw-semibold text-dark">Are your Farm covered? <br> Crops, High Value Crops, Livestock <br> Insurance.</h2>
                        <p class="lead text-dark my-3">
                            Welcome to the Municipal Agriculture Office of San Antonio, Quezon's Online Agricultural Insurance Registry and Management System.
                            Our system revolutionizes agricultural insurance administration, making it more efficient, transparent, and accessible for local farmers. br
                            We believe in empowering farmers with timely and complete information to enhance their agricultural practices.
                        </p>
                        <a href="insurances.php" class="btn btn-primary btn-lg rounded-1">Get Started</a>
                    </div>


                    <img class="img-fluid w-50 rounded-4 d-none d-lg-block" src="img/agr3-clean.png" alt="" id="aboutimg">
                </div>
            </div>
            <br><br><br>
        </div>



        <div class="bg-custom-img"><br><br><br>
            <div class="container">

                <div class="container text-center mb-5">
                    <div class="border border-success bg-success">
                        <h1 class="text-light">Our Insurance Policies</h1>
                    </div>
                </div><br>

                <div class="row g-5">
                    <div class="col-md-4">
                        <div class="card custom-bg-color3 text-light h-100 shadow">
                            <div class="card-body">
                                <div class="h1 mb-3">
                                    <img src="img/ci2_img.png" class="img-thumbnail w-50 mx-auto d-block my-4" alt="">
                                </div>
                                <h3 class="card-title text-center mb-3">Crop Insurance</h3>
                                <h5 class="mb-3 text-center">Policy Overview</h5>
                                <ul class="my-3">
                                    <li>Crop Insurance provides coverage for farmers against financial losses caused by natural disasters, pests, and other unforeseen circumstances.</li>
                                    <li>Peace of mind for farmers, ensuring they are protected against crop damage, which could otherwise be devastating to their livelihood.</li>
                                    <li>With our Crop Insurance policy, you gain access to a network of experts who understand the complexities of agriculture and can guide you through the process of securing your livelihood. We're here to help you safeguard your crops, your income, and your peace of mind.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card custom-bg-color3 text-light h-100 shadow">
                            <div class="card-body">
                                <div class="h1 mb-3">
                                    <img src="img/hvci2_img.png" class="img-thumbnail w-50 mx-auto d-block my-4" alt="">
                                </div>
                                <h3 class="card-title text-center mb-3">High Value Crop Insurance</h3>
                                <h5 class="mb-3 text-center">Policy Overview</h5>
                                <ul class="my-3">
                                    <li>High-Value Crop Insurance is tailored for crops that have a higher market value, providing specialized coverage for high-risk situations.</li>
                                    <li>Ideal for growers of specialty crops like berries, nuts, and exotic fruits.</li>
                                    <li>With High-Value Crop Insurance, you're not just protecting your crop; you're protecting your passion and dedication. Our policies are crafted with an intimate understanding of the unique challenges high-value crop growers face, giving you the peace of mind you deserve.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card custom-bg-color3 text-light h-100 shadow">
                            <div class="card-body">
                                <div class="h1 mb-3">
                                    <img src="img/lmi2_img.png" class="img-thumbnail w-50 mx-auto d-block my-4" alt="">
                                </div>
                                <h4 class="card-title mb-3 text-center">Livestock Mortality Insurance</h4>
                                <h5 class="mb-3 text-center">Policy Overview</h5>
                                <ul class="my-3">
                                    <li>Livestock Mortality Insurance safeguards your investment in livestock by covering financial losses due to the death or injury of your animals.</li>
                                    <li>Ideal for ranchers, farmers, and livestock owners.</li>
                                    <li>With Livestock Mortality Insurance, you're ensuring that the welfare of your animals is always a top priority. We are dedicated to providing you with the financial security needed to maintain the health and quality of life for your livestock, offering not just coverage but also peace of mind.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card custom-bg-color3 text-light h-100 shadow">
                            <div class="card-body">
                                <div class="h1 mb-3"></div>
                                <h3 class="card-title mb-3 text-center">Key Benefits</h3>
                                <ul class="my-3">
                                    <li>Risk Mitigation: Crop Insurance helps farmers mitigate the risks associated with unpredictable weather conditions, ensuring they have a safety net in place.</li>
                                    <li>Yield Protection: Farmers can secure their annual yields, guaranteeing a stable income even in the face of adversity.</li>
                                    <li>Yield Guarantee: This policy ensures that farmers receive compensation if their crop yields fall below a certain threshold due to covered perils, helping to stabilize their income.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card custom-bg-color3 text-light h-100 shadow">
                            <div class="card-body">
                                <div class="h1 mb-3"></div>
                                <h3 class="card-title mb-3 text-center">Key Benefits</h3>
                                <ul class="my-3">
                                    <li>Market Value Coverage: High-Value Crop Insurance provides coverage based on the market value of your specialty crops, ensuring you can recoup your investment even if prices are high.</li>
                                    <li>Pest and Disease Protection: Protect your high-value crops from the threat of diseases and pests that can quickly devastate an entire crop.</li>
                                    <li>Peril Coverage: Our policies cover a wide range of perils, from extreme weather events to market fluctuations, providing comprehensive protection.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card custom-bg-color3 text-light h-100 shadow">
                            <div class="card-body">
                                <div class="h1 mb-3"></div>
                                <h3 class="card-title mb-3 text-center">Key Benefits</h3>
                                <ul class="my-3">
                                    <li>Accidental Death Coverage: Ensure that your livestock is covered against accidental deaths, including accidents that occur during transportation.</li>
                                    <li>Disease Coverage: Our policies can include coverage for common livestock diseases, giving you peace of mind in case of an outbreak.</li>
                                    <li>Extended Coverage: Tailor your policy to include additional coverages, such as protection against theft, humane destruction, or specified perils.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div><br><br><br>
        </div>

        <div class="custom-bg-color">
            <br><br><br><br><br><br>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>