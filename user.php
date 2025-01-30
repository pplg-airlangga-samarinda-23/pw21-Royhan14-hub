<?php
require "koneksi.php";
$result = mysqli_query($koneksi, "SELECT * FROM user");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna</title>
</head>
<body>
    <h1>Daftar Pengguna</h1>
    <a href="user-tambah.php">Tambah Pengguna</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['password'] ?></td>
        </tr>
        <?php } ?>
    </table>
    <div>
        <button>
            <a href="login.php">Kembali</a>
        </button>
    </div>
</body>
</html>