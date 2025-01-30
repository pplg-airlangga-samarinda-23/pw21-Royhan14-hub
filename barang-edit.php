<?php 
require "koneksi.php"; 

$row = ["nama" => "", "stok" => "", "status" => ""];

if ($_SERVER["REQUEST_METHOD"] === "GET") { 
    if (isset($_GET['id'])) {
        $id = $_GET['id']; 
        $sql = "SELECT * FROM barang WHERE id=?"; 
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Data tidak ditemukan!";
            exit();
        }
        $stmt->close();
    } else {
        echo "ID tidak ditemukan!";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") { 
    if (isset($_GET["id"])) {
        $id = $_GET["id"]; 
        $nama = $_POST["nama"]; 
        $stok = $_POST["stok"]; 
        $status = $_POST["status"]; 
        
        $sql = "UPDATE barang SET nama=?, stok=?, status=? WHERE id=?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sisi", $nama, $stok, $status, $id);
        $stmt->execute();
        
        header("location:barang.php");
        exit();
    } else {
        echo "ID tidak ditemukan!";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head> 
    <title>Edit Barang</title> 
</head> 
<body> 
    <h1 style="font-size:large;">Edit Barang</h1> 
    <form action="" method="post"> 
        <div class="form-item"> 
            <label for="nama">Nama Barang</label> 
            <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($row['nama']) ?>"> 
        </div> 
        <div class="form-item"> 
            <label for="stok">Stok</label> 
            <input type="number" name="stok" id="stok" value="<?= htmlspecialchars($row['stok']) ?>"> 
        </div> 
        <div class="form-item"> 
            <label for="status">Status</label> 
            <select name="status" id="status"> 
                <option value="baik" <?= ($row['status'] == 'baik') ? 'selected' : '' ?>>Baik</option> 
                <option value="rusak" <?= ($row['status'] == 'rusak') ? 'selected' : '' ?>>Rusak</option> 
            </select> 
        </div> 
        <button type="submit">Submit</button> 
    </form> 
    <a href="barang.php">Kembali</a>
</body>
</html>