<?php

include "include/config.php";
session_start();


$session_id = $_SESSION['admin_id'];
if (!isset($_SESSION['admin_id']) || (trim($_SESSION['admin_id']) == '')) {
  echo '<script>alert("Login or register to enter!")</script>';
  header('refresh:0.1;url=admin_login.php');
  exit();
}

$query = mysqli_query($conn, "SELECT * FROM `user_table` WHERE account_type = 'client'");
$row = mysqli_fetch_assoc($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    OAIR System
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Charts CDN -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
  <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <style>
    /* Pie charts consist of solid slices where you can use this selector to override the default style. */
    .ct-series-a .ct-slice-pie {
      /* fill of the pie slieces */
      fill: hsl(120, 40%, 60%);
      /* give your pie slices some outline or separate them visually by using the background color here */
      stroke: white;
      /* outline width */
      stroke-width: 4px;
    }

    #chartPreferences {
      width: 100%;
      /* Set the desired width, for example, 100% of its parent container */
      height: 250px;
      /* Set the desired height, for example, 300 pixels */
    }

    .custom-crop-color {
      fill: #e22e6d;
      /* Specify the color for Crop Insurance segment */
    }

    .custom-high-value-color {
      fill: #55ae59;
      /* Specify the color for High Value Crop Insurance segment */
    }

    .custom-livestock-color {
      fill: #ee504d;
      /* Specify the color for Livestock Mortality Insurance segment */
    }
  </style>

</head>

<body class="">
  <div class="wrapper ">

    <?php include 'include/sidebar.php'; ?>
    <?php include 'include/count.php'; ?>

    <div class="main-panel">

      <!-- Navbar -->
      <?php include 'include/navbar.php'; ?>
      <!-- End Navbar -->

      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="fa-solid fa-wheat-awn"></i>
                    </div>
                    <p class="card-category">Crop Insurance</p>
                    <h3 class="card-title"><?php echo $total_ci; ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Just Updated
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">agriculture</i>
                    </div>
                    <p class="card-category">High Value Crop Insurance</p>
                    <h3 class="card-title"><?php echo $total_hvci; ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Just Updated
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                      <i class="fa-solid fa-cow"></i>
                    </div>
                    <p class="card-category">Livestock Mortality Insurance</p>
                    <h3 class="card-title"><?php echo $total_lmi; ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Just Updated
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="fa fa-user"></i>
                    </div>
                    <p class="card-category">Clients</p>
                    <h3 class="card-title">+<?php echo $total_users; ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Just Updated
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-default card-header-icon">
                    <div class="card-icon">
                      <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                    <p class="card-category">Inactive Insurance</p>
                    <h3 class="card-title"><?php echo $total_inactive; ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">assignment</i>
                      <a href="insurance_list.php">View More..</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">pending_actions</i>
                    </div>
                    <p class="card-category">Pending Applications</p>
                    <h3 class="card-title"><?php echo $total_ip ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">assignment</i>
                      <a href="insurance_list.php">View More..</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <p class="card-category">Active Insurances</p>
                    <h3 class="card-title"><?php echo $total_active; ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">assignment</i>
                      <a href="insurance_list.php">View More..</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">policy</i>
                    </div>
                    <p class="card-category">Number of Applied Insurance Policy</p>
                    <h3 class="card-title"><?php echo $total_noi; ?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">assignment</i>
                      <a href="insurance_list.php">View More..</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Charts -->
        <div class="content">
          <div class="container-fluid">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="card card-chart">
                    <div class="card-header card-header-icon card-header-danger">
                      <div class="card-icon">
                        <i class="material-icons">pie_chart</i>
                      </div>
                      <h4 class="card-title">Pie Chart</h4>
                    </div>
                    <div class="card-body">
                      <div id="chartPreferences" class="ct-chart"></div>
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-md-12">
                          <h6 class="card-category">Legend</h6>
                        </div>
                        <div class="col-md-12">
                          <i class="fa fa-circle text-info"></i> Crop Insurance
                          <i class="fa fa-circle text-warning"></i> Livestock Mortality Insurance
                          <i class="fa fa-circle text-danger"></i> High Value Crop Insurance
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- User Table -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">List of Users</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr class="text-center">
                          <th>ID</th>
                          <th>Account No.</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact</th>
                          <th class="disabled-sorting text-right">Actions</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php foreach ($query as $q) { ?>
                          <tr class="text-center">
                            <th scope="row"><?php echo $q['id']; ?></th>
                            <td><?php echo $q['account_no']; ?></td>
                            <td><?php echo $q['name']; ?></td>
                            <td><?php echo $q['email']; ?></td>
                            <td><?php echo empty($q['contact_no']) ? 'N/A' : $q['contact_no']; ?></td>
                            <td class="text-right">
                              <a href="admin_view_user.php?id=<?php echo $q['id'] ?>" name="id" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                              <a href="user_list.php?delete=<?php echo $q['id']; ?>" class="btn btn-link btn-danger btn-just-icon remove" onclick="confirmation(event)"><i class="material-icons">close</i> </a>
                            </td>
                          </tr>
                        <?php } ?>
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


  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
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

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initCharts();
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

  <script>
    var totalCropInsurance = <?php echo $total_ci; ?>;
    var totalHighValueCropInsurance = <?php echo $total_hvci; ?>;
    var totalLivestockMortalityInsurance = <?php echo $total_lmi; ?>;

    var data = {
      labels: ['Crop Insurance', 'High Value Crop Insurance', 'Livestock Mortality Insurance'],
      series: [totalCropInsurance, totalHighValueCropInsurance, totalLivestockMortalityInsurance]
    };

    var options = {
      labelInterpolationFnc: function(value) {
        return value[0]
      }
    };

    var responsiveOptions = [
      ['screen and (min-width: 640px)', {
        chartPadding: 30,
        labelOffset: 100,
        labelDirection: 'explode',
        labelInterpolationFnc: function(value) {
          return value;
        }
      }],
      ['screen and (min-width: 1024px)', {
        labelOffset: 80,
        chartPadding: 20
      }]
    ];

    new Chartist.Pie('.ct-chart', data, options, responsiveOptions);

    // Apply custom colors to pie chart segments
    $('.ct-series-a .ct-slice-pie').attr('style', 'fill: #e22e6d'); // Custom color for the first segment (Crop Insurance)
    $('.ct-series-b .ct-slice-pie').attr('style', 'fill: #5eb562'); // Custom color for the second segment (High Value Crop Insurance)
    $('.ct-series-c .ct-slice-pie').attr('style', 'fill: #ee504d'); // Custom color for the third segment (Livestock Mortality Insurance)
  </script>




</body>

</html>