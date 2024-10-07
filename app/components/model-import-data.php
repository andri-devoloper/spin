<div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
    <div class="flex justify-end p-2">
        <button onclick="closeModal('import-data')" type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
            <h1 class="ri-close-circle-line font-bold text-2xl"></h1>
        </button>
    </div>

    <div class="p-6 pt-0">
        <div>
            <form action="app/controller/upload-file.php" method="POST" enctype="multipart/form-data">
                <div class="">
                    <label class="mb-5 block text-md text-[#07074D]">
                        Upload File (Excel Only)
                        <a href="../../src/file/soal_kuis.xlsx" class="text-red-500" download><i
                                class="ri-arrow-left-wide-fill text-red"></i><span>Tempalte</span><i
                                class="ri-arrow-right-wide-fill text-red"></i></a>
                    </label>

                    <div class="">
                        <input type="file" name="file" id="file" ccept=".xls,.xlsx, .csv" class="sr-only" />
                        <label for="file"
                            class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center cursor-pointer hover:shadow-lg transition-shadow">
                            <div>
                                <span class="mb-2 block text-md font-semibold text-[#07074D] animate-bounce">
                                    Drop files here
                                </span>
                                <span class="mb-2 block text-base font-medium text-[#6B7280]">
                                    Or
                                </span>
                                <span
                                    class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D] hover:bg-gray-200 transition-colors">
                                    Browse
                                </span>
                            </div>
                        </label>
                    </div>

                    <div class="rounded-md bg-[#F5F7FB] py-4 px-8 file-upload-container opacity-0">
                        <div class="flex items-center justify-between">
                            <span id="file-name" class="truncate pr-3 text-base font-medium text-[#07074D]">
                                No file selected
                            </span>
                            <button type="button" class="text-[#07074D] remove-file">
                                <i class="ri-close-line text-xl"></i>
                            </button>
                        </div>
                        <div class="relative mt-5 h-[6px] w-full rounded-lg bg-[#E2E5EF]">
                            <div class="absolute left-0 h-full w-[0%] rounded-lg bg-[#6A64F1] upload-progress">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>