<?php
include '../config/config.php';


function processData($name, $kategori, $soal) {
    return [
        "nama" => htmlspecialchars($name),
        "kategori" => htmlspecialchars($kategori),
        "Soal" => htmlspecialchars($soal)
    ];
}

// Fungsi untuk menyimpan data ke database
function saveToDatabase($pdo, $data) {
    try {
        $stmt = $pdo->prepare("INSERT INTO soal (nama, kategori, soal) VALUES (:nama, :kategori, :soal)");
        $stmt->execute([
            ':nama' => $data["nama"],
            ':kategori' => $data["kategori"],
            ':soal' => $data["Soal"]
        ]);
        
        $_SESSION['message'] = "Data berhasil disimpan!";
        header("Location: ../../index.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Fungsi untuk mengambil data dari database
function getDataFromDatabase($pdo) {
    try {
        $stmt = $pdo->query("SELECT name, kategori, soal FROM soal");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

// Memproses form saat dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $soal = $_POST['soal'];

    $result = processData($name, $kategori, $soal);
    
    // Menyimpan data ke database
    saveToDatabase($pdo, $result);
}

// Mengambil dan menampilkan data dari database
$dataList = getDataFromDatabase($pdo);


?>