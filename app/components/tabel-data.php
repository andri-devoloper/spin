<?php
include './app/config/config.php';

$sql = "SELECT * FROM soal";
$stmt = $pdo->query($sql); 
$dataList = $stmt->fetchAll(PDO::FETCH_ASSOC); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ids'])) {
    $ids = $_POST['ids'];
    if (!empty($ids)) {
        // Perbaiki ids menjadi array
        $placeholders = rtrim(str_repeat('?,', count($ids)), ',');
        $delete = "DELETE FROM soal WHERE id IN ($placeholders)";
        
        $stmt = $pdo->prepare($delete);
        $stmt->execute($ids);

        // Redirect to avoid form resubmission on refresh
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

?>


<div class="p-2 bg-white rounded-xl">
    <div class="flex justify-between mb-3 gap-2">
        <button onclick="openModal('new-data')"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold text-xs md:text-sm py-2 px-4 border-b-4 border-blue-700 rounded transform transition duration-200 ease-in-out hover:-translate-y-1 hover:scale-110">
            New Data
        </button>
        <button onclick="openModal('import-data')"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold text-xs md:text-sm py-2 px-4 border-b-4 border-blue-700 rounded transform transition duration-200 ease-in-out hover:-translate-y-1 hover:scale-110">
            Import Data
        </button>
        <button id="delete-btn" type="button"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold text-xs md:text-sm py-2 px-4 border-b-4 border-blue-700 rounded transform transition duration-200 ease-in-out hover:-translate-y-1 hover:scale-110"
            disabled onclick="deleteSelected()">
            Delete
        </button>
        <button id="hidden-btn"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold text-xs md:text-sm py-2 px-4 border-b-4 border-blue-700 rounded transform transition duration-200 ease-in-out hover:-translate-y-1 hover:scale-110">
            Hidden
        </button>
    </div>
    <form id="delete-form" method="POST" action="">
        <div id="data-table" class="overflow-hidden">
            <table id="data-soal" class="min-w-full divide-y divide-gray-200 bg-gray-50">
                <thead class="bg-gray-200">
                    <tr class="text-gray-900">
                        <th scope="col" class="py-3 px-4 pe-0">
                            <div class="flex items-center h-5">
                                <input id="select-all" type="checkbox" name="all"
                                    class="border-gray-200 rounded text-blue-600 focus:ring-blue-900" />
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-900 uppercase">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-900 uppercase">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-900 uppercase">
                            Soal
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <?php if (!empty($dataList)): ?>
                    <?php foreach ($dataList as $data): ?>
                    <tr>
                        <td class="py-3 ps-4">
                            <div class="flex items-center h-5">
                                <input type="checkbox" data-id="<?= htmlspecialchars($data['id']) ?>"
                                    class="border-gray-200 checkbox-item rounded text-blue-600 focus:ring-blue-500" />
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                            <?= htmlspecialchars($data['nama']) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <?= htmlspecialchars($data['kategori']) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <?= htmlspecialchars($data['soal']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="3" class="py-2 px-4 border-b text-center">Tidak ada data yang tersedia.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </form>
</div>