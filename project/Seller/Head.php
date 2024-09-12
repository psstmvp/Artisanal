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
  <!-- endinject -->
  <link rel="shortcut icon" href="../A.png"> 
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="SellerHome.php"><span
            style="font-family:garmond;color:#234A6F; font-size:32px; padding-left:40px;"> ARTISANAL</span></a>
        <a class="navbar-brand brand-logo-mini" href="SellerHome.php"><img
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
              <i class="icon-bell mx-0" font-size: 23px;></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
              aria-labelledby="notificationDropdown">
              <a href="notification.php" style="text-decoration: none;"
                class="mb-0 font-weight-normal float-left dropdown-header">Notifications</a>
            </div>
          </li>

          <?php $selQry = "select * from tbl_seller where seller_id='" . $_SESSION['sid'] . "'";
          $res = $conn->query($selQry);
          if ($row = $res->fetch_assoc()) { ?>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img style="width: 42px;height: 42px;border-radius: 50%;overflow: hidden;"
                  src="../Assets/File/Seller/SellerPhoto/<?php echo $row['sell_photo']; ?>" alt="logo" />
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="../Logout.php">
                  <i class="ti-power-off text-primary"></i>
                  Logout
                </a>
                <a class="dropdown-item" href="SellerMyAccount.php">
                  My Account
                </a>
              </div>
            </li>
          <?php } ?>
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
            <a class="nav-link" href="SellerHome.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style=" padding:5px" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
              aria-controls="ui-basic">
              <i class="mdi mdi-account-check" style="font-size:20px; padding-left:5px"></i>
              <span class="menu-title" style=" padding-left:10px">My Account</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="SellerMyAccount.php">View Account</a></li>
                <li class="nav-item"> <a class="nav-link" href="sellerEditAccount.php">Edit Account</a></li>
                <li class="nav-item"> <a class="nav-link" href="sellerChangePassword.php">Change Password</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" style=" padding:5px" data-toggle="collapse" href="#form-elements" aria-expanded="false"
              aria-controls="form-elements">
              <i class="mdi mdi-cart" style="font-size:20px; padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">My Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="AddProduct.php">Add Products</a></li>
                <li class="nav-item"><a class="nav-link" href="MyProduct.php">View Products</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" style=" padding:5px" href="#tables" aria-expanded="false"
              aria-controls="tables">
              <i class="mdi mdi-file-multiple" style="font-size:20px; padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">My Posts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="AddPost.php">Add Post</a></li>
                <li class="nav-item"> <a class="nav-link" href="ViewPost.php">View Post</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="SalesByProdPie.php">Sales by product</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="ViewOrders.php" style=" padding:5px">
              <i class="mdi mdi-package-variant-closed" style="font-size:20px; padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">Manage Orders</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="SetProfile.php" style=" padding:5px">
              <i class="mdi mdi-account-circle" style="font-size:20px;padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">My profile</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="notification.php" style=" padding:5px">
              <i class="mdi mdi-bell-ring" style="font-size:20px;padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">Notifications</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="SellerFeedback.php" style=" padding:5px">
              <i class="mdi mdi-comment-processing" style="font-size:20px;padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">Send FeedBacks</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="SellerComplaint.php" style=" padding:5px">
              <i class="mdi mdi-comment-alert-outline" style="font-size:20px;padding-left:05px"></i>
              <span class="menu-title" style="padding-left:10px;">Complaints</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Aboutus.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">About us</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">