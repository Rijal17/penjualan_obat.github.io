<?php

function edit(){
    if (isset($_POST)) {
    include "koneksi.php";
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $id = $_POST['id'];
    $namabarang = htmlspecialchars($_POST['namabarang']);
    $harga = htmlspecialchars($_POST['harga']);
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telp = htmlspecialchars($_POST['telp']);
    $prov = htmlspecialchars($_POST['prov']);
    $kota = htmlspecialchars($_POST['kota']);
    $pos = htmlspecialchars($_POST['pos']);
    $status= htmlspecialchars($_POST['status']);
        $query = "UPDATE checkout SET namabarang='$namabarang', harga='$harga', nama='$nama', alamat='$alamat', telp='$telp', prov='$prov', kota='$kota', pos='$pos', status='$status' WHERE id='$id'";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            
            echo "
                <script>
                    alert('Berhasil Mengubah Data :');
                    document.location.href = 'pelanggan.php';
                </script>";
        }else{
            echo "
                    <script>
                        alert('Gagal Mengubah Data :');
                        document.location.href = 'pelanggan.php';
                    </script>";
                    die;
        }
    }
}

function hapus($id){
    include 'koneksi.php';
    $getOldFile = mysqli_query($conn, "SELECT * FROM checkout WHERE id=$id");
    $oldFile = mysqli_fetch_assoc($getOldFile);
    $query = mysqli_query($conn, "DELETE FROM checkout WHERE id=$id");
    if ($query) {
        return true;
    }
    return false;
}

function konfirmasi(){
    if (isset($_POST)) {
    include "koneksi.php";
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $id = $_POST['id'];
    $status= htmlspecialchars($_POST['status']);
        $query = "UPDATE checkout SET status='$status' WHERE id='$id'";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            echo "
                <script>
                    alert('Berhasil Mengubah Data :');
                    document.location.href = 'pelanggan.php';
                </script>";
        }else{
            echo "
                    <script>
                        alert('Gagal Mengubah Data :');
                        document.location.href = 'pelanggan.php';
                    </script>";
                    die;
        }
    }
}

?>