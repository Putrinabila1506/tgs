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
            width: 75%;
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
        echo "<td>{$kode_barang[$i]}</td>";
        echo "<td>{$nama_barang[$i]}</td>";
        echo "<td>" . number_format($harga_barang[$i], 0, ',', '.') . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // ===== Commit 7 – Perhitungan Total dengan foreach =====
    echo "<h2 style='text-align:center;'>Detail Pembelian (Simulasi)</h2>";

    // Data pembelian simulasi
    $pembelian = [
        ["kode" => "BRG001", "nama" => "Kopi Kapal Api", "harga" => 5000, "jumlah" => 3],
        ["kode" => "BRG003", "nama" => "Indomie Goreng", "harga" => 3500, "jumlah" => 5],
        ["kode" => "BRG005", "nama" => "Chitato", "harga" => 10000, "jumlah" => 2],
    ];

    echo "<table>";
    echo "<tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga (Rp)</th>
            <th>Jumlah Beli</th>
            <th>Total (Rp)</th>
          </tr>";

    $grandtotal = 0;

    // Gunakan foreach untuk menghitung total per item
    foreach ($pembelian as $item) {
        $total = $item['harga'] * $item['jumlah'];
        $grandtotal += $total;

        echo "<tr>";
        echo "<td>{$item['kode']}</td>";
        echo "<td>{$item['nama']}</td>";
        echo "<td>" . number_format($item['harga'], 0, ',', '.') . "</td>";
        echo "<td>{$item['jumlah']}</td>";
        echo "<td>" . number_format($total, 0, ',', '.') . "</td>";
        echo "</tr>";
    }

    echo "<tr style='font-weight:bold; background-color:#e0f7f7;'>
            <td colspan='4'>Grand Total</td>
            <td>Rp " . number_format($grandtotal, 0, ',', '.') . "</td>
          </tr>";
    echo "</table>";
    ?>

    <a class="logout" href="logout.php">Logout</a>
</body>
</html>
