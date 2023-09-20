<?php
session_start();
if (!isset($_SESSION['login'])) {

?>
    <script>
        alert("Login Dulu Mas");
        window.open('../login.php', '_self');
    </script>
<?php
} else {
    $status = $_SESSION['akses'];
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin TPG 2</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/logo.png" />
    <style>
      .img{
      width: 200px;
      height: 200px;
      }

      .fullsize{
        border: 11px solid green;;
        z-index: 999;
        cursor: zoom-out;
        display: block;
        width: 400px;
        max-width: 400px;
        height: 550px;
        position: fixed;
        left: 100px;
        top: 30px;
      }
      </style>
  </head>
  <body>
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.php"><svg height="30" width="250">
          <text x="15" y="20" fill="white">TPG 2 Bekasi</text>
    </svg></a>
        <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo.png" alt="logo" /></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <a>
                <img onclick="change(this)" id="img1" class="img-xs rounded-circle " src="https://media.tenor.com/YcRyor1O4bMAAAAC/stelle-honkai-star-rail-stelle.gif" alt="">
                <span class="count bg-success"></span>
                </a>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">Javier Arkanauf</h5>
                <span>Online</span>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-settings text-primary"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-onepassword  text-info"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-calendar-today text-success"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                </div>
              </a>
            </div>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="index.php">
            <span class="menu-icon">
              <i class="mdi mdi-home"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <?php if ($status == 'admin') { ?>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
            
              <i class="mdi mdi-binoculars"></i>
            </span>
            <span class="menu-title">Master</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="master">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="data_agama.php">Agama</a></li>
              <li class="nav-item"> <a class="nav-link" href="data_negara.php">Kewarganegaraan</a></li>
              <li class="nav-item"> <a class="nav-link" href="data_jenjang.php">Jenjang</a></li>
              <li class="nav-item"> <a class="nav-link" href="data_jurusan.php">Jurusan</a></li>
            </ul>
          </div>
        </li>
        <?php } ?>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#pendaftaran" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-note"></i>
            </span>
            <span class="menu-title">Menu Pendaftaran</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="pendaftaran">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="form_pendaftaran.php">Form Pendaftaran</a></li>
              <li class="nav-item"> <a class="nav-link" href="data_pendaftaran.php">Data Pendaftaran</a></li>
            </ul>
          </div>
        </li>
        <?php
          if ($status == 'admin') {
            ?>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#registrasi" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-note"></i>
            </span>
            <span class="menu-title">Menu Registrasi</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="registrasi">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="data_user.php">Data User</a></li>
              <li class="nav-item"> <a class="nav-link" href="form_register.php">Register Admin</a></li>
            </ul>
          </div> 
        </li>
        <?php } ?>
        <li class="nav-item menu-items">
          <a  onclick="return confirm('Yakin Ingin Log Out');" class="nav-link" href="../logout.php">
            <span class="menu-icon">
              <i class="mdi mdi-logout"></i>
            </span>
            <span class="menu-title">Log Out</span>
          </a>
        </li>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <li class="nav-item nav-category">
          <span class="nav-link">Template Examples</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="basic_elements.php">
            <span class="menu-icon">
              <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Form Elements</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="basic-table.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Tables</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="chartjs.php">
            <span class="menu-icon">
              <i class="mdi mdi-chart-bar"></i>
            </span>
            <span class="menu-title">Charts</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="mdi.php">
            <span class="menu-icon">
              <i class="mdi mdi-contacts"></i>
            </span>
            <span class="menu-title">Icons</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Basic UI Elements</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="buttons.php">Buttons</a></li>
              <li class="nav-item"> <a class="nav-link" href="dropdowns.php">Dropdowns</a></li>
              <li class="nav-item"> <a class="nav-link" href="typography.php">Typography</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <span class="menu-icon">
              <i class="mdi mdi-security"></i>
            </span>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="blank-page.php"> Blank Page </a></li>
              <li class="nav-item"> <a class="nav-link" href="error-404.php"> 404 </a></li>
              <li class="nav-item"> <a class="nav-link" href="error-500.php"> 500 </a></li>
              <li class="nav-item"> <a class="nav-link" href="login.php"> Login </a></li>
              <li class="nav-item"> <a class="nav-link" href="register.php"> Register </a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="documentation">
            <span class="menu-icon">
              <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">Documentation</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
<!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script>
        function change(element) {
          element.classlist.toggle("fullsize")

        }
    </script>
       </body>
       </html>
