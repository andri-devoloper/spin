<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'spin-wheel';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "<script>console.log('Koneksi berhasil');</script>";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo "<script>console.error('Koneksi gagal: " . $conn->connect_error . "');</script>"; 
    exit;
}

?>