<?php
// Include file fungsi_crud.php untuk mendapatkan fungsi CRUD
include "crud.php";

// Proses tambah siswa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $asalsekolah = $_POST['asalsekolah'];

    tambahSiswa($nama, $alamat, $tanggal_lahir, $jenis_kelamin, $agama, $asalsekolah);
}

// Proses edit siswa
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $id = $_GET['id'];
    $siswa = mysqli_fetch_assoc(tampilSiswa($id));
}

// Proses hapus siswa
if (isset($_GET['action']) && $_GET['action'] == 'hapus') {
    $id = $_GET['id'];
    hapusSiswa($id);
}

// Tampilan daftar siswa
$daftar_siswa = tampilSiswa();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa</title>
</head>
<body>
    <h1>Daftar Siswa</h1>
    <form method="POST" action="index.php">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br>

        <label>Tanggal Lahir:</label><br>
        <input type="date" name="tanggal_lahir" required><br>

        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan<br>

        <label>agama:</label><br>
        <input type="text" name="agama" required><br>

        <label>asal sekolah:</label><br>
        <input type="text" name="asalsekolah" required><br>

        <input type="submit" value="Tambah Siswa">
    </form>

    <h2>Daftar Siswa:</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Asal sekolah</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($siswa = mysqli_fetch_assoc($daftar_siswa)) {
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $siswa['nama'] . "</td>";
            echo "<td>" . $siswa['alamat'] . "</td>";
            echo "<td>" . $siswa['tanggal_lahir'] . "</td>";
            echo "<td>" . $siswa['jenis_kelamin'] . "</td>";
            echo "<td>" . $siswa['agama'] . "</td>";
            echo "<td>" . $siswa['asalsekolah'] . "</td>";
            echo "<td>";
            echo "<a href='index.php?action=edit&id=" . $siswa['id'] . "'>Edit</a> ";
            echo "<a href='index.php?action=hapus&id=" . $siswa['id'] . "'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>
