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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
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
        <div class="main-panel">
          <div class="content-wrapper">
          <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Detail</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Cetak</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            if ($status == 'admin') {
                $query = "SELECT pendaftaran.nis,pendaftaran.nama_siswa,pendaftaran.alamat,pendaftaran.jenis_kelamin,pendaftaran.tempat_lahir,pendaftaran.tgl_lahir,pendaftaran.status,kewarganegaraan.id_negara,kewarganegaraan.nama_negara,agama.id_agama,agama.nama_agama,jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, pendaftaran.tgl_input,pendaftaran.user_input,pendaftaran.tgl_update,pendaftaran.user_update,CONCAT(user.akses,' (',user.nama,')') as akses FROM pendaftaran INNER JOIN kewarganegaraan ON pendaftaran.id_negara = kewarganegaraan.id_negara JOIN user ON pendaftaran.id_user = user.id_user JOIN agama ON pendaftaran.id_agama = agama.id_agama JOIN jurusan ON pendaftaran.id_jurusan = jurusan.id_jurusan JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang";
            } else {
                $query = "SELECT pendaftaran.nis,pendaftaran.nama_siswa,pendaftaran.alamat,pendaftaran.jenis_kelamin,pendaftaran.tempat_lahir,pendaftaran.tgl_lahir,pendaftaran.status,kewarganegaraan.id_negara,kewarganegaraan.nama_negara,agama.id_agama,agama.nama_agama,jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, pendaftaran.tgl_input,pendaftaran.user_input,pendaftaran.tgl_update,pendaftaran.user_update,CONCAT(user.akses,' (',user.nama,')') as akses FROM pendaftaran INNER JOIN kewarganegaraan ON pendaftaran.id_negara = kewarganegaraan.id_negara JOIN user ON pendaftaran.id_user = user.id_user JOIN agama ON pendaftaran.id_agama = agama.id_agama JOIN jurusan ON pendaftaran.id_jurusan = jurusan.id_jurusan JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang WHERE user.akses = '$status' AND user.id_user='$_SESSION[id_user];'";
            }
            // var_dump($query);
            // exit;
            $sql = mysqli_query($conn, $query);
            while ($data = mysqli_fetch_assoc($sql)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nis']; ?></td>
                    <td><?= $data['nama_siswa']; ?></td>
                    <td><?= $data['kelas']; ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <td><?= $data['jenis_kelamin']; ?></td>
                    <!-- <td align="center"><a class="btn btn-primary" type="button" name="view" value="View" data-id="<?php echo $data["nis"]; ?>" class="btn btn-info btn-xs view_data"><i class="fa fa-bars"></i></a></td> -->
                    <td><a data-toggle="modal" data-target="#detailDaftar" data-id="<?= $data['nis']; ?>" type="submit" class="btn btn-success btn-sm Detail_Pendaftaran">view</a></td>
                    <td align="center"><a class="btn btn-warning btn-sm" type="button" href="edit_pendaftaran.php?nis=<?= $data['nis']; ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td align="center"><a class="btn btn-danger btn-sm" type="button" onclick="return confirm('Data akan di Hapus?')" href="hapus_pendaftaran.php?nis=<?= $data['nis']; ?>"><i class="fa fa-trash-o"></i></a></td>
                    <td> <a href="cetak_surat/surat.php?nis=<?= $data['nis']; ?>" target="_blank" type="button" name="cetak" class="btn btn-primary btn-sm text-white" data-dismiss="modal"><i class="fa fa-print" aria-hidden="true"></i></a></td>
                </tr>
            <?php
            }
            ?>
</tbody>
<tfoot>
<tr>
    <th>No</th>
    <th>NIS</th>
    <th>Nama Siswa</th>
    <th>Kelas</th>
    <th>Alamat</th>
    <th>Jenis Kelamin</th>
    <th>Detail</th>
    <th>Update</th>
    <th>Delete</th>
    <th>Cetak</th>
</tr>
</tfoot>
            </table>

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
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    <script>
            new DataTable('#example');

            var myModal = document.getElementById('myModal')
            var myInput = document.getElementById('myInput')
              
            myModal.addEventListener('shown.bs.modal', function () {
              myInput.focus()
            })
        </script>
  </body>
</html>