<?php

include "include/config.php";
session_start();

$session_id = $_SESSION['admin_id'];
if (!isset($_SESSION['admin_id']) || (trim($_SESSION['admin_id']) == '')) {
    echo '<script>alert("Login or register to enter!")</script>';
    header('refresh:0.1;url=admin_login.php');
    exit();
}

$query = mysqli_query($conn, "SELECT * FROM `admin_table` WHERE id = $session_id");
$row = mysqli_fetch_assoc($query);

//Update Profile
if (isset($_POST['submit'])) {

    //Update Personal Information
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    $update_desc = mysqli_real_escape_string($conn, $_POST['update_description']);
    //Update Password
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['update_password']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['update_cpassword']));

    if ($new_pass != $confirm_pass) {
        $message = 'Pasword not matched! Please try again..';
    } else {

        mysqli_query($conn, "UPDATE `admin_table` SET name='$update_name', address='$update_address', email='$update_email', password='$new_pass', description='$update_desc' WHERE admin_table.id='$session_id'")
            or die('query failed');
        $message = 'Profile Updated Successfully!';
        header('refresh:2;url=profile.php');

        //Update Profile Picture
        $update_image = $_FILES['update_image']['name'];
        $update_image_size = $_FILES['update_image']['size'];
        $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
        $update_image_folder = '../img/uploaded_img/' . $update_image;

        if (!empty($update_image)) {
            if ($update_image_size > 2000000) {

                $message = 'File size is too large! Please try again..';
            } else {
                $image_update_query = mysqli_query($conn, "UPDATE `admin_table` SET dp_img = '$update_image' WHERE admin_table.id = '$session_id'") or die('query failed');
                if ($image_update_query) {
                    move_uploaded_file($update_image_tmp_name, $update_image_folder);
                }
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Profile</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Charts CDN -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="">
    <div class="wrapper ">

        <?php include 'include/sidebar.php'; ?>

        <div class="main-panel">

            <!-- Navbar -->
            <?php include 'include/navbar.php'; ?>
            <!-- End Navbar -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-icon card-header-rose mb-3">
                                    <div class="card-icon">
                                        <i class="material-icons">perm_identity</i>
                                    </div>
                                    <h4 class="card-title">Edit Profile
                                    </h4>
                                </div>
                                <div class="card-body p-4">
                                    <form method="POST" action="#" enctype="multipart/form-data">
                                        <div class="row my-2">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Full Name</label>
                                                    <input type="text" class="form-control" name="update_name" value="<?php echo $row['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Email address</label>
                                                    <input type="email" class="form-control" name="update_email" value="<?php echo $row['email'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Username</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['username'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Address</label>
                                                    <input type="text" class="form-control" name="update_address" value="<?php echo $row['address'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Password</label>
                                                    <input type="password" class="form-control" name="update_password" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Confirm Password</label>
                                                    <input type="password" class="form-control" name="update_cpassword" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <h4 class="title">Avatar</h4>
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div>
                                                        <span class="btn btn-round btn-rose btn-file">
                                                            <span class="fileinput-new">Add Photo</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" />
                                                        </span>
                                                        <br />
                                                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Something about myself..</label>
                                                        <textarea class="form-control" name="update_description" rows="5"><?php echo $row['description']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button name="submit" class="btn btn-primary">Save Profile</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
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


                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#">
                                        <?php
                                        if ($row['dp_img'] == '') {
                                            echo '<img class="img-fluid rounded-circle" src="../img/avatar/default-avatar.png">';
                                        } else {
                                            echo '<img class="img-fluid rounded-circle" src="../img/uploaded_img/' . $row['dp_img'] . '">';
                                        }
                                        ?>
                                    </a>

                                </div>
                                <div class="card-body">
                                    <h6 class="card-category text-gray"><?php echo $row['role'] ?></h6>
                                    <h4 class="card-title"><?php echo $row['name'] ?></h4>
                                    <p class="card-description"><?php echo $row['description'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="../assets/js/plugins/moment.min.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="../assets/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="../assets/js/plugins/fullcalendar.min.js"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="../assets/js/plugins/arrive.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Chartist JS -->
    <script src="../assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <!-- Sharrre libray -->
    <script src="../assets/demo/jquery.sharrre.js"></script>
    <script src="https://kit.fontawesome.com/2895031f15.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

            md.initVectorMap();

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });

            var table = $('#datatable').DataTable();
        });
    </script>


    <script>
        // Add this script block to the bottom of your HTML, before the closing </body> tag
        function confirmation(ev) {
            ev.preventDefault();
            var urlToDirect = ev.currentTarget.getAttribute('href');

            console.log(urlToDirect);

            Swal.fire({
                title: 'Delete User',
                text: 'Are you sure you want to delete this user?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                showCancelButton: true,
                confirmButtonText: "Yes, delete it",
                cancelButtonText: "Cancel",
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete.value) {
                    window.location.href = urlToDirect;
                }
            });
        }
    </script>




</body>

</html>