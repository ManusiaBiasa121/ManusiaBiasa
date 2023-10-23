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
          <a type="button" class="btn btn-success btn-icon-text" href="form_agama.php">
                            <i class="mdi mdi-upload btn-icon-prepend"></i> Upload Data </a>
          <a type="button" class="btn btn-info btn-icon-text"  href="laporan/laporan_agama.php"> Cetak Data <i class="mdi mdi-printer btn-icon-append"></i>
          </a>
          <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Agama</th>
                    <th>Tanggal input</th>
                    <th>User input</th>
                    <th>Tanggal update</th>
                    <th>User update</th>
                    <th>Akses</th>
                    <th>Update</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
            <?php
                include 'koneksi.php';
                $no = 1;
                $query = "SELECT *
                FROM agama
                INNER JOIN user
                ON agama.id_user = user.id_user";
                $sql = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
        <tr>
        <td><?= $no++; ?></td>
                <td align="center"><?= $data['nama_agama']; ?></td>
                <td align="center"><?= $data['tgl_input']; ?></td>
                <td align="center"><?= $data['user_input']; ?></td>
                <td align="center"><?= $data['tgl_update']; ?></td>
                <td align="center"><?= $data['user_update']; ?></td>
                <td align="center"><?= $data['akses']; ?> (<?= $data['nama']; ?>)</td>
                <td align="center"><a class="mdi mdi-table-edit" style="color: #1abf18" type="button" href="edit_agama.php?id_agama=<?= $data['id_agama']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td align="center"><a class="mdi mdi-backspace" style="color: #ab0d0d" type="button" onclick="return confirm('Data akan di Hapus?')" href="hapus_agama.php?id_agama=<?= $data['id_agama']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
        </tr>
    <?php
    }
?>
</tbody>
<tfoot>
<tr>
                    <th>No</th>
                    <th>Nama Agama</th>
                    <th>Tanggal input</th>
                    <th>User input</th>
                    <th>Tanggal update</th>
                    <th>User update</th>
                    <th>Akses</th>
                    <th>Update</th>
                    <th>Delete</th>
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
        </script>
  </body>
</html>