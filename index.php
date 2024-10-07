<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Spine Wheel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="icon" type="x-icon" href="src/assets/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
    #spin {
        background: #fafafa !important;
        border: solid 3px black;
        color: black !important;
    }

    #wheel {
        font-weight: 300;
        font-size: 1px !important;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-30px);
        }

        60% {
            transform: translateY(-15px);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out forwards;
    }

    .animate-bounce {
        animation: bounce 2s infinite;
    }

    #data-soal_length,
    #data-soal_filter {
        margin-bottom: 10px;
    }
    </style>
</head>

<body id="gridContainer" class="bg-neutral-700">
    <div class="grid md:grid-cols-2 gap-2 md:h-screen">
        <div class="w-full p-10">
            <?php include './app/components/spin.php' ?>
        </div>
        <div id="tabelDataDiv" class="w-full p-10">
            <?php include './app/components/tabel-data.php' ?>
            <div class="flex gap-4">

                <div class="mt-4">
                    <select id="song-select"
                        class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="./src/audio/show.mp3">Song 1</option>
                        <option value="./src/audio/show2.mp3">Song 2</option>
                        <option value="./src/audio/show3.mp3">Song 3</option>
                        <option value="./src/audio/show4.mp3">Song 4</option>

                    </select>
                </div>
                <button id="audio-btn"
                    class="bg-blue-500 mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Play Audio
                </button>
            </div>
        </div>
    </div>
    <!-- Modal New Data -->
    <div id="new-data" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
        <?php include './app/components/model-new-data.php' ?>
    </div>
    <!-- Modal Import Data -->
    <div id="import-data"
        class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
        <?php include './app/components/model-import-data.php' ?>
    </div>
    <audio id="hidden-audio" hidden autoplay>
        <source src="./src/audio/show.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <audio id="yerrSound" hidden>
        <source src="./src/audio/yeay.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <!-- Java  -->
    <script>
    const sectors = <?php echo $json_data; ?>;
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="src/js/spin.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="./src/js/model.js"></script>
    <script src="./src/js/upload.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./src/js/checkbook.js"></script>
    <script src="./src/js/main.js"></script>

    <script>
    const audioElement = $('#hidden-audio')[0]; // Mengakses elemen audio langsung
    const songSelect = $('#song-select');
    const playButton = $('#audio-btn');

    // Play audio when button is clicked
    playButton.on('click', function() {
        audioElement.play();
    });

    // Change song and auto-play when song is selected
    songSelect.on('change', function() {
        const selectedSong = $(this).val();
        audioElement.src = selectedSong; // Mengubah src langsung pada elemen audio
        audioElement.load(); // Reload audio element to update the source
        audioElement.play(); // Auto play the new song
    });
    </script>
</body>

</html>