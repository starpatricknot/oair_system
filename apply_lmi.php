<?php

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

// Initialize the message variable
$message = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if a file was uploaded
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
        $pdf_name = $_FILES['pdf_file']['name'];
        $pdf_tmp_name = $_FILES['pdf_file']['tmp_name'];
        $pdf_size = $_FILES['pdf_file']['size'];
        $status = $_POST['status'];

        // Define the target directory where you want to store PDF files
        $target_directory = 'admin/uploaded_pdfs/';

        // Set a maximum file size (in bytes)
        $max_file_size = 2000000; // 2MB

        // Check if the file size is within the allowed limit
        if ($pdf_size > $max_file_size) {
            $message = 'File size is too large. Max file size is 2MB.';
        } else {
            // Generate a unique name for the PDF file to prevent overwriting
            $unique_filename = $row['name'] . '_' . $pdf_name;
            $target_file = $target_directory . $unique_filename;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($pdf_tmp_name, $target_file) && strpos($unique_filename, "pdf") != false) {
                // Insert the file information into the database
                $insert_query = "UPDATE `user_table` SET lmi_form = '$unique_filename', lmi_status='$status' WHERE user_table.id = '$session_id'";
                if (mysqli_query($conn, $insert_query)) {
                    // Upload and database insertion successful
                    $message = 'PDF file uploaded and inserted into the database.';
                } else {
                    $message = 'Error! Failed to insert the PDF file into the database.';
                }
            } else {
                $message = 'Error! File upload failed, check if the file is in PDF format.';
            }
        }
    } else {
        $message = 'No file uploaded or an Error occurred.';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="bg-custom-img">

    <?php include 'include/header.php' ?>

    <section class="container mt-5">

        <h1 class="text-center text-light my-5">Livestock Mortality Insurance Application</h1>
        <?php if ($row['lmi_form'] == NULL) { ?>
            <div class="container bg-light rounded-top-5 p-4 text-dark shadow d-md-flex align-item-center justify-content-between">
                <div class="row">
                    <div class="col-md-4">
                        <h1 class="display-3 fw-semibold my-5 text-center">Instruction
                            <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Detailed Instruction
                        </button>-->
                        </h1>

                    </div>
                    <div class="col-md-7 mx-5">
                        <p class="lead">
                            To submit your application, please follow these steps:
                        <ol>
                            <li class="lead">Download the provided application form. (<a href="forms/lmi_application_form.docx" download>Livestock Mortality Insurance Form</a>) </li>
                            <li class="lead">Open the form using Microsoft Office Word.</li>
                            <li class="lead">Fill out all required fields with your information. </li>
                            <li class="lead">Once you've completed the form, save it in PDF format. </li>
                        </ol>
                        <span class="lead">"Your application is now ready for submission."</span>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>

    <section class="container my-3">
        <div class="container bg-light rouded-4 p-5 mb-5 text-dark rounded-bottom-5 shadow">
            <?php if ($row['lmi_form'] == NULL) { ?>
                <form method="POST" action="#" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="pdf_file" class="form-label">Select a PDF file</label>
                        <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept=".pdf">
                        <input type="text" value="Pending" name="status" hidden>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload PDF</button>
                </form>
            <?php } else { ?>
                <div class="text-center">
                    <h1>You have already applied for this insurance</h1>
                </div>
            <?php } ?>
            <?php
            // Use an if-else statement to display SweetAlert2 message for success or failure
            if (!empty($message)) {
                if (strpos($message, 'Error') !== false) {
                    echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: '$message',
                    });
                </script>";
                } else {
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '$message',
                    });
                </script>";
                }
            }
            ?>
        </div>

    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 p-3" id="exampleModalLabel">To save your application in PDF format, please follow these steps:</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="img//instructions/i1_copy.png" class="img" alt="">
                            </div>
                            <div class="col-md-6">
                                <img src="img//instructions/i1_copy.png" class="img" alt="">
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>