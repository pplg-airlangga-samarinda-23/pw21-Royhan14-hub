<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <title>Tambah Barang</title> 
    </head> 
    <body> 
        <h1 style="font-size:large;">Tambah Barang</h1> 
        <form action="" method="post"> 
            <div class="form-item"> 
                <label for="nama">Nama Barang</label> 
                <input type="text" name="nama" id="nama"> 
            </div> 
            <div class="form-item"> 
                <label for="stok">Stok</label> 
                <input type="number" name="stok" id="stok"> 
            </div> 
            <div class="form-item"> 
                <label for="status">Status</label> 
                <select name="status" id="status"> 
                    <option value="" disabled selected>Pilih status barang</option> 
                    <option value="baik">Baik</option> 
                    <option value="rusak">Rusak</option> 
                </select> 
            </div> 
            <button type="submit">Submit</button> 
        </form> 
        <a href="barang.php">Kembali</a> 
    </body> 
    </html>

<?php 
require "koneksi.php"; 
if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $nama = $_POST["nama"]; 
    $stok = $_POST["stok"]; 
    $status = $_POST["status"]; 
    $sql = "INSERT INTO barang (nama, stok, status) values (?, ?, ?)"; 
    // PHP 8.2 
    $row = $koneksi -> execute_query($sql, [$nama, $stok, $status]); 
    header("location: barang.php"); 
} 
?>