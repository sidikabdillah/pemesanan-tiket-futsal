<?php
session_start();

// Fungsi untuk memeriksa login
function isUserLoggedIn() {
    return isset($_SESSION["username"]);
}

// Fungsi untuk logout
function logout() {
    session_unset();
    session_destroy();
}

// Fungsi untuk memeriksa form login
function processLoginForm() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Lakukan validasi login (contoh sederhana, sesuaikan dengan kebutuhan)
        if ($username == "user" && $password == "password") {
            // Simpan informasi login, bisa menggunakan session
            $_SESSION["username"] = $username;

            // Redirect ke halaman dashboard setelah login sukses
            header("Location: get.php");
            exit();
        } else {
            echo "Login gagal. Silakan coba lagi.";
        }
    }
}

// Fungsi untuk memeriksa form pemesanan futsal
function processOrderForm() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Proses data pemesanan sesuai kebutuhan
        $lapangan = $_POST["lapangan"];
        $tanggal = $_POST["tanggal"];
        $jam = $_POST["jam"];

        // Tampilkan informasi pemesanan
        echo "Pemesanan berhasil!<br>";
        echo "Lapangan: $lapangan<br>";
        echo "Tanggal Main: $tanggal<br>";
        echo "Jam Main: $jam";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Pemesanan Futsal</title>
</head>
<body>

<?php
// Memproses form login
if (!isUserLoggedIn()) {
    processLoginForm();
?>

    <h2>Login</h2>
    <form action="get.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <input type="submit" value="Login">
    </form>

<?php
} else {
    // Memproses form pemesanan futsal
    processOrderForm();
?>

    <h2>Form Pemesanan Futsal</h2>
    <p>Selamat datang, <?php echo $_SESSION["username"]; ?>! Silakan isi form pemesanan.</p>

    <form action="get.php" method="post">
        <!-- Isi form pemesanan sesuai kebutuhan -->
        <label for="lapangan">Pilih Lapangan:</label>
        <select id="lapangan" name="lapangan" required>
            <option value="lapangan1">Lapangan 1</option>
            <option value="lapangan2">Lapangan 2</option>
        </select>

        <label for="tanggal">Tanggal Main:</label>
        <input type="date" id="tanggal" name="tanggal" required>

        <label for="jam">Jam Main:</label>
        <input type="time" id="jam" name="jam" required>

        <input type="submit" value="Pesan">
    </form>

    <a href="get.php?logout=true">Logout</a>

<?php
}

// Logout jika parameter logout=true
if (isset($_GET["logout"]) && $_GET["logout"] == "true") {
    logout();
    header("Location: get.php");
    exit();
}
?>

</body>
</html>
