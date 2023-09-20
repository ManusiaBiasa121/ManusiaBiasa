<?php
include 'koneksi.php';


if (isset($_POST['simpan'])) {
    $id_agama = htmlspecialchars($_POST['id_agama']);
    $nama_agama = htmlspecialchars($_POST['nama_agama']);
    $tgl_input = htmlspecialchars($_POST['tgl_input']);
    $user_input = htmlspecialchars($_POST['user_input']);
    $id_user = htmlspecialchars($_POST['id_user']);

    //cek id sudah terdaftar belum
    $result = mysqli_query($conn, "SELECT id_agama FROM agama WHERE id_agama = '$id_agama'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('ID sudah terdaftar, silahkan ganit!');
            document.location.href='form_agama.php';
        </script>
        ";
        return false;
    }

    mysqli_query($conn, "INSERT INTO agama VALUES('$id_agama','$nama_agama','$tgl_input','$user_input','','','$id_user')");

    // var_dump($cek);
    // exit();

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
            alert('Data Agama Berhasil dibuat');
            document.location.href='data_agama.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Agama Gagal dibuat');
            document.location.href='form_agama.php';
        </script>
        ";
    }
}
?>