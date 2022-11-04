<?php
include "function_perlengkapan.php";

$id = $_GET['id_barang'];

if (hapus($id)) {
    echo
        "<script>
            alert('Berhasil menghapus data :');
            document.location.href = 'perlengkapan.php';
        </script>";
} else {
    echo
        "<script>
            alert('Gagal menghapus data :');
            document.location.href = 'perlengkapan.php';
        </script>";
    die;
}
