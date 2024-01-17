
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pemesanan Futsal</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ambil data dari URL jika sudah disubmit
    $namaPemesan = isset($_GET['nama_pemesan']) ? $_GET['nama_pemesan'] : '';
    $alamatPemesan = isset($_GET['alamat_pemesan']) ? $_GET['alamat_pemesan'] : '';
    $jenisKelamin = isset($_GET['jenis_kelamin']) ? $_GET['jenis_kelamin'] : '';
    $nomorhp = isset($_GET['nomor_hp']) ? $_GET['nomor_hp'] : '';
    $namateam = isset($_GET['nama_team']) ? $_GET['nama_team'] : '';
    $tanggalPemesanan = isset($_GET['tanggal_pemesanan']) ? $_GET['tanggal_pemesanan'] : '';
    $waktuPemesanan = isset($_GET['waktu_pemesanan']) ? $_GET['waktu_pemesanan'] : '';
    $jumlahPemain = isset($_GET['jumlah_pemain']) ? $_GET['jumlah_pemain'] : '';

    // Tampilkan hasil
    if (!empty($namaPemesan) && !empty($tanggalPemesanan) && !empty($waktuPemesanan) && !empty($jumlahPemain)) {
        echo "<h3>pemesanan atas nama, $namaPemesan!</h3>";
        echo "<p> $namaPemesan ,$alamatPemesan ,$jenisKelamin, $nomorhp,$namateam,$tanggalPemesanan,waktu main $waktuPemesanan, untuk $jumlahPemain pemain berhasil dicatat.</p>";
    }
}
?>

<h2>Formulir Pemesanan Futsal Tanah merah</h2>
<form method="get" action="">
<label for="nama_pemesan">Nama Pemesan:</label>
    <input type="text" name="nama_pemesan" required><br>

    <label for="alamat_pemesan">Alamat Pemesan:</label>
    <input type="text" name="alamat_pemesan" required><br>

    <label>Jenis Kelamin:</label>
    <input type="radio" name="jenis_kelamin" value="Laki-laki" id="laki-laki" required>
    <label for="laki-laki">Laki-laki</label>
    
    <input type="radio" name="jenis_kelamin" value="Perempuan" id="perempuan" required>
    <label for="perempuan">Perempuan</label><br>


    <label for="nomor_hp">Nomor HP:</label>
    <input type="text" name="nomor_hp" required><br>

    <label for="nama_team">Nama Team:</label>
    <input type="text" name="nama_team" required><br>

    <label for="tanggal_pemesanan">Tanggal Pemesanan:</label>
    <input type="date" name="tanggal_pemesanan" required><br>

    <label for="waktu_pemesanan">Waktu Pemesanan:</label>
    <input type="time" name="waktu_pemesanan" required><br>

    <label for="jumlah_pemain">Jumlah Pemain:</label>
    <input type="number" name="jumlah_pemain" required><br>

    <input type="submit" value="Pesan">

</form>

</body>
</html>
