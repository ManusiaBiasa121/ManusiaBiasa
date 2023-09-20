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
  header("Location: template/index.php");
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
    if ($row['akses'] == 'admin') {
      $_SESSION['username'] = $username;
      $_SESSION['akses'] = 'admin';
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
        document.location.href='template/index.php';
    </script>
    ";
      }
    } else if ($row['akses'] == 'operator') {
      $_SESSION['username'] = $username;
      $_SESSION['akses'] = 'operator';
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
      $_SESSION['akses'] = '';
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
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body style="background-color: rgb(97, 94, 153); background: linear-gradient(90deg, rgb(29, 24, 119) 0%, rgba(27,27,88,1) 35%, rgb(58, 143, 160) 100%);">
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button  type="submit" name="login">Login</button>
        </form>
        <?php if (isset($error_message)): ?>
            <p><?= $error_message ?></p>
        <?php endif; ?>
    </div>

    <!-- Include your JavaScript code here -->
</body>
</html>
