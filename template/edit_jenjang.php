<?php include 'koneksi.php';
?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin TPG 2</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/logo.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.php -->
      <?php include 'partials/_sidebar.php';
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.php -->
            <?php include 'partials/_navbar.php';
            ?>
            <!-- partial -->
            <?php
            if (isset($_POST['simpan'])) {
                $id_jenjang = htmlspecialchars($_POST['id_jenjang']);
                $nama_jenjang = htmlspecialchars($_POST['nama_jenjang']);
                $tgl_update = date('Y-m-d');
                $user_update = htmlspecialchars($_POST['user_update']);
                $id_user = htmlspecialchars($_POST['id_user']);
            
                $query = "UPDATE jenjang SET
                        id_jenjang='$id_jenjang',
                        nama_jenjang='$nama_jenjang',
                        tgl_update='$tgl_update',
                        user_update='$user_update'
                        WHERE id_jenjang='$id_jenjang'
                        ";
                // var_dump($query);
                // exit();
                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {
                    echo "
                        <script>
                            alert('Data Jenjang Berhasil DiUpdate');
                            document.location.href='data_jenjang.php';
                        </script>
                        ";
                } else {
                    echo "
                        <script>
                            alert('Data Jenjang Gagal Update');
                            document.location.href='data_jenjang.php';
                        </script>
                        ";
                }
            }
            
            $data = mysqli_query($conn, "SELECT *
            FROM jenjang WHERE id_jenjang='" . $_GET['id_jenjang'] . "'");
            $edit = mysqli_fetch_assoc($data);
            ?>
        <div class="main-panel">
          <div class="content-wrapper">
                <div class="row">
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Update jenjang</h4>
                    <p class="card-description">Mohon isi</p>
                    <form class="forms-sample" action="" method="post" >
                      <div class="form-group">
                        <label for="exampleInputName1">ID Jenjang</label>
                        <input type="text" name="id_jenjang" class="form-control" id="id_jenjang" placeholder="ID Jenjang" value="<?= $edit['id_jenjang']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Jenjang</label>
                        <input type="text" class="form-control" name="nama_jenjang" id="nama_jenjang" placeholder="Nama jenjang" required value="<?= $edit['nama_jenjang']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">User Update</label>
                        <input type="text" class="form-control" name="user_update" id="user_update" placeholder="User Update" required value="<?= $edit['user_input']; ?>">
                      </div>
                      
                      <button type="submit" name="simpan" class="btn btn-primary mr-2">Update</button>
                      <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>




                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.php -->
                <?php include 'partials/_footer.php';
                ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/file-upload.js"></script>
    
    <!-- End custom js for this page -->
    
  </body>
</html>