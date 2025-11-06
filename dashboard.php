<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 30px;
        }
        h1 {
            color: #008080;
            text-align: center;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 70%;
        }
        table, th, td {
            border: 1px solid #555;
        }
        th {
            background-color: #008080;
            color: white;
            padding: 10px;
        }
        td {
            text-align: center;
            padding: 8px;
            background-color: #fff;
        }
        .logout {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            background-color: #008080;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
        }
        .logout:hover {
            background-color: #006666;
        }
        hr {
            width: 80%;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>-- POLGAN MART --</h1>
    <h3 style="text-align:center;">Selamat Datang, 
        <?php echo $_SESSION['username']; ?> 
        (<?php echo $_SESSION['role']; ?>)
    </h3>

    <hr>

    <?php
    // ===== Commit 5 – Setup Awal Dashboard Penjualan =====
    $kode_barang = ["BRG001", "BRG002", "BRG003", "BRG004", "BRG005"];
    $nama_barang = ["Kopi Kapal Api", "Teh Sosro", "Indomie Goreng", "Susu Ultra", "Chitato"];
    $harga_barang = [5000, 4000, 3500, 8000, 10000];

    echo "<h2 style='text-align:center;'>Daftar Produk</h2>";
    echo "<table>";
    echo "<tr><th>Kode Barang</th><th>Nama Barang</th><th>Harga (Rp)</th></tr>";

    for ($i = 0; $i < count($kode_barang); $i++) {
        echo "<tr>";
        echo "<td>" . $kode_barang[$i] . "</td>";
        echo "<td>" . $nama_barang[$i] . "</td>";
        echo "<td>" . number_format($harga_barang[$i], 0, ',', '.') . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // ===== Commit 6 – Logika Penjualan Random =====
    echo "<h2 style='text-align:center;'>Simulasi Transaksi Penjualan (Random)</h2>";

    $beli = [];       // array untuk menyimpan kode barang yang dibeli
    $jumlah = [];     // array untuk jumlah pembelian setiap barang
    $total = [];      // total harga tiap barang
    $grandtotal = 0;  // total semua pembelian

    echo "<table>";
    echo "<tr><th>Kode Barang</th><th>Nama Barang</th><th>Harga (Rp)</th><th>Jumlah Beli</th><th>Total (Rp)</th></tr>";

    // Menampilkan 5 pembelian acak
    for ($i = 0; $i < 5; $i++) {
        $acak = rand(0, count($kode_barang) - 1); // memilih barang acak
        $jumlah_beli = rand(1, 5); // jumlah acak antara 1–5

        $beli[] = $kode_barang[$acak];
        $jumlah[] = $jumlah_beli;
        $total_harga = $harga_barang[$acak] * $jumlah_beli;
        $total[] = $total_harga;
        $grandtotal += $total_harga;

        echo "<tr>";
        echo "<td>" . $kode_barang[$acak] . "</td>";
        echo "<td>" . $nama_barang[$acak] . "</td>";
        echo "<td>" . number_format($harga_barang[$acak], 0, ',', '.') . "</td>";
        echo "<td>" . $jumlah_beli . "</td>";
        echo "<td>" . number_format($total_harga, 0, ',', '.') . "</td>";
        echo "</tr>";
    }

    echo "<tr style='font-weight:bold; background-color:#e0f7f7;'>";
    echo "<td colspan='4'>Grand Total</td>";
    echo "<td>Rp " . number_format($grandtotal, 0, ',', '.') . "</td>";
    echo "</tr>";
    echo "</table>";
    ?>

    <a class="logout" href="logout.php">Logout</a>
</body>
</html>
