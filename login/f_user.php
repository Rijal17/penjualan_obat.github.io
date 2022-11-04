<?php
function addAdmin()
{
    if (isset($_POST)) {
        include 'configabout.html/koneksi.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password1 = password_hash($password, PASSWORD_DEFAULT);
        $level = $_POST['level'];

        $user = mysqli_query($conn, "SELECT username FROM login WHERE username='$username'");
        if (mysqli_fetch_assoc($user)) {
            echo "
            <script>
                alert('Username Sudah Terdaftar :');
                document.location.href = 'index.php';
            </script>";
        }

        $query = "INSERT INTO login(id, username, password, level) VALUES ('', '$username','$password1', '$level')";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            
            echo "
                <script>
                    alert('Berhasil menambah data :');
                    document.location.href = 'login.php';
                </script>";
        } else {
            echo
            "<script>
                alert('Gagal menambah data :');
                document.location.href = 'register.php';
            </script>";
            die;
        }
    }
}
?>