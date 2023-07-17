<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi data (Contoh: cek keunikan username)

    // Simpan data ke database
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "jwd";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php"); // Arahkan kembali ke halaman login setelah registrasi sukses
        exit();
    } else {
        $error = "Gagal melakukan registrasi!";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Registrasi</title>
</head>

<body>
    <h1>Halaman Registrasi</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="register.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>

</html>
