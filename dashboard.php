<?php
session_start();

// Cegah akses tanpa login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil data session
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #00c9a7, #92fe9d);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .dashboard {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            width: 400px;
            text-align: center;
        }
        a.logout {
            display: inline-block;
            margin-top: 15px;
            background: #ff5f5f;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
        }
        a.logout:hover {
            background: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Selamat Datang, <?php echo htmlspecialchars($username); ?>!</h2>
        <p><strong>Role:</strong> <?php echo htmlspecialchars($role); ?></p>
        <p>Anda berhasil login ke sistem.</p>
        <a class="logout" href="logout.php">Logout</a>
    </div>
</body>
</html>
