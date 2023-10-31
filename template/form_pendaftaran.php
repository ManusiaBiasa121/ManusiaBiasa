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
                $nis = htmlspecialchars($_POST['nis']);
                $nama_siswa = htmlspecialchars($_POST['nama_siswa']);
                $alamat = htmlspecialchars($_POST['alamat']);
                $jk = htmlspecialchars($_POST['jk']);
                $tmp_lahir = htmlspecialchars($_POST['tmp_lahir']);
                $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
                $status = htmlspecialchars($_POST['status']);
                $negara = htmlspecialchars($_POST['negara']);
                $agama = htmlspecialchars($_POST['agama']);
                $kelas = htmlspecialchars($_POST['kelas']);
                $tgl_input = date("Y-m-d");
                $user_input = htmlspecialchars($_POST['user_input']);
                $id_user = htmlspecialchars($_POST['id_user']);
          
              //cek id sudah terdaftar belum
              $result = mysqli_query($conn, "SELECT nis FROM pendaftaran WHERE nis = '$nis'");
                if (mysqli_fetch_assoc($result)) {
                    echo "
                    <script>
                        alert('ID sudah terdaftar, silahkan ganti!');
                        document.location.href='form_pendaftaran.php';
                    </script>
                    ";
                    return false;
                }
          
                mysqli_query($conn, "INSERT INTO pendaftaran VALUES('$nis','$nama_siswa','$alamat','$jk','$tmp_lahir','$tgl_lahir','$status','$negara','$agama','$kelas','$tgl_input','$user_input','','','$id_user')");
          
              // var_dump($cek);
              // exit();
          
              if (mysqli_affected_rows($conn) > 0) {
                  echo "
                  <script>
                      alert('Data Pendaftaran Berhasil dibuat');
                      document.location.href='data_pendaftaran.php';
                  </script>
                  ";
              } else {
                  echo "
                  <script>
                      alert('Data Pendaftaran Gagal dibuat');
                      document.location.href='form_pendaftaran.php';
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
                    <h4 class="card-title">Form pendaftaran</h4>
                    <p class="card-description">Mohon isi</p>
                    <form class="forms-sample" action="" method="post" >
                      <div class="form-group">
                        <label for="exampleInputName1">NIS</label>
                        <input type="text" name="nis" class="form-control" id="nis" placeholder="NIS">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" 
                        id="nama_siswa" placeholder="nama siswa">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat"></textarea>
                      </div>
                      <div class="form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="jk1">Jenis Kelamin <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="jk1" name="jk" class="custom-control-input" value="Laki-laki" checked>
                                    <label class="custom-control-label" for="jk">Laki - Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="jk2" name="jk" class="custom-control-input" value="Perempuan">
                                    <label class="custom-control-label" for="jk2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputName1">Tempat Lahir</label>
                        <input type="text" name="tmp_lahir" class="form-control" id="tmp_lahir" placeholder="Tempat Lahir">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir">
                      </div>
                      <div class="form-group">
                      <label>Status</label>
                      <select class="js-example-basic-single" style="width:100%" name="status" id="status">
                          <option value="">Pilih Status</option>
                          <option value="Baru">Baru</option>
                          <option value="Pindahan">Pindahan</option>
                      </select>
                    </div>
                      <div class="form-group">
                      <label>Agama</label>
                      <select class="js-example-basic-single" style="width:100%" name="agama" id="agama">
                      <option disabled selected>Pilih agama</option>
                      <?php
                      $sql = mysqli_query($conn, "SELECT * FROM agama");
                      while ($data = mysqli_fetch_assoc($sql)) {
                      ?>
                          <option value="<?= $data['id_agama'] ?>"><?= $data['nama_agama'] ?></option>
                      <?php
                      }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Negara</label>
                      <select class="js-example-basic-single" style="width:100%" name="negara" id="negara">
                      <option disabled selected>Pilih Negara</option>
                      <?php
                      $sql = mysqli_query($conn, "SELECT * FROM kewarganegaraan");
                      while ($data = mysqli_fetch_assoc($sql)) {
                      ?>
                          <option value="<?= $data['id_negara'] ?>"><?= $data['nama_negara'] ?></option>
                      <?php
                      }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>kelas</label>
                      <select class="js-example-basic-single" style="width:100%" name="kelas" id="kelas">
                      <option disabled selected>Pilih Kelas</option>
                      <?php
                      $sql = mysqli_query($conn, "SELECT jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) AS kelas FROM jurusan INNER JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang");
                      while ($data = mysqli_fetch_assoc($sql)) {
                      ?>
                          <option value="<?= $data['id_jurusan'] ?>"><?= $data['kelas'] ?></option>
                      <?php
                      }
                      ?>
                      </select>
                    </div>
                      <div class="form-group">
                        <label for="exampleInputName1">User Input</label>
                        <input type="text" name="user_input" class="form-control" id="user_input" placeholder="User_Input">
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