<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images/logo.png" class="mr-0" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.jpg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
          </li>
       
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
   
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav user-select-none">
          
          <li class="nav-item">
            <a class="nav-link" href="./index.html">
              <i class="ti-world menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#content" aria-expanded="false" aria-controls="content">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Content</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="content">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./pages/create_a_class.html">Create a Class</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/review_classes.html">Review a Class</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/conduct_live_classes.html">Conducting Live Classes</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/categories.html">Class Categories</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/filters.html">Class Filters</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/quizzes.html">Quizz & Certificates</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/certificate_validation.html">Certificate Validation</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/meetings.html">Meetings</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/class_reviews.html">Class Reviews</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/create_custom_pages.html">Custom Pages</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/footer.html">Footer</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./pages/user_roles.html">User Roles</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/user_groups.html">User Groups</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/become_instructor.html">Become Instructor</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/organization_users.html">Organization Users</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#crm" aria-expanded="false" aria-controls="crm">
              <i class="ti-direction-alt menu-icon"></i>
              <span class="menu-title">CRM</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="crm">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./pages/notification_templates.html">Notifications</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/noticeboard.html">Noticeboard</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/class_support_messages.html">Classes Support</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/reports.html">Reports</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#marketing" aria-expanded="false" aria-controls="marketing">
              <i class="ti-pie-chart menu-icon"></i>
              <span class="menu-title">Marketing</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="marketing">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./pages/discount_code.html">Discount Codes</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#financial" aria-expanded="false" aria-controls="financial">
              <i class="ti-money menu-icon"></i>
              <span class="menu-title">Financial</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="financial">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./pages/balances_list.html">Balances List</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/payout_requests.html">Request Payout</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/payout.html">Payout Process</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/offline_payment.html">Offline Payments</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/subscribe.html">Subscribe</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/sales_list.html">Sales List</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="settings">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./pages/general_settings.html">General</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/financial_settings.html">Financial</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/payment_gateways.html">Payment Gateways</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/personalization.html">Personalization</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/seo.html">SEO Settings</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/seo.html">Security Settings</a></li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#configuration" aria-expanded="false" aria-controls="configuration">
              <i class="ti-panel menu-icon"></i>
              <span class="menu-title">Configuration</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="configuration">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./pages/smtp.html">SMTP Configuration</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/zoom.html">Zoom Integration</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/amazon_s3.html">Amazon S3</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/debugger.html">Debugger</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/file_manager.html">File Manager</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/google_sign_in.html">Google Sign-in</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/cronjobs.html">CronJobs</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#cutomization" aria-expanded="false" aria-controls="cutomization">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Cutomization</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cutomization">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./pages/language.html">Languages</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/custom_css_js.html">Custom CSS & JS</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/timezone.html">Timezone</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/colors.html">Change Colors</a></li>
                <li class="nav-item"> <a class="nav-link" href="./pages/fonts.html">Change Fonts</a></li>

              </ul>
            </div>
          </li>
        </ul>
      </nav>




      <!-- content -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome to CoursesOK Documentation</h3>
                  <h6 class="font-weight-normal mb-0 text-muted">Here we will help you to get acquainted with the different functions of the script.</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-people mt-0">
                  <img src="images/people.png" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="ti-star mr-2"></i></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-bold">CoursesOK</h4>
                        <h6 class="font-weight-normal"></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>






        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025. <a href="" target="_blank">CoursesOK Documentation</a> from <a href="" target="_blank">Webilars</a>. All rights reserved.</span>
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
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

