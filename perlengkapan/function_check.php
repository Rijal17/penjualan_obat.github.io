<?php 
    function add(){
        if (isset($_POST)) {
            include "config/koneksi.php";
            $namabarang = $_POST['namabarang'];
            $harga = $_POST['harga'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $telp = $_POST['telp'];
            $prov = $_POST['prov'];
            $kota = $_POST['kota'];
            $pos = $_POST['pos'];
            $query = "INSERT INTO checkout(id, namabarang, harga, nama, alamat, telp, prov, kota, pos) VALUES('', '$namabarang', '$harga', '$nama', '$alamat', '$telp', '$prov', '$kota', '$pos')";
            $sql = mysqli_query($conn, $query);
            if ($sql) {
                echo "
                    <script>
                        alert('Berhasil menambah Checkout :');
                        document.location.href = 'berhasil.php';
                    </script>";
            }else{
                echo
                "<script>
                    alert('Gagal Checkout Barang :');
                    document.location.href = 'index.php';
                </script>";
                die;
            }
        }
    }
?>