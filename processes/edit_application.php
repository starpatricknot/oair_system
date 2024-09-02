<?php

// Check if the form is submitted
if (isset($_POST['submit_ci'])) {

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
            $unique_filename = $row['name'] . '_edited_' . $pdf_name;
            $target_file = $target_directory . $unique_filename;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($pdf_tmp_name, $target_file) && strpos($unique_filename, "pdf") != false) {
                // Insert the file information into the database
                $insert_query = "UPDATE `user_table` SET ci_form = '$unique_filename', ci_status='$status' WHERE user_table.id = '$session_id'";
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


// Check if the form is submitted
if (isset($_POST['submit_hvci'])) {

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
            $unique_filename = $row['name'] . '_edited_' . $pdf_name;
            $target_file = $target_directory . $unique_filename;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($pdf_tmp_name, $target_file) && strpos($unique_filename, "pdf") != false) {
                // Insert the file information into the database
                $insert_query = "UPDATE `user_table` SET hvci_form = '$unique_filename', hvci_status='$status' WHERE user_table.id = '$session_id'";
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



// Check if the form is submitted
if (isset($_POST['submit_lmi'])) {

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
            $unique_filename = $row['name'] . '_edited_' . $pdf_name;
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



// Check if the form is submitted
if (isset($_POST['submit_claim_ci'])) {

    // Check if a file was uploaded
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
        $pdf_name = $_FILES['pdf_file']['name'];
        $pdf_tmp_name = $_FILES['pdf_file']['tmp_name'];
        $pdf_size = $_FILES['pdf_file']['size'];
        $status = $_POST['status'];

        // Define the target directory where you want to store PDF files
        $target_directory = 'admin/uploaded_pdfs_claim/';

        // Set a maximum file size (in bytes)
        $max_file_size = 2000000; // 2MB

        // Check if the file size is within the allowed limit
        if ($pdf_size > $max_file_size) {
            $message = 'File size is too large. Max file size is 2MB.';
        } else {
            // Generate a unique name for the PDF file to prevent overwriting
            $unique_filename = $row['name'] . '_edited_' . $pdf_name;
            $target_file = $target_directory . $unique_filename;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($pdf_tmp_name, $target_file) && strpos($unique_filename, "pdf") != false) {
                // Insert the file information into the database
                $insert_query = "UPDATE `user_table` SET ci_claim_application = '$unique_filename', ci_claim_stat='$status' WHERE user_table.id = '$session_id'";
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

// Check if the form is submitted
if (isset($_POST['submit_claim_hvci'])) {

    // Check if a file was uploaded
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
        $pdf_name = $_FILES['pdf_file']['name'];
        $pdf_tmp_name = $_FILES['pdf_file']['tmp_name'];
        $pdf_size = $_FILES['pdf_file']['size'];
        $status = $_POST['status'];

        // Define the target directory where you want to store PDF files
        $target_directory = 'admin/uploaded_pdfs_claim/';

        // Set a maximum file size (in bytes)
        $max_file_size = 2000000; // 2MB

        // Check if the file size is within the allowed limit
        if ($pdf_size > $max_file_size) {
            $message = 'File size is too large. Max file size is 2MB.';
        } else {
            // Generate a unique name for the PDF file to prevent overwriting
            $unique_filename = $row['name'] . '_edited_' . $pdf_name;
            $target_file = $target_directory . $unique_filename;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($pdf_tmp_name, $target_file) && strpos($unique_filename, "pdf") != false) {
                // Insert the file information into the database
                $insert_query = "UPDATE `user_table` SET hvci_claim_application = '$unique_filename', hvci_claim_stat='$status' WHERE user_table.id = '$session_id'";
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

// Check if the form is submitted
if (isset($_POST['submit_claim_lmi'])) {

    // Check if a file was uploaded
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
        $pdf_name = $_FILES['pdf_file']['name'];
        $pdf_tmp_name = $_FILES['pdf_file']['tmp_name'];
        $pdf_size = $_FILES['pdf_file']['size'];
        $status = $_POST['status'];

        // Define the target directory where you want to store PDF files
        $target_directory = 'admin/uploaded_pdfs_claim/';

        // Set a maximum file size (in bytes)
        $max_file_size = 2000000; // 2MB

        // Check if the file size is within the allowed limit
        if ($pdf_size > $max_file_size) {
            $message = 'File size is too large. Max file size is 2MB.';
        } else {
            // Generate a unique name for the PDF file to prevent overwriting
            $unique_filename = $row['name'] . '_edited_' . $pdf_name;
            $target_file = $target_directory . $unique_filename;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($pdf_tmp_name, $target_file) && strpos($unique_filename, "pdf") != false) {
                // Insert the file information into the database
                $insert_query = "UPDATE `user_table` SET lmi_claim_application = '$unique_filename', lmi_claim_stat='$status' WHERE user_table.id = '$session_id'";
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