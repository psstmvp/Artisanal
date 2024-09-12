<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Artisanal Admin</title>
  <!-- plugins:css -->
  <script src="../Assets/JQ/jQuery.js "></script>
  <script src="../Assets/Admin/vendors/chart.js"></script>
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../Assets/Template/Admin/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../Assets/Template/Admin/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../A.png">
  <style>
    .scroll-container {
      height: 600px;
      overflow: auto;
    }

    .scroll-container::-webkit-scrollbar {
      width: 0.5em;
      /* Adjust to your preference */
    }

    .scroll-container::-webkit-scrollbar-thumb {
      background-color: transparent;
      /* Hides the thumb */
    }

    .scroll-container::-webkit-scrollbar-track {
      background-color: transparent;
      /* Hides the track */
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="AdminHome.php"><span
            style="font-family:garmond;color:#234A6F; font-size:32px; padding-left:40px;"> ARTISANAL</span></a>
        <a class="navbar-brand brand-logo-mini" href="AdminHome.php"><img
            style="width: 62px;height: 62px;border-radius: 50%;overflow: hidden;" src="../Assets/File/Admin/A.png"
            alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
              aria-labelledby="notificationDropdown">
              <a href="notification.php" style="text-decoration: none;"
                class="mb-0 font-weight-normal float-left dropdown-header">Notifications</a>
            </div>
          </li>


          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img style="width: 42px;height: 42px;border-radius: 50%;overflow: hidden;"
                src="../Assets/File/Admin/Artisanal_logo2.png" alt="logo" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="../Logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->

      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="AdminHome.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style=" padding:5px" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
              aria-controls="ui-basic">
              <i class="mdi mdi-account-check" style="font-size:20px; padding-left:5px"></i>
              <span class="menu-title" style=" padding-left:10px">Seller</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="sellerVerification.php">Verification</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" style=" padding:5px" data-toggle="collapse" href="#form-elements" aria-expanded="false"
              aria-controls="form-elements">
              <i class="mdi mdi-comment-alert" style="font-size:20px; padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">Complaints</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="ViewComplaints.php">Customers</a></li>
                <li class="nav-item"><a class="nav-link" href="ViewComplaintsSeller.php">Sellers</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" style=" padding:5px" data-toggle="collapse" href="#charts" aria-expanded="false"
              aria-controls="charts">
              <i class="mdi mdi-chart-bar" style="font-size:20px; padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="SalesBarByCat.php">Sales by category</a></li>
                <li class="nav-item"> <a class="nav-link" href="SalesSellerPie.php">Sales Per Sellers</a></li>
                <li class="nav-item"> <a class="nav-link" href="SellerFollowerBar.php">Seller Followers</a></li>
                <li class="nav-item"> <a class="nav-link" href="GeneralReport.php">General Report</a></li>


              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" style=" padding:5px" href="#tables" aria-expanded="false"
              aria-controls="tables">
              <i class="mdi mdi-database-plus" style="font-size:20px; padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">Manage Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="District.php">District</a></li>
                <li class="nav-item"> <a class="nav-link" href="City.php">City</a></li>
                <li class="nav-item"> <a class="nav-link" href="Type.php">Type</a></li>
                <li class="nav-item"> <a class="nav-link" href="Category.php">Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="Subcategory.php">Sub Category</a></li>

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="PostReportVerify.php" style=" padding:5px">
              <i class="mdi mdi-alert" style="font-size:20px; padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">Reported Posts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="notification.php" style=" padding:5px">
              <i class="mdi mdi-bell-ring" style="font-size:20px;padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">Notifications</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="ViewFeedback.php" style=" padding:5px">
              <i class="mdi mdi-comment-processing" style="font-size:20px;padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">FeedBack</span>
            </a>
          </li>

          

        </ul>
      </nav>

      <!-- partial -->
      <div class="main-panel">
        <div class="scroll-container">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <?php

                  $selad = "SELECT * from  tbl_admin where admin_id= " . $_SESSION['aid'] . "";
                  $adres = $conn->query($selad);
                  $adrow = $adres->fetch_assoc();

                  ?>
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Hello,
                      <?php echo $adrow['ad_name'] ?>
                    </h3>
                    <p> Hope you have a good day..!</p>
                  </div>
                  <?php
                  $today = new DateTime();
                  $formattedDate = $today->format("d-M-Y");
                  ?>
                  <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                      <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2"
                          aria-haspopup="true" aria-expanded="true">
                          <i class="mdi mdi-calendar"></i> Today
                          <?php echo $formattedDate; ?>
                        </button>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                  <div class="card-people mt-auto" style="padding-top: 0px;">
                    <img src="../Assets/File/Admin/hmm.avif" alt="people">
                    <div class="weather-info">
                      <div class="d-flex">
                        <div class="ml-2">
                          <h4 class="location font-weight-normal" align="right" style="color:#234A6F;font-size:32px;">
                            Artisanal</h4>
                          <h6 class="font-weight-normal" style="font-family:garmond;color:#234A6F;font-size:20px;"
                            align="right">Your destination <br> for handmade goodies</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php

              $selqry = "SELECT COUNT(*) as count FROM tbl_order where order_status=1 and order_date=curdate()";
              $orderres = $conn->query($selqry);
              $orderrow = $orderres->fetch_assoc();
              $ordercount = $orderrow['count'];
              ?>
              <div class="col-md-6 grid-margin transparent">
                <div class="row">
                  <div class="col-md-6 mb-4 stretch-card transparent ">
                    <div class="card card-tale" style="background-color:#8299B0">
                      <div class="card-body">
                        <p class="mb-4">Today’s orders</p>
                        <p class="fs-30 mb-2">
                          <?php echo $ordercount ?>
                        </p>
                      </div>
                    </div>
                  </div>
                  <?php

                  $seltot = "SELECT COUNT(*) as count FROM tbl_order where order_status=1 ";
                  $totres = $conn->query($seltot);
                  $totrow = $totres->fetch_assoc();
                  $ordertot = $totrow['count'];
                  ?>
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue" style="background-color:#2C6899">
                      <div class="card-body">
                        <p class="mb-4">Total orders</p>
                        <p class="fs-30 mb-2">
                          <?php echo $ordertot ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php

                $sellsel = "SELECT COUNT(*) as count FROM tbl_seller where sell_ver_status=1 and sell_otp_status=1 ";
                $sellres = $conn->query($sellsel);
                $sellrow = $sellres->fetch_assoc();
                $totsell = $sellrow['count'];
                ?>
                <div class="row">
                  <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue" style="background-color:#E5D1B9">
                      <div class="card-body">
                        <p class="mb-4">Number of Sellers</p>
                        <p class="fs-30 mb-2">
                          <?php echo $totsell ?>
                        </p>


                      </div>
                    </div>
                  </div>
                  <?php

                  $selcus = "SELECT COUNT(*) as count FROM tbl_customer where cus_otp_status=1 ";
                  $cusres = $conn->query($selcus);
                  $cusrow = $cusres->fetch_assoc();
                  $totcus = $cusrow['count'];
                  ?>
                  <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger" style="background-color:#B3D0DB">
                      <div class="card-body">
                        <p class="mb-4">Number of Customers</p>
                        <p class="fs-30 mb-2">
                          <?php echo $totcus ?>
                        </p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div style="text-align:right;">
                      <a style="text-align:right;text-decoration:none;" href="SalesBarByCat.php">view more</a>
                    </div>
                    <h4 class="card-title">Sales By Category -Bar chart</h4>
                    <canvas id="barChart" height="200"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 grid-margin stretch-card" style="margin-top:-100px; margin-bottom:130px;">
                <div class="card">
                  <div class="card-body" style="align-content:middle;">
                    <div style="text-align:right;">
                      <a style="text-align:right;text-decoration:none;" href="SalesSellerPie.php">view more</a>
                    </div>
                    <h4 class="card-title">Sales Per Sellers -Pie chart</h4>
                    <canvas id="pieChart"></canvas>

                  </div>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Followers of Sellers</h4>
                    <canvas id="barChart2" height="200"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-md-6 grid-margin stretch-card" style="margin-top:-100px;">
                <div class="card tale-bg">
                  <div class="card-people mt-auto" style="padding-top: 0px;">
                    <img src="../Assets/File/Admin/logo.png" alt="people">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php

        $xValues = [];
        $yValues = [];
        $sel = "select * from tbl_seller where sell_ver_status=1";
        $row = $conn->query($sel);
        while ($data = $row->fetch_assoc()) {
          $xValues[] = $data["sell_name"];
          $sel1 = "select IFNULL(sum(cart_quantity), 0) as id from tbl_cart c inner join tbl_product p on c.product_id=p.product_id where ( cart_status in (1,3,4) and seller_id = '" . $data["seller_id"] . "')";
          $row1 = $conn->query($sel1);
          while ($data1 = $row1->fetch_assoc()) {
            $yValues[] = $data1["id"];
          }
        }
        $xValuesJson = json_encode($xValues);
        $yValuesJson = json_encode($yValues);
        ?>
        <script>
          function generatePastelBrightColorPalettes(numColors) {
            const fillColors = [];
            const borderColors = [];
            const colorStep = 360 / numColors;
            for (let i = 0; i < numColors; i++) {
              const hue = Math.round(i * colorStep);

              // Generate pastel RGB values for bright colors
              const saturation = 50 + Math.random() * 30; // Adjust the saturation range
              const lightness = 65 + Math.random() * 30;  // Adjust the lightness for pastel effect

              const fillColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 0.65)`; // 0.5 alpha value for fill
              const borderColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 1)`;  // 1 alpha value for border

              fillColors.push(fillColor);
              borderColors.push(borderColor);
            }
            return { fillColors, borderColors };
          }



          $(function () {
            'use strict';

            var xValues = <?php echo $xValuesJson; ?>;
            var stringArray = <?php echo $yValuesJson; ?>;
            const yValues = stringArray.map(str => Number(str));


            // Call the function with the number of colors:
            const { fillColors, borderColors } = generatePastelBrightColorPalettes(xValues.length);

            var doughnutPieData = {
              datasets: [{
                data: yValues,
                backgroundColor: fillColors,
                borderColor: borderColors,
              }],

              // These labels appear in the legend and in the tooltips when hovering different arcs
              labels: xValues,
            };

            var doughnutPieOptions = {
              responsive: true,
              animation: {
                animateScale: true,
                animateRotate: true
              },
              tooltips: {
                callbacks: {
                  label: function (tooltipItem, data) {
                    var dataset = data.datasets[tooltipItem.datasetIndex];
                    var total = dataset.data.reduce((accumulator, value) => accumulator + value, 0);
                    var value = dataset.data[tooltipItem.index];
                    var percentage = ((value / total) * 100).toFixed(2) + "% of Total";
                    return `${data.labels[tooltipItem.index]}: ${value} (${percentage})`;
                  }
                }
              }

            };



            if ($("#pieChart").length) {
              var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
              var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: doughnutPieData,
                options: doughnutPieOptions
              });
            }

          });


        </script>


        <script>
          $(function () {
            'use strict';

            var xValues = [
              <?php
              $sel = "select * from tbl_seller where sell_ver_status=1";
              $row = $conn->query($sel);
              while ($data = $row->fetch_assoc()) {
                echo "'" . $data["sell_name"] . "',";
              }
              ?>
            ];

            var yValues = [
              <?php
              $sel = "select * from tbl_seller where sell_ver_status=1";
              $row = $conn->query($sel);
              while ($data = $row->fetch_assoc()) {
                $sel1 = "select count(*) as id from tbl_follow where seller_id = '" . $data["seller_id"] . "'";
                $row1 = $conn->query($sel1);
                while ($data1 = $row1->fetch_assoc()) {
                  echo $data1["id"] . ",";
                }
              }
              ?>
            ];

            // Call the function with the number of colors:
            const { fillColors, borderColors } = generatePastelBrightColorPalettes(xValues.length);

            var data = {
              labels: xValues,
              datasets: [{
                label: '# of followers',
                data: yValues,
                backgroundColor: fillColors,
                borderColor: borderColors,
                borderWidth: 1,
                fill: false
              }]
            };

            if ($("#barChart2").length) {
              var barChartCanvas = $("#barChart2").get(0).getContext("2d");
              var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: data,
                options: {
                  // You can configure chart options here
                }
              });
            }
          });
        </script>



        <script>
          $(function () {
            'use strict';

            var xValues = [
              <?php
              $sel = "select * from tbl_category";
              $row = $conn->query($sel);
              while ($data = $row->fetch_assoc()) {
                echo "'" . $data["category_name"] . "',";
              }
              ?>
            ];

            var yValues = [
              <?php
              $sel = "select * from tbl_category";
              $row = $conn->query($sel);
              while ($data = $row->fetch_assoc()) {
                $sel1 = "select sum(cart_quantity) as id from tbl_cart ca inner join  tbl_order b on b.order_id=ca.order_id inner join tbl_customer u on u.customer_id=b.customer_id inner join  tbl_product p on ca.product_id=p.product_id inner join tbl_subcategory su on su.subcat_id=p.subcat_id inner join tbl_category c on c.category_id=su.category_id WHERE ( cart_status in (1,3,4) and c.category_id='" . $data["category_id"] . "') ";
                $row1 = $conn->query($sel1);
                while ($data1 = $row1->fetch_assoc()) {
                  echo $data1["id"] . ",";
                }
              }
              ?>
            ];

            function generatePastelBrightColorPalettes(numColors) {
              const fillColors = [];
              const borderColors = [];
              const colorStep = 360 / numColors;
              for (let i = 0; i < numColors; i++) {
                const hue = Math.round(i * colorStep);

                // Generate pastel RGB values for bright colors
                const saturation = 50 + Math.random() * 30; // Adjust the saturation range
                const lightness = 65 + Math.random() * 30;  // Adjust the lightness for pastel effect

                const fillColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 0.65)`; // 0.5 alpha value for fill
                const borderColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 1)`;  // 1 alpha value for border

                fillColors.push(fillColor);
                borderColors.push(borderColor);
              }
              return { fillColors, borderColors };
            }

            // Call the function with the number of colors:
            const { fillColors, borderColors } = generatePastelBrightColorPalettes(xValues.length);

            var data = {
              labels: xValues,
              datasets: [{
                label: '# of Orders',
                data: yValues,
                backgroundColor: fillColors,
                borderColor: borderColors,
                borderWidth: 1,
                fill: false
              }]
            };

            if ($("#barChart").length) {
              var barChartCanvas = $("#barChart").get(0).getContext("2d");
              var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: data,
                options: {
                  // You can configure chart options here
                }
              });
            }
          });
        </script>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i
                class="mdi mdi-heart-outline" aria-hidden="true"></i> by Sinju
            </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                class="ti-heart text-danger ml-1"></i></span>
          </div>

        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../Assets/Template/Admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../Assets/Template/Admin/vendors/chart.js/Chart.min.js"></script>
  <!-- <script src="../Assets/Template/Admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../Assets/Template/Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
  <!-- <script src="../Assets/Template/Admin/js/dataTables.select.min.js"></script> -->

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../Assets/Template/Admin/js/off-canvas.js"></script>
  <script src="../Assets/Template/Admin/js/hoverable-collapse.js"></script>
  <script src="../Assets/Template/Admin/js/template.js"></script>
  <script src="../Assets/Template/Admin/js/settings.js"></script>
  <script src="../Assets/Template/Admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../Assets/Template/Admin/js/dashboard.js"></script>
  <script src="../Assets/Template/Admin/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>