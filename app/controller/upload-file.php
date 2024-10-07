<?php
include '../config/config.php';


use Shuchkin\SimpleXLSX;

require_once 'SimpleXLSX.php'; 

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    $allowedTypes = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if (in_array($file['type'], $allowedTypes)) {
        if ($xlsx = SimpleXLSX::parse($file['tmp_name'])) {
            $data = [];
            foreach ($xlsx->rows() as $index => $row) {

                if ($index < 3) {
                    continue; 
                }

                if (isset($row[1]) && isset($row[2]) && isset($row[3])) {

                    $data[] = [$row[1], $row[2], $row[3]];
                } else {

                    continue;
                }
            }

            foreach ($data as $row) {
                $nama = $row[0];
                $category = $row[1];
                $soal = $row[2];

                // Prepare the PDO statement
                $stmt = $pdo->prepare("INSERT INTO soal (nama, kategori, soal) VALUES (?, ?, ?)");
                $stmt->bindValue(1, $nama);
                $stmt->bindValue(2, $category);
                $stmt->bindValue(3, $soal);

                if (!$stmt->execute()) {
                    echo "Error: " . $stmt->errorInfo()[2]; 
                }
            }

            // echo "Data berhasil dimasukkan.";
            $_SESSION['message'] = "Data berhasil dimasukkan!";
            header("Location: ../../index.php");
        } else {
            echo "Terjadi kesalahan saat membaca file Excel.";
        }
    } else {
        echo "Format file tidak valid. Unggah file Excel (xlsx).";
}
}
?>