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
              $id_negara = htmlspecialchars($_POST['id_negara']);
              $nama_negara = htmlspecialchars($_POST['nama_negara']);
              $tgl_input = date("Y-m-d");
              $user_input = htmlspecialchars($_POST['user_input']);
              $id_user = htmlspecialchars($_POST['id_user']);
          
              //cek id sudah terdaftar belum
              $result = mysqli_query($conn, "SELECT id_negara FROM kewarganegaraan WHERE id_negara = '$id_negara'");
              if (mysqli_fetch_assoc($result)) {
                  echo "
                  <script>
                      alert('ID sudah terdaftar, silahkan ganit!');
                      document.location.href='form_negara.php';
                  </script>
                  ";
                  return false;
              }
          
              mysqli_query($conn, "INSERT INTO kewarganegaraan VALUES('$id_negara','$nama_negara','$tgl_input','$user_input','','','$id_user')");
          
              // var_dump($cek);
              // exit();
          
              if (mysqli_affected_rows($conn) > 0) {
                  echo "
                  <script>
                      alert('Data Negara Berhasil dibuat');
                      document.location.href='data_negara.php';
                  </script>
                  ";
              } else {
                  echo "
                  <script>
                      alert('Data Negara Gagal dibuat');
                      document.location.href='form_negara.php';
                  </script>
                  ";
              }
            }
?>
        <div class="main-panel">
          <div class="content-wrapper">
                <div class="row">
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Input Negara</h4>
                    <p class="card-description">Mohon isi</p>
                    <form class="forms-sample" action="" method="post" >
                      <div class="form-group">
                        <label for="exampleInputName1">ID Negara</label>
                        <input type="text" name="id_negara" class="form-control" id="id_negara" placeholder="ID Negara">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Negara</label>
                        <input type="text" class="form-control" name="nama_negara" 
                        id="nama_negara" placeholder="nama negara">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">User Input</label>
                        <input type="text" class="form-control" name="user_input" id="user_input" placeholder="User Input">
                      </div>
                      <div class="form-group">
                      <label>Pilih Akses User</label>
                      <select class="js-example-basic-single" style="width:100%" name="id_user" id="id_user">
                      <option disabled selected>Pilih Hak Akses</option>
                      <?php
                      $sql = mysqli_query($conn, "SELECT * FROM user WHERE akses = '$status' AND id_user='$_SESSION[id_user];'");
                      while ($data = mysqli_fetch_assoc($sql)) {
                      ?>
                          <option value="<?= $data['id_user'] ?>"><?= $data['akses'] ?> (<?= $data['nama'] ?>)</option>
                      <?php
                      }
                      ?>
                      </select>
                    </div>
                      <button type="submit" name="simpan" class="btn btn-primary mr-2">simpan</button>
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