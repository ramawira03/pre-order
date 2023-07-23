<?php
// Proses penyimpanan data ke database MySQL jika ada data yang dikirim melalui form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "pembelidb";

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Mendapatkan data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];

    // Menyimpan data ke dalam database
    $sql = "INSERT INTO pembeli (nama, alamat, telepon, nama_barang, jumlah_barang) 
            VALUES ('$nama', '$alamat', '$telepon', '$nama_barang', '$jumlah_barang')";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Data pembeli berhasil disimpan.");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pre-order Website</title>
    <style>
        body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
}

header {
    background-color: #cc9900;
    padding: 20px;
    text-align: center;
    color: #fff;
}

.logo {
    width: 25%;
    border: solid 1px #fff, #030303;
}

/* input data pembeli */
.inputData {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);;
}

form {
    width: 100%;
    margin: 0;
    padding: 0;
}

input {
    width: inherit;
    height: inherit;
    margin: inherit;
}

.button {
    border: 1px solid  #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
    color: #fff;
    background-color: #cc9900;

}

/* menu utama bagian nama barang */
section, .namaBarang {
    padding: 20px;
}

h1 {
    color: #fff;
}

h2, h3, h5{
    color: #cc9900;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

li:hover {
    background-color: #f5f5f5;
}

.wrap {
    margin-left: 25px;
    width: 65%;
    
}

/* footer menu */
footer {
    background-color: #cc9900;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: relative;
    bottom: 0;
    width: 100%;
}

.imgFoot {
    width: 200px;
    object-fit: cover;
}

p {
    margin: 1%;
}
    </style>
</head>
<body>
    <header>
        <img class="logo" src="logo.png" alt="Logo MBAKO RESSO">
        <h1>MBAKO RESSO Pre-order Website</h1>
    </header>
    <!-- input data pembeli -->
    <section class="inputData">
        <h2>Form Data Pembeli</h2>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            <br>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>
            <br>
            <label for="telepon">Nomor Telepon:</label>
            <input type="text" id="telepon" name="telepon" required>
            <br>
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" required>
            <br>
            <label for="jumlah_barang">Jumlah Barang:</label>
            <input type="number" id="jumlah_barang" name="jumlah_barang" required>
            <br>
            <input class="button" type="submit" value="Simpan">
        </form>
    </section>
    <section class="namaBarang">
        <!-- Nama barang pre-order -->
        <h2>Barang Pre-order</h2>
        <p>Di bawah ini adalah beberapa barang yang sedang tersedia untuk pre-order:</p>
        <ul>
            <li>
                <h3>KOREK ZIPPO</h3>
                <img src="" alt="barang1">
                <p>Deskripsi barang 1. Anda dapat menambahkan lebih banyak informasi tentang barang ini.</p>
                <p>Tanggal mulai pre-order: 15 Agustus 2023</p>
                <p>Tanggal berakhir pre-order: 30 Agustus 2023</p>
            </li>
            <li>
                <h3>PIPA ROKOK</h3>
                <img src="" alt="barang2">
                <p>Deskripsi barang 2. Anda dapat menambahkan lebih banyak informasi tentang barang ini.</p>
                <p>Tanggal mulai pre-order: 20 Agustus 2023</p>
                <p>Tanggal berakhir pre-order: 5 September 2023</p>
            </li>
            <!-- Tambahkan lebih banyak barang pre-order sesuai kebutuhan -->
        </ul>
    </section>
    <!-- navigation menu -->
    <nav>
        <div class="wrap">
            <p style="font-weight: bold;">MBAKO RESSO</p>
            <a href="olshop.id/t/mbakoresso" style="color: #cc9900;">olshop.id/t/mbakoresso</a><br>
            <img class="imgFoot" src="toko.jpg" alt="gambar toko">
            <address>Gg. Reog Rt5 Rw2 Desa Srikaton, Adiluwih, Pringsewu<br>
                Kab. Pringsewu Lampung <br>
                Telp: 085890603840
            </address>
            <hr>
        </div>
        <div class="wrap">
            <p style="font-weight: bold;">Kontak</p>
            
        </div>
    </nav>
    <footer>
        <p>&copy; 2023 Pre-order Website. All rights reserved.</p>
    </footer>
</body>
</html>
