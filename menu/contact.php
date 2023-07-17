<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "jwd";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // Simpan data ke database
    $query = "INSERT INTO messages (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $success = "Pesan Anda telah berhasil dikirim!";
    } else {
        $error = "Gagal mengirim pesan. Silakan coba lagi!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Hubungi Kami</title>
</head>

<body>
    <h1>Hubungi Kami</h1>
    <?php if (isset($success)) { ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php } ?>
    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Pesan:</label><br>
        <textarea name="pesan" required></textarea><br><br>

        <input type="submit" value="Kirim Pesan">
    </form>
</body>

</html>

<?php
mysqli_close($conn);
?>
