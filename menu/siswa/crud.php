<?php
// Include file koneksi.php untuk mendapatkan koneksi ke database
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "jwd";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi untuk menambahkan siswa baru
function tambahSiswa($nama, $alamat, $tanggal_lahir, $jenis_kelamin, $agama, $asalsekolah) {
    global $conn;
    $query = "INSERT INTO siswa (nama, alamat, tanggal_lahir, jenis_kelamin, agama, asalsekolah) VALUES ('$nama', '$alamat', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$asalsekolah')";
    return mysqli_query($conn, $query);
}

// Fungsi untuk menampilkan data siswa
function tampilSiswa() {
    global $conn;
    $query = "SELECT * FROM siswa";
    return mysqli_query($conn, $query);
}

// Fungsi untuk mengedit data siswa
function editSiswa($id, $nama, $alamat, $tanggal_lahir, $jenis_kelamin, $agama, $asalsekolah) {
    global $conn;
    $query = "UPDATE siswa SET nama = '$nama', alamat = '$alamat', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', asalsekolah = '$asalsekolah' WHERE id = $id";
    return mysqli_query($conn, $query);
}

// Fungsi untuk menghapus data siswa
function hapusSiswa($id) {
    global $conn;
    $query = "DELETE FROM siswa WHERE id = $id";
    return mysqli_query($conn, $query);
}
?>
