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
            $tgl_update = date('Y-m-d');
            $user_update = htmlspecialchars($_POST['user_update']);
            $id_user = htmlspecialchars($_POST['id_user']);
            
                $query = "UPDATE pendaftaran SET
                nis='$nis',
                nama_siswa='$nama_siswa',
                alamat='$alamat',
                jenis_kelamin='$jk',
                tempat_lahir='$tmp_lahir',
                tgl_lahir='$tgl_lahir',
                `status` ='$status ',
                id_negara='$negara',
                id_agama='$agama',
                id_jurusan='$kelas',
                tgl_update='$tgl_update',
                user_update='$user_update',
                id_user='$id_user'
                WHERE nis='$nis'
                ";
                // var_dump($query);
                // exit();
                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {
                    echo "
                        <script>
                            alert('Data Pendaftaran Berhasil DiUpdate');
                            document.location.href='data_pendaftaran.php';
                        </script>
                        ";
                } else {
                    echo "
                        <script>
                            alert('Data Pendaftaran Gagal DiUpdate');
                            document.location.href='data_pendaftaran.php';
                        </script>
                        ";
                }
            }
            $data = mysqli_query($conn, "SELECT pendaftaran.nis,pendaftaran.nama_siswa,pendaftaran.alamat,pendaftaran.jenis_kelamin,pendaftaran.tempat_lahir,pendaftaran.tgl_lahir,pendaftaran.status,kewarganegaraan.id_negara,kewarganegaraan.nama_negara,agama.id_agama,agama.nama_agama,jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, pendaftaran.tgl_input,pendaftaran.user_input,pendaftaran.tgl_update,pendaftaran.user_update, user.id_user,CONCAT(user.akses,' (',user.nama,')') as akses FROM pendaftaran INNER JOIN kewarganegaraan ON pendaftaran.id_negara = kewarganegaraan.id_negara JOIN user ON pendaftaran.id_user = user.id_user JOIN agama ON pendaftaran.id_agama = agama.id_agama JOIN jurusan ON pendaftaran.id_jurusan = jurusan.id_jurusan JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang WHERE nis='" . $_GET['nis'] . "'");
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
                        <label for="exampleInputName1">NIS</label>
                        <input type="text" name="id_jurusan" class="form-control" id="nis" placeholder="ID jurusan" value="<?= $edit['nis']; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_jurusan" id="nama_siswa" placeholder="Nama Siswa" value="<?= $edit['nama_siswa']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Alamat</label>
                        <textarea type="text" class="form-control" name="alamat" required="required" id="alamat" placeholder="Alamat" value="<?= $edit['nama_siswa']; ?>" required="required"><?= $edit['alamat']; ?></textarea>
                      </div>
                      <div class="form-group">
                                <label class="col-form-label">Jenis Kelamin</label>
                                <br>
                                <?php if (
                                    $edit['jenis_kelamin'] ==
                                    'Laki-laki'
                                ) { ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jk1" name="jk" class="custom-control-input" value="Laki-laki" checked>
                                        <label class="custom-control-label" for="jk1">Laki - Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jk2" name="jk" class="custom-control-input" value="Perempuan">
                                        <label class="custom-control-label" for="jk2">Perempuan</label>
                                    </div>
                                <?php } else { ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jk1" name="jk" class="custom-control-input" value="Laki-laki">
                                        <label class="custom-control-label" for="jk1">Laki - Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jk2" name="jk" class="custom-control-input" value="Perempuan" checked>
                                        <label class="custom-control-label" for="jk2">Perempuan</label>
                                    </div>
                                <?php } ?>
                            </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" placeholder="Tempat Lahir" value="<?= $edit['tempat_lahir']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"  value="<?= $edit['tgl_lahir']; ?>" required>
                      </div>
                      <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="<?= $edit['status']; ?>"><?= $edit['status']; ?></option>
                                    <option value="Baru">Baru</option>
                                    <option value="Pindahan">Pindahan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Negara</label>
                                <select class="form-control" name="negara" id="negara">
                                <option value="<?= $edit['id_negara']; ?>"><?= $edit['nama_negara']; ?></option>
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
                                <label>Agama</label>
                                <select class="form-control" name="agama" id="agama">
                                <option value="<?= $edit['id_agama']; ?>"><?= $edit['nama_agama']; ?></option>
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
                                <label>Kelas</label>
                                <select class="form-control" name="kelas" id="kelas">
                                <option value="<?= $edit['id_jurusan'] ?>"><?= $edit['kelas'] ?></option>
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
                                <label class="col-form-label">Tanggal Update</label>
                                <input type="date" class="form-control form-control-user" id="tgl_update" name="tgl_update" required>
                            </div>
                            <div class="form-group">
                            <label class="col-form-label">User_Input</label>
                                <input type="text" class="form-control form-control-user" id="user_input" name="user_input" placeholder="User Input" value="<?= $edit['user_input']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Akses User</label>
                                <select class="form-control" name="id_user" id="id_user">
                                <option value="<?= $edit['id_user']; ?>"><?= $edit['akses']; ?></option>
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