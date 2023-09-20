<?php
session_start();
include 'template/koneksi.php';

//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  $db = mysqli_query($conn, "SELECT username FROM user WHERE id_user = '$id'");

  $row = mysqli_fetch_assoc($db);

  //cek cookie dengan username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}

//masuk ke session
if (isset($_SESSION["login"])) {
  header("Location: index.php");
}
//cek username dan password
if (isset($_POST['login'])) {
  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars($_POST["password"]);

  $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($cek) === 1) {
    //cek password
    $row = mysqli_fetch_assoc($cek);
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['id_user'] = $row['id_user'];
    if ($row['hak_akses'] == 'admin') {
      $_SESSION['username'] = $username;
      $_SESSION['hak_akses'] = 'admin';
      if (password_verify($password, $row['password'])) {
        //cek dan buat session
        $_SESSION['login'] = true;
        //buat dan cek cookie
        if (isset($_POST['remember'])) {
          setcookie('id', $row['id_user'], time() + 60);
          setcookie('key', hash('sha256', $row['username']), time() + 60);
        }
        echo "
    <script>
        alert('Login Admin Berhasil!');
        document.location.href='index.php';
    </script>
    ";
      }
    } else if ($row['hak_akses'] == 'operator') {
      $_SESSION['username'] = $username;
      $_SESSION['hak_akses'] = 'operator';
      if (password_verify($password, $row['password'])) {
        //cek dan buat session
        $_SESSION['login'] = true;
        //buat dan cek cookie
        if (isset($_POST['remember'])) {
          setcookie('id', $row['id_user'], time() + 60);
          setcookie('key', hash('sha256', $row['username']), time() + 60);
        }
        echo "
    <script>
        alert('Login Operator Berhasil!');
        document.location.href='template/index.php';
    </script>
    ";
      }
    } else {
      $_SESSION['username'] = '';
      $_SESSION['hak_akses'] = '';
      echo "
    <script>
        alert('Login Gagal!');
        document.location.href='login.php';
    </script>
    ";
    }
  }
  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title>Login SIA TPG 2 | </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="post" action="">
            <h1>Login SIA TPG 2</h1>
            <?php
            if (isset($error)) { ?>
              <p style="color: red;">Username atau Password Salah</p>
            <?php
            }
            ?>
            <div>
              <input type="text" class="form-control" name="username" id="username" placeholder="Username" />
            </div>
            <div>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                  Remeber me
                </label>
              </div>
            </div>
            <br>
            <div>
              <button class="btn btn-success submit" name="login">Log in</button>
              <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <div class="clearfix"></div>
              <br />
            </div>
          </form>
        </section>
      </div>

    </div>
  </div>
</body>

</html>



<script>
        // Front-end validation can still be done with JavaScript as shown in the previous example.
        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            // Add your server-side validation logic here if required

            // For demonstration purposes, check if the password is 'admin123'
            if (password !== 'admin123') {
                document.getElementById('error-message').innerText = 'Invalid credentials';
                return false;
            }
        }
    </script>