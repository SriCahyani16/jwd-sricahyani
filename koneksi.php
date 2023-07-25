<?php

// Konfigurasi koneksi database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jwd';

$koneksi=mysqli_connect($host, $username, $password);
if ($koneksi) {
    $buka=mysqli_select_db( $koneksi, $database );
    echo "Database terhubung";
    if (! $buka) {
        echo "Database tidak terhubung";
    }
}else{
    echo "MySQL tidak terhubung";
}

// Membuat koneksi
// try {
//     $dsn = "mysql:host=$host;dbname=$database";
//     $connection = new PDO($dsn, $username, $password);
//     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Koneksi ke database berhasil";
// } catch (PDOException $e) {
//     die("Koneksi ke database gagal: " . $e->getMessage());
// }

// // Menggunakan koneksi database di sini

// // Menutup koneksi
// $connection = null;


?>
