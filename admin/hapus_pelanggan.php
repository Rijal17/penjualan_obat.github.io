<?php
include "function_pelanggan.php";

$id = $_GET['id'];

if (hapus($id)) 
{
    echo
    "<script>
            alert('Berhasil menghapus data :');
            document.location.href = 'pelanggan.php';
        </script>";
}else {
    echo
        "<script>
            alert('Gagal menghapus data :');
            document.location.href = 'pelanggan.php';
        </script>";
    die;
}
