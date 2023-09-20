<?php 
include 'koneksi.php';
  $cek = isset($_POST['regis']);
  // var_dump($cek);
  // exit();
            if ($cek) {
                
                $username = strtolower(stripslashes($_POST['username']));
               
                $password = mysqli_real_escape_string($conn, $_POST['password']);
               
                $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
                
                $nama = htmlspecialchars($_POST['nama']);
                
                $email = htmlspecialchars($_POST['email']);
                
                $akses = htmlspecialchars($_POST['akses']);
                
                //cek username sudah terdaftar belum
                $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
                if (mysqli_fetch_assoc($result)) {
                    echo "
                    <script>
                        alert('username sudah terdaftar, silahkan ganit!');
                        document.location.href='registrasi.php';
                    </script>
                    ";
                    return false;
                }
            
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
           
            
            //simpan data ke database
            // $query=mysqli_query($conn, "INSERT INTO user VALUES('',1,2,3,4,5)");
            
            mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$nama','$email','$akses')");
                $cek=mysqli_affected_rows($conn);
            
            if (mysqli_affected_rows($conn)) {
              echo "
              <script>
                  alert('usewrname baru berhasil di buat!');
                  document.location.href='form_register.php';
              </script>
              ";
            } else {
              echo mysqli_error($conn);
            }
          }
            ?>