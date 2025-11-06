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
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Role: <?php echo $_SESSION['role']; ?></p>
    
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
