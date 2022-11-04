<?php  
function addProduk(){
    if (isset($_POST)) {
        include 'koneksi.php';
        $namabarang = htmlspecialchars($_POST['namabarang']);
        $harga = htmlspecialchars($_POST['harga']);
        $stock = htmlspecialchars($_POST['stock']);
        $keterangan = htmlspecialchars($_POST['keterangan']);
    
        if (uploadGambar($_POST)) {
            $gambar = str_replace(' ', '', $_FILES['foto']['name']);
            $datefoto = date('dmYHis') . $gambar;
            $query = "INSERT INTO obat(id_barang, namabarang, harga, stock, foto, keterangan, tanggal) VALUES('','$namabarang','$harga', '$stock','$datefoto', '$keterangan', now())";
            $sql = mysqli_query($conn, $query);
            if ($sql) {
                echo "
                    <script>
                        alert('Berhasil menambah data :');
                        document.location.href = 'produk.php';
                    </script>";
            }else{
                echo
                "<script>
                    alert('Gagal menambah data :');
                    document.location.href = 'produk.php';
                </script>";
                die;
            }
        }else {
            echo
            "<script>
                alert('Gagal menambah data :');
                document.location.href = 'produk.php';
            </script>";
            die;
        }
    }
}


function edit(){
    include 'koneksi.php';
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $id_barang = $_POST['id_barang'];
    $namabarang = htmlspecialchars($_POST['namabarang']);
    $harga = htmlspecialchars($_POST['harga']);
    $stock = htmlspecialchars($_POST['stock']);
    $keterangan = htmlspecialchars($_POST['keterangan']);

    if ($_FILES['foto']['name'] == '') {
        $query = "UPDATE obat SET namabarang='$namabarang', harga='$harga', stock='$stock', keterangan='$keterangan' tanggal=now() WHERE id_barang='$id_barang'";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            echo "
                <script>
                    alert('Berhasil merubah data :');
                    document.location.href = 'produk.php';
                </script>";
        } else {
            echo
                "<script>
                    alert('Gagal merubah data :');
                    document.location.href = 'produk.php';
                </script>";
            die;
        }
    } else if (uploadGambar($_POST)) {
        $getOldGambar = mysqli_query($conn, "SELECT * FROM obat WHERE id_barang='$id_barang'");
        $oldGambar = mysqli_fetch_assoc($getOldGambar);
        unlink('img/' . $oldGambar['foto']);
        $gambar = str_replace(' ', '', $_FILES['foto']['name']);
        $datefoto = date('dmYHis') . $gambar;
        $query = "UPDATE obat SET namabarang='$namabarang', harga='$harga', stock='$stock', foto='$datefoto', keterangan='$keterangan', tanggal=now() WHERE id_barang='$id_barang'";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            echo "
                <script>
                    alert('Berhasil merubah data :');
                    document.location.href = 'produk.php';
                </script>";
        } else {
            echo
            "<script>
                    alert('Gagal merubah data :');
                    document.location.href = 'produk.php';
                </script>";
            die;
        }
    } else {
        echo
            "<script>
                alert('Gagal merubah data :');
                document.location.href = 'produk.php';
            </script>";
        die;
    }       
}

function uploadGambar(){
    $valid_ext = ['jpg', 'jpeg', 'png'];
    $ext_foto = strtolower($_FILES['foto']['name']);
    $ext = explode('.', $ext_foto);
    $ext = end($ext);

    if (in_array($ext, $valid_ext)) {
        $gambar = str_replace(' ', '', $_FILES['foto']['name']);
        $filesname = $_FILES['foto']['tmp_name'];
        $datefoto = date('dmYHis') . $gambar;
        $path = "img/" . $datefoto;

        if (move_uploaded_file($filesname, $path)) {
            return true;
        }
    }
}

function hapus($id){
    include 'koneksi.php';
    $getOldFile = mysqli_query($conn, "SELECT * FROM obat WHERE id_barang=$id");
    $oldFile = mysqli_fetch_assoc($getOldFile);
    unlink('img/'.$oldFile['foto']);
    $query = mysqli_query($conn, "DELETE FROM obat WHERE id_barang=$id");
    if ($query) {
        return true;    
    }
    return false;
}


?>