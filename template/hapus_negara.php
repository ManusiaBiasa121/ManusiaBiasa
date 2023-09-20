<?php
include 'koneksi.php';
// mysqli_query($conn, "DELETE FROM kewarganegaraan WHERE id_negara='" . $_GET['id_negara'] . "'");
// if (mysqli_affected_rows($conn) > 0) {
//     echo "
//         <script>
//             alert('Data Berhasil Dihapus');
//             document.location.href='data_negara.php';
//         </script>
//         ";
// } else {
//     echo "
//         <script>
//             alert('Data Gagal Dihapus');
//             document.location.href='data_negara.php';
//         </script>
//         ";
// }

if (isset($_GET['id_negara'])) {
    mysqli_query($conn, "DELETE FROM kewarganegaraan WHERE id_negara='" . $_GET['id_negara'] . "'");
    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href='data_negara.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href='data_negara.php';
        </script>
        ";
    }
} else {
    mysqli_query($conn, "DELETE FROM kewarganegaraan ");
    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href='data_negara.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href='data_negara.php';
        </script>
        ";
    }
}