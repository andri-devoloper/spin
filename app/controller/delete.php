<?php
include './app/config/config.php';

// Mendapatkan data dari request body
$data = json_decode(file_get_contents('php://input'), true);

// Pastikan 'ids' dikirim dan merupakan array
if (isset($data['ids']) && is_array($data['ids'])) {
    // Buat query untuk menghapus data berdasarkan ID yang dipilih
    $ids = $data['ids'];
    $placeholders = rtrim(str_repeat('?,', count($ids)), ','); // Buat placeholder seperti '?,?,?' sesuai jumlah ID
    $sql = "DELETE FROM soal WHERE id IN ($placeholders)";

    $stmt = $pdo->prepare($sql);

    try {
        // Eksekusi query
        if ($stmt->execute($ids)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal menghapus data']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID tidak valid']);
}

?>