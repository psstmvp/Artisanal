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
  <!-- endinject -->
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
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" 
              data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
              aria-labelledby="notificationDropdown">
              <a href="notification.php" style="text-decoration: none;" class="mb-0 font-weight-normal float-left dropdown-header">Notifications</a>
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
      <!-- <div class="scroll-container"> -->
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
                <li class="nav-item"> <a class="nav-link" href="SalesSellerPie.php">Sales by Sellers</a></li>
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
            <a class="nav-link"  href="PostReportVerify.php" style=" padding:5px">
              <i class="mdi mdi-alert" style="font-size:20px; padding-left:05px"></i>
              <span class="menu-title"style="padding-left:10px;">Reported Posts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="notification.php" style=" padding:5px" >
              <i class="mdi mdi-bell-ring" style="font-size:20px;padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">Notifications</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link"  href="ViewFeedback.php" style=" padding:5px">
              <i class="mdi mdi-comment-processing" style="font-size:20px;padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">FeedBack</span>
            </a>
          </li>

          
        </ul>
      </nav>
      <!-- </div> -->
      <!-- partial -->
      <div class="main-panel">
     