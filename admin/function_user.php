<?php
function addAdmin()
{
    if (isset($_POST)) {
        include 'koneksi.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password1 = password_hash($password, PASSWORD_DEFAULT);
        $level = $_POST['level'];

        $user = mysqli_query($conn, "SELECT username FROM login WHERE username='$username'");
        if (mysqli_fetch_assoc($user)) {
            echo "
            <script>
                alert('Username Sudah Terdaftar :');
                document.location.href = 'user.php';
            </script>";
        }

        $query = "INSERT INTO login(id, username, password, level) VALUES ('', '$username','$password1', '$level')";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            
            echo "
                <script>
                    alert('Berhasil menambah data :');
                    document.location.href = 'user.php';
                </script>";
        } else {
            echo
            "<script>
                alert('Gagal menambah data :');
                document.location.href = 'user.php';
            </script>";
            die;
        }
    }
}

function edit(){
    if (isset($_POST)) {
    include "koneksi.php";
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $id = $_GET['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $level = $_POST['level'];

        $query = "UPDATE login SET username='$username', password='$password', level='$level 'WHERE id='$id'";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            echo "
                <script>
                    alert('Berhasil mengedit data :');
                    document.location.href = 'user.php';
                </script>";
        } else {
            echo
            "<script>
                alert('Gagal mengedit data :');
                document.location.href = 'user.php';
            </script>";
            die;
        }   
    }
}

function hapus($id){
    include 'koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM login WHERE id='$id'");
    if ($query) {
        return true;
    }
    return false;
}
