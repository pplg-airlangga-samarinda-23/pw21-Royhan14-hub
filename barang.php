<?php
require "koneksi.php";

$sql = "SELECT * FROM barang";

$rows = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Barang</title>
        <link rel="stylesheet" href="barang.css">
    </head>
    <body>
        <a href="barang-tambah.php">Tambah</a>
        <table border="1">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                while ($item = $rows-> fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $item["nama"]; ?></td>
                        <td><?= $item["stok"]; ?></td>
                        <td><?= $item["status"]; ?></td>
                        <td>
                            <a href="barang-edit.php?id=<?=$item['id']?>">Edit</a>
                            <a href="#">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $no += 1;
                }
                ?>
                </tbody>
            </table>
        </body>
        </html>