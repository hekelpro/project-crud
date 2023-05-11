<?php
 function connect() {
    $database = "seleksi";
    $host = "localhost";
    $username = "root";
    $password = "";
    $cek = mysqli_connect($host, $username, $password, $database);
    if (!$cek) {
        echo "gagal menyambungkan koneksi";
        die();
    }
    return $cek;
 }
?>