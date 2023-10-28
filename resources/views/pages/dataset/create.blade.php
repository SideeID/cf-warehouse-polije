@extends('layouts.main')

@section('konten')
<div class="flex-1 flex justify-center items-center my-4"> <!-- Tambahkan margin atas dan bawah di sini -->
    <div class=" mt-2 flex flex-col min-h-full w-4/5 md:w-[80%] py-8">
        <form id="form" action="{{ route('dataset.create') }}" method="post" enctype="multipart/form-data" class="border-2 rounded-lg p-6">
        @csrf
        <div class="text-center">
            <p id="d_title" class="font-poppins-semibold text-2xl my-4">Tambah Data</p>
        </div>
        <label for="i_judul" class="font-poppins-semibold text-lg py-2 required">Judul</label>
        <input class="border-2 px-3 py-2 rounded-lg w-full" type="text" name="judul" id="i_judul" id="" placeholder="Berikan judul yang deskriptif dan jelas pada file">

        <label for="i_deskripsi" class="font-poppins-semibold text-lg py-2 required">Deskripsi</label>
        <textarea class="border-2 px-3 py-2 rounded-lg w-full min-h-[200px]" name="deskripsi" id="i_deskripsi" placeholder="berikan informasi tambahan sebanyak-banyaknya"></textarea>
        <label for="i_file" class="font-poppins-semibold text-lg py-2 required">Files</label>
        <div class="w-full flex min-h-[150px] border-2 rounded-lg relative justify-center items-center flex-col gap-2">
            <div id="image_file">
                <svg xmlns="http://www.w3.org/2000/svg" width="85" height="60" viewBox="0 0 85 60" fill="none">
                    <path
                        d="M42.5 0.625C31.5562 0.625 22.95 8.93906 21.7467 19.5508C19.4322 19.9237 17.2615 20.9155 15.4646 22.4212C13.6676 23.9269 12.3111 25.8904 11.5387 28.1039C5.00437 29.9872 0 35.815 0 43.125C0 51.9544 7.10813 59.0625 15.9375 59.0625H69.0625C77.8919 59.0625 85 51.9544 85 43.125C85 38.45 82.7289 34.2638 79.4378 31.3366C78.8216 22.0025 71.3761 14.5544 62.0075 14.0709C58.8094 6.29078 51.4728 0.625 42.5 0.625ZM42.5 5.9375C49.8366 5.9375 55.7016 10.6391 57.7734 17.3062L58.3578 19.2188H61.0938C68.4117 19.2188 74.375 25.182 74.375 32.5V33.8281L75.4534 34.6595C76.755 35.6571 77.8126 36.9376 78.5462 38.4043C79.2797 39.8709 79.67 41.4852 79.6875 43.125C79.6875 49.1706 75.1081 53.75 69.0625 53.75H15.9375C9.89188 53.75 5.3125 49.1706 5.3125 43.125C5.3125 37.7594 9.16406 33.5944 14.025 32.7497L15.7702 32.4177L16.1022 30.6698C16.8991 27.0919 20.0706 24.5312 23.9062 24.5312H26.5625V21.875C26.5625 12.9234 33.5484 5.9375 42.5 5.9375ZM42.5 20.7966L40.5875 22.6214L29.9625 33.2464L33.7875 37.0714L39.8438 31.0045V48.4375H45.1562V31.0045L51.2125 37.0661L55.0375 33.2411L44.4125 22.6161L42.5 20.7966Z"
                        fill="#4C5966" />
                </svg>
            </div>
            <p id="name_file">Klik untuk upload</p>

            <input onchange="loadFile(this)" class="border-2 px-3 py-2 rounded-lg w-full h-full opacity-0 absolute" type="file" name="file" id="i_file">
        </div>
        <label for="paper" class="font-poppins-semibold text-lg py-2 mt-6">Paper</label>
        <div id="konten_paper" class="gap-2 flex flex-col">
        </div>
        <p onclick="tambahPaper()" class="hover:text-orange-500 mt-2 text-center">+ Tambah Paper</p>

        <button onclick="prosesDataset()" type="button" class="w-full bg-green-400 hover.bg-green-500 py-2 text-white rounded-md mt-6">Simpan</button>
    </form>
    </div>
</div>
@endsection

@section('otherjs')
    <script src="/js/KelolahDataset.js"></script>
@endsection
