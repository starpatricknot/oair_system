<?php

include "include/config.php";
session_start();

$session_id = $_SESSION['admin_id'];
$admin_query = mysqli_query($conn, "SELECT * FROM `admin_table` WHERE id='$session_id'");
$admin_row = mysqli_fetch_assoc($admin_query);

if (!isset($_SESSION['admin_id']) || (trim($_SESSION['admin_id']) == '')) {
    echo '<script>alert("Login or register to enter!")</script>';
    header('refresh:0.1;url=admin_login.php');
    exit();
}

if(($admin_row['role'] != 'superadmin')){
    echo '<script>alert("You dont have permission to enter this page! Please Contact the Superadmin if you have concerns")</script>';
    header('refresh:0.1;url=dashboard.php');
    exit();
}


if (isset($_GET['delete'])) {

    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `admin_table` WHERE admin_table.id = $delete_id ") or die('query failed');

    if ($delete_query) {
        ('location:admin_list.php');
        $message[] = 'successfully removed';
    } else {
        header('location:admin_list.php');
        $message[] = 'admin deletion failed';
    };
};


if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $pw = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpw = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $select = mysqli_query($conn, "SELECT * FROM `admin_table` WHERE username = '$username' AND password = '$pw'") or die("query failed");

    if ($pw == $cpw) {
        if (mysqli_num_rows($select) > 0) {
            $message[] = 'User Already Exists';
        } else {
            $message[] = 'User Registration Complete';
            mysqli_query($conn, "INSERT INTO `admin_table` (username, email, role, address, name, password) VALUES ('$username', '$email', '$role', '$address', '$fullname', '$pw')") or die("query failed");
            header('location:admin_list.php');
        }
    } else {
        echo "<script>alert('Password Not Matched.')</script>";
    }
}


if (isset($_POST['update'])) {
    $update_id = $_POST['update_id'];
    $update_fullname = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
    $update_role = mysqli_real_escape_string($conn, $_POST['update_role']);
    $update_description = mysqli_real_escape_string($conn, $_POST['update_description']);

    $update_query = mysqli_query($conn, "UPDATE `admin_table` SET name='$update_fullname', username='$update_username', email='$update_email', address='$update_address', role='$update_role', description='$update_description' WHERE id='$update_id'") or die('Query failed: ' . mysqli_error($conn));
    $message = 'Admin Updated Successfully!';
    header('refresh:60;url=admin_list.php');
}

$query = mysqli_query($conn, "SELECT * FROM `admin_table`");
$row = mysqli_fetch_assoc($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>User List</title>

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
                <!-- User Table -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-2">
                                            <h4 class="card-title">List of Admins</h4>
                                        </div>
                                        <div class="col-md-6 text-right mt-4">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Admin +</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Role</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php foreach ($query as $q) { ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $q['id']; ?></th>
                                                        <td><?php echo $q['role']; ?></td>
                                                        <td><?php echo $q['name']; ?></td>
                                                        <td><?php echo $q['email']; ?></td>
                                                        <td class="text-right">
                                                            <button type="button" class="btn btn-link btn-info btn-just-icon mode_edit" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $q['id']; ?>"><i class="material-icons">mode_edit</i></button>
                                                            <a href="admin_list.php?delete=<?php echo $q['id']; ?>" class="btn btn-link btn-danger btn-just-icon remove" onclick="confirmation(event)"><i class="material-icons">close</i> </a>
                                                        </td>
                                                    </tr>

                                                    <!-- Modal for View/Editing Admin -->
                                                    <div class="modal fade" id="exampleModalEdit<?php echo $q['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabelEdit" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form id="RegisterValidation" action="#" method="POST">
                                                                        <div class="card ">
                                                                            <div class="card-header card-header-rose card-header-icon">
                                                                                <div class="card-icon">
                                                                                    <i class="material-icons">person</i>
                                                                                </div>
                                                                                <h4 class="card-title"><?php echo $q['role']; ?> Details</h4>
                                                                            </div>
                                                                            <div class="card-body ">
                                                                                <div class="form-group mt-4">
                                                                                    <label for="updateName" class="bmd-label-floating"> Full Name</label>
                                                                                    <input type="text" class="form-control" id="updateName" name="update_name" value="<?php echo $q['name']; ?>" required>
                                                                                    <input type="text" name="update_id" value="<?php echo $q['id']; ?>" hidden>
                                                                                </div>
                                                                                <div class="form-group mt-4">
                                                                                    <label for="updateUsername" class="bmd-label-floating"> Username</label>
                                                                                    <input type="text" class="form-control" id="updateUsername" name="update_username" value="<?php echo $q['username']; ?>" required>
                                                                                </div>
                                                                                <div class="form-group mt-4">
                                                                                    <label for="updateEmail" class="bmd-label-floating"> Email Address</label>
                                                                                    <input type="email" class="form-control" id="updateEmail" name="update_email" value="<?php echo $q['email']; ?>" required>
                                                                                </div>
                                                                                <div class="form-group mt-4">
                                                                                    <label for="updateAddress" class="bmd-label-floating"> Address</label>
                                                                                    <input type="text" class="form-control" id="updateAddress" name="update_address" value="<?php echo $q['address']; ?> " required>
                                                                                </div>
                                                                                <div class="form-group mt-4">
                                                                                    <label for="updateRole" class="bmd-label-floating"> Role</label>
                                                                                    <input type="text" class="form-control" id="updateRole" name="update_role" value="<?php echo $q['role']; ?> " required>
                                                                                </div>
                                                                                <div class="form-group mt-4">
                                                                                    <label class="bmd-label-floating">Something about myself..</label>
                                                                                    <textarea class="form-control" name="update_description" rows="5"><?php echo $q['description']; ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default mx-1" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" name="update" class="btn btn-rose">Edit</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <?php
                                                    // Use an if-else statement to display SweetAlert2 message for success or failure
                                                    if (!empty($message)) {
                                                        if (strpos($message, 'Please try again') !== false) {
                                                            echo "  <script>
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
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Registering Admin -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="RegisterValidation" action="#" method="POST">
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">mail_outline</i>
                                </div>
                                <h4 class="card-title">Register Form</h4>
                            </div>
                            <div class="card-body ">
                                <div class="form-group">
                                    <label for="exampleName" class="bmd-label-floating"> Full Name *</label>
                                    <input type="text" class="form-control" id="exampleName" name="name" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleUsername" class="bmd-label-floating"> Username *</label>
                                    <input type="text" class="form-control" id="exampleUsername" name="username" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating"> Email Address *</label>
                                    <input type="email" class="form-control" id="exampleEmail" name="email" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleAddress" class="bmd-label-floating"> Address *</label>
                                    <input type="text" class="form-control" id="exampleAddress" name="address" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleRole" class="bmd-label-floating"> Role *</label>
                                    <input type="text" class="form-control" id="exampleRole" name="role" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="examplePassword" class="bmd-label-floating"> Password *</label>
                                    <input type="password" class="form-control" id="examplePassword" required="true" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="examplePassword1" class="bmd-label-floating"> Confirm Password *</label>
                                    <input type="password" class="form-control" id="examplePassword1" required="true" equalTo="#examplePassword" name="cpassword">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default mx-1" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-rose">Submit</button>
                        </div>
                    </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                    showCancelButton: true, // Enable the "Cancel" button
                    confirmButtonText: "Yes, delete it", // Customize the confirm button text
                    cancelButtonText: "Cancel", // Set the "Cancel" button text
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete.value) { // Check the result for true (if "Yes, delete it" was clicked)
                        window.location.href = urlToDirect;
                    }
                });
        }
    </script>

    <?php
    if (isset($message)) {
        if (strpos($message[0], 'User Registration Complete') !== false) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'User Registration Complete',
                }).then(function() {
                    location.href = 'admin_list.php'; // Redirect to admin list on success
                });
              </script>";
        } elseif (strpos($message[0], 'User Already Exists') !== false) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'User Already Exists',
                });
              </script>";
        }
    }
    ?>




</body>

</html>