<div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
    <div class="flex justify-end p-2">
        <button onclick="closeModal('new-data')" type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
            <h1 class="ri-close-circle-line font-bold text-2xl"></h1>
        </button>
    </div>

    <div class="p-6 pt-0">
        <div>
            <form action="./app/controller/new_data.php" method="POST">
                <div class="mb-4 max-w-sm mx-auto">
                    <label class="block text-gray-700 font-bold mb-2" for="email">
                        Nama
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:shadow-outline border"
                        id="Nama" type="text" placeholder="Nama" name="nama" require />
                </div>
                <div class="mb-4 max-w-sm mx-auto">
                    <label class="block text-gray-700 font-bold mb-2" for="Category">
                        Category
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:shadow-outline border"
                        id="Category" type="text" placeholder="Category" name="kategori" require />
                </div>
                <div class="mb-4 max-w-sm mx-auto">
                    <label class="block text-gray-700 font-bold mb-2" for="soal">
                        Soal
                    </label>
                    <textarea rows="3" id="soal" name="soal"
                        class="appearance-none block w-full text-gray-800 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        require></textarea>
                </div>
                <button type="submit"
                    class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>