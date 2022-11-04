<?php
include "function_user.php";

$id = $_GET['id'];

if (hapus($id)) {
    echo
    "<script>
            alert('Berhasil menghapus data :');
            document.location.href = 'user.php';
        </script>";
} else {
    echo
    "<script>
            alert('Gagal menghapus data :');
            document.location.href = 'user.php';
        </script>";
    die;
}
?>