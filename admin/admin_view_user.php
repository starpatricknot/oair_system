<?php

include "include/config.php";
include "include/logic.php";
session_start();

$session_id = $_SESSION['admin_id'];
if (!isset($_SESSION['admin_id']) || (trim($_SESSION['admin_id']) == '')) {
    echo '<script>alert("Login or register to enter!")</script>';
    header('refresh:0.1;url=admin_login.php');
    exit();
}

include "include/payment.php";


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

    <style>
        .namer {
            font-weight: 500;
        }
    </style>

</head>

<body class="">
    <div class="wrapper">
        <?php include 'include/sidebar.php'; ?>
        <div class="main-panel">
            <?php include 'include/navbar.php'; ?>
            <div class="content">
                <!-- User Information -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">Client Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <!-- Additional buttons/actions for the toolbar can be placed here -->
                                    </div>
                                    <div class="">
                                        <div class="container-fluid px-4">
                                            <div class="row">
                                                <div class="col">
                                                    <?php foreach ($query as $q) { ?>
                                                        <table class="table table-striped table-hover border">
                                                            <tr>
                                                                <td class="namer">Account Number</td>
                                                                <td><?php echo $q['account_no']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="namer">Name</td>
                                                                <td><?php echo $q['name']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="namer">Address</td>
                                                                <td><?php echo empty($q['address']) ? 'N/A' : $q['address']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="namer">Contact No.</td>
                                                                <td><?php echo empty($q['contact_no']) ? 'N/A' : $q['contact_no']; ?></td>
                                                            </tr>
                                                        </table>
                                                    <?php } ?>
                                                </div>
                                                <div class="col">
                                                    <table class="table table-striped table-hover border">
                                                        <?php if ($q['ci_form'] != NULL) { ?>
                                                            <tr>
                                                                <td class="namer">Crop Insurance Application</td>
                                                                <td>
                                                                    <button class="btn btn-primary btn-sm btn-round" data-bs-toggle="modal" data-bs-target="#ci_view_form">View Application</button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        <?php if ($q['hvci_form'] != NULL) { ?>
                                                            <tr>
                                                                <td class="namer">High Value Crop Insurance Application</td>
                                                                <td>
                                                                    <button class="btn btn-primary btn-sm btn-round" data-bs-toggle="modal" data-bs-target="#hvci_view_form">View Application</button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        <?php if ($q['lmi_form'] != NULL) { ?>
                                                            <tr>
                                                                <td class="namer">Livestock Mortality Insurance Application</td>
                                                                <td>
                                                                    <button class="btn btn-primary btn-sm btn-round" data-bs-toggle="modal" data-bs-target="#lmi_view_form">View Application</button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Insurance Information</h4>
                                </div>
                                <div class="card-body ">
                                    <ul class="nav nav-pills nav-pills-warning" role="tablist">
                                        <li class="nav-item">
                                            <?php if ($q['ci_status'] == "Approved") { ?>
                                                <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist">Crop Insurance</a>
                                            <?php } ?>
                                        </li>
                                        <li class="nav-item">
                                            <?php if ($q['hvci_status'] == "Approved") { ?>
                                                <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">High Value Crop Insurance</a>
                                            <?php } ?>
                                        </li>
                                        <li class="nav-item">
                                            <?php if ($q['lmi_status'] == "Approved") { ?>
                                                <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">Livestock Mortality Insurance</a>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                    <div class="tab-content tab-space">
                                        <?php if ($q['ci_status'] == "Approved") { ?>
                                            <div class="tab-pane active" id="link1">
                                                <div class="">
                                                    <div class="container-fluid px-4">
                                                        <div class="row">
                                                            <div class="col">
                                                                <?php foreach ($query as $q) { ?>
                                                                    <table class="table table-striped table-hover border">
                                                                        <tr>
                                                                            <td class="namer">Crop Insurance</td>
                                                                            <td><?php echo $q['ci_status']; ?></td>
                                                                            <td class="namer">Approval Date</td>
                                                                            <td><?php echo $q['ci_approval_date']; ?></td>
                                                                            <td class="namer">Status</td>
                                                                            <td><?php echo $q['ci_ps']; ?></td>
                                                                            <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editCI">edit payment</button></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="namer">Amount to be Paid</td>
                                                                            <td><?php echo empty($q['ci_tbp']) ? '₱0.00' : '₱' . number_format($q['ci_tbp']); ?></td>
                                                                            <td class="namer">Total Amount Paid</td>
                                                                            <td><?php echo empty($q['ci_ap']) ? '₱0.00' : '₱' . number_format($q['ci_ap']); ?></td>
                                                                            <td class="namer">Payment Date</td>
                                                                            <td><?php echo $q['ci_pd']; ?></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </table>
                                                                    <?php if ($q['ci_claim_application'] != NULL) { ?>
                                                                        <table class="table table-striped table-hover border mt-4">
                                                                            <tr>
                                                                                <td class="namer">Claim Status</td>
                                                                                <td><?php echo $q['ci_claim_stat']; ?></td>
                                                                                <td class="namer">Claim Application Form</td>
                                                                                <?php echo '<td><a target="_blank" href="uploaded_pdfs_claim/' . $q['ci_claim_application'] . '"> ' . $q['ci_claim_application'] . '</a>'; ?></td>
                                                                                <td class="text-center">
                                                                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#ci_view_claim">View Claim Application</button>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="namer">Amount Claimable</td>
                                                                                <td>₱<?php echo number_format($q['ci_ap']); ?></td>
                                                                                <td class="namer">Claim Application Date</td>
                                                                                <td><?php echo $q['ci_claim_date']; ?></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if ($q['hvci_status'] == "Approved") { ?>
                                            <div class="tab-pane" id="link2">
                                                <div class="">
                                                    <div class="container-fluid px-4">
                                                        <div class="row">
                                                            <div class="col">
                                                                <?php foreach ($query as $q) { ?>
                                                                    <table class="table table-striped table-hover">
                                                                        <tr>
                                                                            <td class="namer">High Value Crop Insurance</td>
                                                                            <td><?php echo $q['hvci_status']; ?></td>
                                                                            <td class="namer">Approval Date</td>
                                                                            <td><?php echo $q['hvci_approval_date']; ?></td>
                                                                            <td class="namer">Status</td>
                                                                            <td><?php echo $q['hvci_ps']; ?></td>
                                                                            <td class="text-center"><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editHVCI">edit payment</button></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="namer">Amount to be Paid</td>
                                                                            <td><?php echo empty($q['hvci_tbp']) ? '₱0.00' : '₱' . number_format($q['hvci_tbp']); ?></td>
                                                                            <td class="namer">Total Amount Paid</td>
                                                                            <td><?php echo empty($q['hvci_ap']) ? '₱0.00' : '₱' . number_format($q['hvci_ap']); ?></td>
                                                                            <td class="namer">Payment Date</td>
                                                                            <td><?php echo $q['hvci_pd']; ?></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </table>
                                                                    <?php if ($q['hvci_claim_application'] != NULL) { ?>
                                                                        <table class="table table-striped table-hover border mt-4">
                                                                            <tr>
                                                                                <td class="namer">Claim Status</td>
                                                                                <td><?php echo $q['hvci_claim_stat']; ?></td>
                                                                                <td class="namer">Claim Application Form</td>
                                                                                <?php echo '<td><a target="_blank" href="uploaded_pdfs_claim/' . $q['hvci_claim_application'] . '"> ' . $q['hvci_claim_application'] . '</a>'; ?></td>
                                                                                <td class="text-center">
                                                                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#hvci_view_claim">View Claim Application</button>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="namer">Amount Claimable</td>
                                                                                <td>₱<?php echo number_format($q['hvci_ap']); ?></td>
                                                                                <td class="namer">Claim Application Date</td>
                                                                                <td><?php echo $q['hvci_claim_date']; ?></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if ($q['lmi_status'] == "Approved") { ?>
                                            <div class="tab-pane" id="link3">
                                                <div class="">
                                                    <div class="container-fluid px-4">
                                                        <div class="row">
                                                            <div class="col">
                                                                <?php foreach ($query as $q) { ?>
                                                                    <table class="table table-striped table-hover">
                                                                        <tr>
                                                                            <td class="namer">Livestock Mortality</td>
                                                                            <td><?php echo $q['lmi_status']; ?></td>
                                                                            <td class="namer">Approval Date</td>
                                                                            <td><?php echo $q['lmi_approval_date']; ?></td>
                                                                            <td class="namer">Status</td>
                                                                            <td><?php echo $q['lmi_ps']; ?></td>
                                                                            <td class="text-center"><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editLMI">edit payment</button></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="namer">Amount to be Paid</td>
                                                                            <td><?php echo empty($q['lmi_tbp']) ? '₱0.00' : '₱' . number_format($q['lmi_tbp']); ?></td>
                                                                            <td class="namer">Total Amount Paid</td>
                                                                            <td><?php echo empty($q['lmi_ap']) ? '₱0.00' : '₱' . number_format($q['lmi_ap']); ?></td>
                                                                            <td class="namer">Payment Date</td>
                                                                            <td><?php echo $q['lmi_pd']; ?></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </table>
                                                                    <?php if ($q['lmi_claim_application'] != NULL) { ?>
                                                                        <table class="table table-striped table-hover border mt-4">
                                                                            <tr>
                                                                                <td class="namer">Claim Status</td>
                                                                                <td><?php echo $q['lmi_claim_stat']; ?></td>
                                                                                <td class="namer">Claim Application Form</td>
                                                                                <?php echo '<td><a target="_blank" href="uploaded_pdfs_claim/' . $q['lmi_claim_application'] . '"> ' . $q['lmi_claim_application'] . '</a>'; ?></td>
                                                                                <td class="text-center">
                                                                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#lmi_view_claim">View Claim Application</button>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="namer">Amount Claimable</td>
                                                                                <td>₱<?php echo number_format($q['lmi_ap']); ?></td>
                                                                                <td class="namer">Claim Application Date</td>
                                                                                <td><?php echo $q['lmi_claim_date']; ?></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include "include/modals.php"; ?>

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




</body>

</html>