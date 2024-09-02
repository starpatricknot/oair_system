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

//Update Profile
if (isset($_POST['submit'])) {

    //Update Personal Information
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_contact_no = mysqli_real_escape_string($conn, $_POST['update_contact_no']);
    $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    //Update Password
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['update_password']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['update_cpassword']));

    if ($new_pass != $confirm_pass) {

        $message = 'Pasword not matched! Please try again..';
    } else {

        mysqli_query($conn, "UPDATE `user_table` SET name='$update_name', contact_no='$update_contact_no', address='$update_address', email='$update_email', password='$new_pass' WHERE user_table.id='$session_id'")
            or die('query failed');
        $message = 'Profile Updated Successfully!';
        header('refresh:3;url=profile.php');

        //Update Profile Picture
        $update_image = $_FILES['update_image']['name'];
        $update_image_size = $_FILES['update_image']['size'];
        $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
        $update_image_folder = 'img/uploaded_img/' . $update_image;

        if (!empty($update_image)) {
            if ($update_image_size > 2000000) {

                $message = 'File size is too large! Please try again..';
            } else {
                $image_update_query = mysqli_query($conn, "UPDATE `user_table` SET avatar = '$update_image' WHERE user_table.id = '$session_id'") or die('query failed');
                if ($image_update_query) {
                    move_uploaded_file($update_image_tmp_name, $update_image_folder);
                }
            }
        }
    }
}

include 'processes/edit_application.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/profile.css">

</head>

<body class="bg-custom-color">

    <?php include 'include/header.php' ?>

    <br>
    <section class="container my-5 border bg-light rounded-4 shadow"><br>
        <!-- This script got from frontendfreecode.com -->
        <div class="tabs-verical my-5">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <div class="nav-link py-4 text-dark text-center my-3">
                            <?php
                            if ($row['avatar'] == '') {
                                echo '<img class="img-fluid w-50 rounded-circle" src="img/avatar/default-avatar.png">';
                            } else {
                                echo '<img class="img-fluid w-50 rounded-circle py-3" src="img/uploaded_img/' . $row['avatar'] . '">';
                            }
                            ?>
                            <p class="fs-5 fw-bold"><?php echo $row['name'] ?><span class="fw-normal"> <br>(client)</span></p>
                        </div>
                        <a class="nav-link active py-4" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" name="v-pills-home-tab">
                            Profile Settings
                        </a>
                        <a class="nav-link py-4" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" name="v-pills-profile-tab">
                            Application Status
                        </a>
                        <a class="nav-link py-4" id="v-pills-notification-tab" data-toggle="pill" href="#v-pills-notification" role="tab" aria-controls="v-pills-notification" aria-selected="false" name="v-pills-notification-tab">
                            Notification
                        </a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <section class="container px-4">
                                <div class="row">
                                    <div class="col-md-12 border-right">
                                        <form class="row g-3" method="POST" action="#" enctype="multipart/form-data">
                                            <div class="p-3">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="text-right">Profile Settings</h4>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-4"><label class="labels">Name</label><input type="text" class="form-control" name="update_name" value="<?php echo $row['name'] ?>"></div>
                                                    <div class="col-md-3"><label class="labels">Account Number</label><input type="text" class="form-control" name="" value="<?php echo $row['account_no'] ?>" disabled></div>
                                                    <div class="col-md-4"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="update_contact_no" value="<?php echo $row['contact_no'] ?>"></div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-11"><label class="labels">Address</label><input type="text" class="form-control" name="update_address" value="<?php echo $row['address'] ?>"></div>
                                                    <div class="col-md-11"><label class="labels">Email</label><input type="text" class="form-control" name="update_email" value="<?php echo $row['email'] ?>"></div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-5"><label class="labels">Password</label><input type="password" class="form-control" name="update_password" value=""></div>
                                                    <div class="col-md-6"><label class="labels">Confirm Password</label><input type="password" class="form-control" name="update_cpassword" value=""></div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-11"><label for="pdf_file" class="labels">Select a Profile Picture</label><input type="file" class="form-control" id="formFile" name="update_image" accept="image/jpg, image/jpeg, image/png"></div>
                                                </div>
                                                <div class="text-center mt-3">
                                                    <button name="submit" class="btn btn-primary">Save Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="container mb-5">
                                <h3>Application Status</h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Insurance Type</th>
                                            <th>Application Form</th>
                                            <th>View Insurance</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            if ($row['ci_form'] != NULL) {
                                                echo '
                                                    <td>Crop Insurance</td>
                                                    <td><a target="_blank" href="admin/uploaded_pdfs/' . $row['ci_form'] . '">CI_Form</a></td>';

                                                if ($row['ci_status'] == 'Approved') {
                                                    echo '<td><button class="btn btn-primary btn-sm btn-round" data-bs-toggle="modal" data-bs-target="#ci_view_info">View Information</button></td>';
                                                }else echo '<td>N/A</td>';

                                                echo '<td><span class="badge rounded-pill';

                                                if ($row['ci_status'] == 'Pending') {
                                                    echo ' text-bg-secondary">';
                                                } elseif ($row['ci_status'] == 'Approved') {
                                                    echo ' text-bg-success">';
                                                } elseif ($row['ci_status'] == 'Rejected') {
                                                    echo ' text-bg-danger">';
                                                }

                                                if ($row['ci_status'] == 'Pending') {
                                                    echo 'Pending' . '</span></td>';
                                                } elseif ($row['ci_status'] === 'Approved') {
                                                    echo 'Approved' . '</span></td>';
                                                } elseif ($row['ci_status'] === 'Rejected') {
                                                    echo 'Rejected' . '</span></td>';
                                                }
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <?php
                                            if ($row['hvci_form'] != NULL) {
                                                echo '
                                                <td>High Value Crop Insurance</td>
                                                <td><a target="_blank" href="admin/uploaded_pdfs/' . $row['hvci_form'] . '">HCVI_Form</a></td>';
                                                
                                                if ($row['hvci_status'] == 'Approved') {
                                                    echo '<td><button class="btn btn-primary btn-sm btn-round" data-bs-toggle="modal" data-bs-target="#hvci_view_info">View Information</button></td>';
                                                }else echo '<td>N/A</td>';

                                                echo '<td><span class="badge rounded-pill';

                                                if ($row['hvci_status'] == 'Pending') {
                                                    echo ' text-bg-secondary">';
                                                } elseif ($row['hvci_status'] == 'Approved') {
                                                    echo ' text-bg-success">';
                                                } elseif ($row['hvci_status'] == 'Rejected') {
                                                    echo ' text-bg-danger">';
                                                }

                                                if ($row['hvci_status'] == 'Pending') {
                                                    echo 'Pending' . '</span></td>';
                                                } elseif ($row['hvci_status'] === 'Approved') {
                                                    echo 'Approved' . '</span></td>';
                                                } elseif ($row['hvci_status'] === 'Rejected') {
                                                    echo 'Rejected' . '</span></td>';
                                                }
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <?php
                                            if ($row['lmi_form'] != NULL) {
                                                echo '
                                                <td>Livestock Mortality Insurance</td>
                                                <td><a target="_blank" href="admin/uploaded_pdfs/' . $row['lmi_form'] . '">LMI_Form</a></td>';

                                                if ($row['lmi_status'] == 'Approved') {
                                                    echo '<td><button class="btn btn-primary btn-sm btn-round" data-bs-toggle="modal" data-bs-target="#lmi_view_info">View Information</button></td>';
                                                }else echo '<td>N/A</td>';

                                                echo '<td><span class="badge rounded-pill';

                                                if ($row['lmi_status'] == 'Pending') {
                                                    echo ' text-bg-secondary">';
                                                } elseif ($row['lmi_status'] == 'Approved') {
                                                    echo ' text-bg-success">';
                                                } elseif ($row['lmi_status'] == 'Rejected') {
                                                    echo ' text-bg-danger">';
                                                }

                                                if ($row['lmi_status'] == 'Pending') {
                                                    echo 'Pending' . '</span></td>';
                                                } elseif ($row['lmi_status'] === 'Approved') {
                                                    echo 'Approved' . '</span></td>';
                                                } elseif ($row['lmi_status'] === 'Rejected') {
                                                    echo 'Rejected' . '</span></td>';
                                                }
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="container mt-2 mb-5">
                                <h3>Claim Status</h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Insurance Type</th>
                                            <th>Claim Form</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            if ($row['ci_claim_application'] != NULL) {
                                                echo '
                                                <td>Crop Insurance</td>
                                                <td><a target="_blank" href="admin/uploaded_pdfs_claim/' . $row['ci_claim_application'] . '">CI_Claim_Application</a></td>
                                                <td><span class="badge rounded-pill';

                                                if ($row['ci_claim_stat'] == 'Pending') {
                                                    echo ' text-bg-secondary">';
                                                } elseif ($row['ci_claim_stat'] == 'Approved') {
                                                    echo ' text-bg-success">';
                                                } elseif ($row['ci_claim_stat'] == 'Rejected') {
                                                    echo ' text-bg-danger">';
                                                }

                                                if ($row['ci_claim_stat'] == 'Pending') {
                                                    echo 'Pending' . '</span></td>';
                                                } elseif ($row['ci_claim_stat'] === 'Approved') {
                                                    echo 'Approved' . '</span></td>';
                                                } elseif ($row['ci_claim_stat'] === 'Rejected') {
                                                    echo 'Rejected' . '</span></td>';
                                                }
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <?php
                                            if ($row['hvci_claim_application'] != NULL) {
                                                echo '
                                                <td>High Value Crop Insurance</td>
                                                <td><a target="_blank" href="admin/uploaded_pdfs_claim/' . $row['hvci_claim_application'] . '">HCVI_Claim_Application</a></td>
                                                <td><span class="badge rounded-pill';

                                                if ($row['hvci_claim_stat'] == 'Pending') {
                                                    echo ' text-bg-secondary">';
                                                } elseif ($row['hvci_claim_stat'] == 'Approved') {
                                                    echo ' text-bg-success">';
                                                } elseif ($row['hvci_claim_stat'] == 'Rejected') {
                                                    echo ' text-bg-danger">';
                                                }

                                                if ($row['hvci_claim_stat'] == 'Pending') {
                                                    echo 'Pending' . '</span></td>';
                                                } elseif ($row['hvci_claim_stat'] === 'Approved') {
                                                    echo 'Approved' . '</span></td>';
                                                } elseif ($row['hvci_claim_stat'] === 'Rejected') {
                                                    echo 'Rejected' . '</span></td>';
                                                }
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <?php
                                            if ($row['lmi_claim_application'] != NULL) {
                                                echo '
                                                <td>Livestock Mortality Insurance</td>
                                                <td><a target="_blank" href="admin/uploaded_pdfs_claim/' . $row['lmi_claim_application'] . '">LMI_Claim_Application</a></td>
                                                <td><span class="badge rounded-pill';

                                                if ($row['lmi_claim_stat'] == 'Pending') {
                                                    echo ' text-bg-secondary">';
                                                } elseif ($row['lmi_claim_stat'] == 'Approved') {
                                                    echo ' text-bg-success">';
                                                } elseif ($row['lmi_claim_stat'] == 'Rejected') {
                                                    echo ' text-bg-danger">';
                                                }

                                                if ($row['lmi_claim_stat'] == 'Pending') {
                                                    echo 'Pending' . '</span></td>';
                                                } elseif ($row['lmi_claim_stat'] === 'Approved') {
                                                    echo 'Approved' . '</span></td>';
                                                } elseif ($row['lmi_claim_stat'] === 'Rejected') {
                                                    echo 'Rejected' . '</span></td>';
                                                }
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-notification-tab">
                            <div class="container mb-5">
                                <h3>Application Status</h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Insurance Type</th>
                                            <th>Rejection Comments</th>
                                            <th>Application Form</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            if ($row['ci_form'] != NULL && $row['ci_status'] == 'Rejected') {
                                                echo '
                                                <td>Crop Insurance</td>
                                                <td><button class="btn btn-primary btn-sm btn-round" data-bs-toggle="modal" data-bs-target="#ci_edit_application">View Application</button></td>
                                                <td><a target="_blank" href="admin/uploaded_pdfs/' . $row['ci_form'] . '">CI_Form</a></td>';
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <?php
                                            if ($row['hvci_form'] != NULL && $row['hvci_status'] == 'Rejected') {
                                                echo '
                                                <td>High Value Crop Insurance</td>
                                                <td><button class="btn btn-primary btn-sm btn-round" data-bs-toggle="modal" data-bs-target="#hvci_edit_application">View Application</button></td>
                                                <td><a target="_blank" href="admin/uploaded_pdfs/' . $row['hvci_form'] . '">HCVI_Form</a></td>';
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <?php
                                            if ($row['lmi_form'] != NULL && $row['lmi_status'] == 'Rejected') {
                                                echo '
                                                <td>Livestock Mortality Insurance</td>
                                                <td><button class="btn btn-primary btn-sm btn-round" data-bs-toggle="modal" data-bs-target="#lmi_edit_application">View Application</button></td>
                                                <td><a target="_blank" href="admin/uploaded_pdfs/' . $row['lmi_form'] . '">LMI_Form</a></td>';
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="container mt-2 mb-5">
                                <h3>Claim Status</h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Insurance Type</th>
                                            <th>Rejection Comments</th>
                                            <th>Application Form</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            if ($row['ci_claim_application'] != NULL && $row['ci_claim_stat'] == 'Rejected') {
                                                echo '
                                                <td>Crop Insurance</td>
                                                <td><button class="btn btn-primary btn-sm btn-round" data-bs-toggle="modal" data-bs-target="#ci_claim_edit_application">View Application</button></td>
                                                <td><a target="_blank" href="admin/uploaded_pdfs_claim/' . $row['ci_claim_application'] . '">CI_Claim_Form</a></td>';
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <?php
                                            if ($row['hvci_claim_application'] != NULL && $row['hvci_claim_stat'] == 'Rejected') {
                                                echo '
                                                <td>High Value Crop Insurance</td>
                                                <td><button class="btn btn-primary btn-sm btn-round" data-bs-toggle="modal" data-bs-target="#hvci_claim_edit_application">View Application</button></td>
                                                <td><a target="_blank" href="admin/uploaded_pdfs_claim/' . $row['hvci_claim_application'] . '">HCVI_Claim_Form</a></td>';
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <?php
                                            if ($row['lmi_claim_application'] != NULL && $row['lmi_claim_stat'] == 'Rejected') {
                                                echo '
                                                <td>Livestock Mortality Insurance</td>
                                                <td><button class="btn btn-primary btn-sm btn-round" data-bs-toggle="modal" data-bs-target="#lmi_claim_edit_application">View Application</button></td>
                                                <td><a target="_blank" href="admin/uploaded_pdfs_claim/' . $row['lmi_claim_application'] . '">LMI_Claim_Form</a></td>';
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            FooBar
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            FoofooBar
                        </div>
                    </div>
                </div>
            </div>
            <?php
            // Use an if-else statement to display SweetAlert2 message for success or failure
            if (!empty($message)) {
                if (strpos($message, 'Please try again') !== false) {
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

            <?php include "include/modals.php"; ?>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>