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
                $id_jurusan = htmlspecialchars($_POST['id_jurusan']);
                $nama_jurusan = htmlspecialchars($_POST['nama_jurusan']);
                $tgl_update = date('Y-m-d');
                $user_update = htmlspecialchars($_POST['user_update']);
                $id_user = htmlspecialchars($_POST['id_user']);
            
                $query = "UPDATE jurusan SET
                        id_jurusan='$id_jurusan',
                        nama_jurusan='$nama_jurusan',
                        tgl_update='$tgl_update',
                        user_update='$user_update',
                        id_user='$id_user'
                        WHERE id_jurusan='$id_jurusan'
                        ";
                // var_dump($query);
                // exit();
                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {
                    echo "
                        <script>
                            alert('Data jurusan Berhasil DiUpdate');
                            document.location.href='data_jurusan.php';
                        </script>
                        ";
                } else {
                    echo "
                        <script>
                            alert('Data jurusan Gagal Update');
                            document.location.href='data_jurusan.php';
                        </script>
                        ";
                }
            }
            
            $data = mysqli_query($conn, "SELECT *
            FROM jurusan
            LEFT JOIN user
            ON jurusan.id_user = user.id_user LEFT JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang WHERE id_jurusan='" . $_GET['id_jurusan'] . "'");
            $edit = mysqli_fetch_assoc($data);
            ?>
        <div class="main-panel">
          <div class="content-wrapper">
                <div class="row">
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Update jurusan</h4>
                    <p class="card-description">Mohon isi</p>
                    <form class="forms-sample" action="" method="post" >
                      <div class="form-group">
                        <label for="exampleInputName1">ID jurusan</label>
                        <input type="text" name="id_jurusan" class="form-control" id="id_jurusan" placeholder="ID jurusan" value="<?= $edit['id_jurusan']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Nama jurusan</label>
                        <input type="text" class="form-control" name="nama_jurusan" id="nama_jurusan" placeholder="Nama jurusan" required value="<?= $edit['nama_jurusan']; ?>">
                      </div>
                      <div class="form-group mb-3">
                      <label>Jenjang</label>
                      <select class="js-example-basic-single" style="width:100%" name="id_jenjang" id="id_jenjang">
                      <option value="<?= $edit['id_jenjang'] ?>"><?= $edit['nama_jenjang'] ?></option>
                        
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM jenjang");
                        while ($data = mysqli_fetch_assoc($sql)) {
                        ?>
                            <option value="<?= $data['id_jenjang'] ?>"><?= $data['nama_jenjang'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                        </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">User Update</label>
                        <input type="text" class="form-control" name="user_update" id="user_update" placeholder="User Update" required value="<?= $edit['user_input']; ?>">
                      </div>
                      <div class="form-group">
                      <label>Akses User</label>
                      <select class="js-example-basic-single" style="width:100%" name="id_user" id="id_user">
                      
                      <option value="<?= $edit['id_user'] ?>"><?= $edit['akses'] ?> (<?= $edit['nama'] ?>)</option>
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