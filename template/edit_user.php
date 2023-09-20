<?php
include 'koneksi.php';
// if ($_SESSION['akses'] != 'admin') {
//     echo "
//     <script>
//         alert('Tidak Memiliki Akses, DILARANG MASUK!');
//         document.location.href='index.php';
//     </script>
//     ";
// }

if (isset($_POST['simpan'])) {
    $username = strtolower(stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $akses = htmlspecialchars($_POST['akses']);
    $id_user = $_POST['id_user'];

    //cek username sudah terdaftar belum
    // $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    // if (mysqli_fetch_assoc($result)) {
    //     echo "
    //     <script>
    //         alert('username sudah terdaftar, silahkan ganit!');
    //         document.location.href='registrasi.php';
    //     </script>
    //     ";
    //     return false;
    // }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
            alert('Konfirmasi Password Salah');
            document.location.href='registrasi.php';
        </script>
        ";
        return false;
    }
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE user SET
            id_user='$id_user',
            username='$username',
            `password` ='$password',
            nama='$nama',
            email='$email',
            akses='$akses'
            WHERE id_user='$id_user'
            ";
    // var_dump($query);
    // exit();
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data user Berhasil DiUpdate');
                document.location.href='data_user.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data user Gagal Update');
                document.location.href='data_user.php';
            </script>
            ";
    }
}

$data = mysqli_query($conn, "SELECT *
FROM user WHERE id_user='" . $_GET['id_user'] . "'");
$edit = mysqli_fetch_assoc($data);
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

            <div class="main-panel">
          <div class="content-wrapper">
                <div class="row">
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update User</h4>
                    <p class="card-description">Mohon isi</p>
                    
                    <form class="forms-sample" action="" method="post" >
                    
                        <input type="hidden" name="id_user" id="id_user" value="<?= $edit['id_user']; ?>">
                      <div class="form-group">

                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $edit['nama']; ?>" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?= $edit['username']; ?>" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $edit['email']; ?>" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Password">
                      </div>
                      <div class="form-group">
                      <label>Pilih Hak Akses</label>
                      <select class="js-example-basic-single" style="width:100%" name="akses" id="akses">
                        <option value="<?= $edit['akses']; ?>"><?= $edit['akses']; ?></option>
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                      </select>
                    </div>
                      <button name="simpan" name="simpan" class="btn btn-primary mr-2" type="submit">Update</button>
                      <button class="btn btn-dark" type="reset">Reset</button>
                    </form>
                  </div>
                </div>
              </div>