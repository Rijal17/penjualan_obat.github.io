<?php
include "function_produk.php";

$id = $_GET['id_barang'];

if (hapus($id)) {
    echo
        "<script>
            alert('Berhasil menghapus data :');
            document.location.href = 'produk.php';
        </script>";
} else {
    echo
        "<script>
            alert('Gagal menghapus data :');
            document.location.href = 'produk.php';
        </script>";
    die;
}
