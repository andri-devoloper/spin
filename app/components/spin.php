<?php

include './app/config/config.php';

// Fetching data from the soal table
$sql = "SELECT * FROM soal";
try {
    $stmt = $pdo->query($sql);
    $sectors = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $sectors[] = [
            'label' => $row['nama'],
            'text' => "#fafafa",
            'question' => $row['soal']
        ];
    }
    
    $json_data = json_encode($sectors);

} catch (PDOException $e) {
    echo "<script>console.error('Error fetching data: " . $e->getMessage() . "');</script>";
}
?>

<div id="spin_the_wheel" class="relative bg-white rounded-xl h-full flex justify-center items-center p-2 relative">
    <button id="fullscreenBtn" class="absolute top-5 end-6 text-2xl">
        <i class="ri-arrow-right-fill"></i>
    </button>
    <canvas id="wheel" width="500" height="500" class="max-w-full h-auto"></canvas>
    <div id="spin"
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-full text-center h-32 w-32 md:w-40 md:h-40 flex justify-center items-center cursor-pointer font-bold max-w-md mx-auto">
        SPIN
    </div>
</div>