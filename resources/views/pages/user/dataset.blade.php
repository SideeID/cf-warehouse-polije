@extends('layouts.main')

@section('onstart')
    loadJenisPaper({{ $jenis_paper }})
@endsection

@section('modal')
    {{-- bg hitam --}}
    <div onclick="handleModal()" id="bg"
        class="min-h-screen bg-black fixed flex w-full opacity-0 left-0 top-0 pointer-events-none duration-300 ease-in-out z-[60]">
    </div>

    {{-- dialog --}}
    <form id="form" action="/user/dataset/add" method="post" enctype="multipart/form-data">
        @csrf
        <div id="dialog"
            class="flex flex-col w-full md:w-[60%] md:max-w-[800px] min-h-screen h-full fixed right-0 translate-x-[800px] md:translate-x-[1000px] drop-shadow-xl duration-300 ease-in-out z-[70] bg-white">
            <div class="flex flex-row justify-between items-center border-b-[2px] px-6 py-6">
                <div class="flex flex-row gap-4 items-center">
                    <p id="d_title" class="font-poppins-semibold text-2xl">Tambah Data</p>
                </div>
                <div onclick="handleModal()" class="p-2 hover:bg-slate-200 rounded-md duration-200">
                    <svg class="" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </div>
            <div id="container_form" class="flex w-full h-full flex-col py-6 px-6 overflow-y-auto">
                <label for="i_judul" class="font-poppins-semibold text-lg py-2 required">Judul</label>
                <input class="border-2 px-3 py-2 rounded-lg" type="text" name="judul" id="i_judul">

                <label for="i_deskripsi" class="font-poppins-semibold text-lg py-2 required">Deskripsi</label>
                <textarea class="border-2 px-3 py-2 rounded-lg min-h-[200px]" name="deskripsi" id="i_deskripsi"></textarea>

                <label for="i_file" class="font-poppins-semibold text-lg py-2 required">Files</label>
                <div
                    class="w-full flex min-h-[150px] border-2 rounded-lg relative justify-center items-center flex-col gap-2">
                    <div id="image_file">
                        <svg xmlns="http://www.w3.org/2000/svg" width="85" height="60" viewBox="0 0 85 60"
                            fill="none">
                            <path
                                d="M42.5 0.625C31.5562 0.625 22.95 8.93906 21.7467 19.5508C19.4322 19.9237 17.2615 20.9155 15.4646 22.4212C13.6676 23.9269 12.3111 25.8904 11.5387 28.1039C5.00437 29.9872 0 35.815 0 43.125C0 51.9544 7.10813 59.0625 15.9375 59.0625H69.0625C77.8919 59.0625 85 51.9544 85 43.125C85 38.45 82.7289 34.2638 79.4378 31.3366C78.8216 22.0025 71.3761 14.5544 62.0075 14.0709C58.8094 6.29078 51.4728 0.625 42.5 0.625ZM42.5 5.9375C49.8366 5.9375 55.7016 10.6391 57.7734 17.3062L58.3578 19.2188H61.0938C68.4117 19.2188 74.375 25.182 74.375 32.5V33.8281L75.4534 34.6595C76.755 35.6571 77.8126 36.9376 78.5462 38.4043C79.2797 39.8709 79.67 41.4852 79.6875 43.125C79.6875 49.1706 75.1081 53.75 69.0625 53.75H15.9375C9.89188 53.75 5.3125 49.1706 5.3125 43.125C5.3125 37.7594 9.16406 33.5944 14.025 32.7497L15.7702 32.4177L16.1022 30.6698C16.8991 27.0919 20.0706 24.5312 23.9062 24.5312H26.5625V21.875C26.5625 12.9234 33.5484 5.9375 42.5 5.9375ZM42.5 20.7966L40.5875 22.6214L29.9625 33.2464L33.7875 37.0714L39.8438 31.0045V48.4375H45.1562V31.0045L51.2125 37.0661L55.0375 33.2411L44.4125 22.6161L42.5 20.7966Z"
                                fill="#4C5966" />
                        </svg>
                    </div>
                    <p id="name_file">Klik untuk upload</p>

                    <input onchange="loadFile(this)" class="border-2 px-3 py-2 rounded-lg w-full h-full opacity-0 absolute"
                        type="file" name="file" id="i_file">
                </div>

                <label for="paper" class="font-poppins-semibold text-lg py-2 mt-6 border-b-2">Paper</label>
                <div id="konten_paper" class="gap-2 flex flex-col">
                    {{-- <div
                        class="flex flex-col md:flex-row md:justify-between gap-3 border-2 px-3 rounded-lg pt-2 pb-8 bg-gray-100 relative">
                        <div class="bg-red-500 absolute right-4 py-1 rounded-md px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18" viewBox="0 0 14 18"
                                fill="none">
                                <path
                                    d="M0.958333 15.3333C0.958333 16.3875 1.82083 17.25 2.875 17.25H10.5417C11.5958 17.25 12.4583 16.3875 12.4583 15.3333V3.83333H0.958333V15.3333ZM13.4167 0.958333H10.0625L9.10417 0H4.3125L3.35417 0.958333H0V2.875H13.4167V0.958333Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="paper1" class="font-poppins-semibold text-lg py-2 border-b-2">Nama Paper</label>
                            <input class="border-2 px-3 py-2 rounded-lg" type="text" name="" id="paper1">
                        </div>
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="jenis1" class="font-poppins-semibold text-lg py-2 border-b-2">Jenis Paper</label>
                            <input class="border-2 px-3 py-2 rounded-lg" type="text" name="" id="jenis1">
                        </div>
                    </div> --}}

                </div>
                <p onclick="tambahPaper()" class="hover:text-orange-500 mt-2">+ Tambah Paper</p>

                <button onclick="prosesDataset()" type="button"
                    class="w-full bg-green-400 hover:bg-green-500 py-2 text-white rounded-md mt-6">Simpan</button>

            </div>

        </div>
    </form>
@endsection

@section('konten')
    <div class="flex flex-col min-h-full w-full py-8 px-4">

        <h1 class="font-poppins-semibold text-2xl">Kelolah Dataset</h1>
        <div class="flex flex-col md:flex-row md:justify-between items-start md:items-center">
            <div class="flex flex-row gap-3">
                <p class="">Buat Database Baru,</p>
                <p onclick="handleModal()" class="cursor-pointer text-blue-600">disini</p>
            </div>
            <div class="flex flex-row border-2 px-4 border-gray-300 rounded-xl items-center w-full md:w-[30%] mt-6 md:mt-0">
                <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                    fill="none">
                    <path
                        d="M14.2574 11.821C14.8132 10.7172 15.1131 9.48331 15.1131 8.19489C15.1131 6.12164 14.3413 4.17009 12.9458 2.70118C10.0588 -0.328943 5.36039 -0.328943 2.47336 2.70118C-0.413646 5.73133 -0.413646 10.6627 2.47336 13.6928C3.91689 15.2078 5.81224 15.9633 7.70759 15.9633C8.89918 15.9633 10.0868 15.6653 11.1664 15.0694L14.4853 18.5528L17.5762 15.3044L14.2574 11.821ZM3.04118 13.0968C0.46606 10.394 0.46606 5.99991 3.04118 3.29713C4.32873 1.94575 6.01617 1.27006 7.70759 1.27006C9.39901 1.27006 11.0904 1.94575 12.378 3.29713C13.6256 4.60238 14.3133 6.34406 14.3133 8.19489C14.3133 10.0499 13.6256 11.7916 12.378 13.0968C9.80287 15.7996 5.61631 15.7996 3.04118 13.0968ZM18.8598 16.6516L18.14 15.8961L15.0491 19.1445L15.7688 19.8999C16.1927 20.3448 16.7525 20.5714 17.3123 20.5714C17.8721 20.5714 18.4319 20.3448 18.8598 19.8999C19.7115 19.006 19.7115 17.5455 18.8598 16.6516Z"
                        fill="#757575" />
                </svg>
                <form action="/user/dataset" method="get">
                    <input class="py-3 px-3 border-transparent outline-none w-full flex" type="text" name="search"
                        id="" placeholder="Cari disini.." value="{{ Request::query('search', '') }}">
                </form>
            </div>
        </div>
        @if (count($data) != 0)
            <div class="grid grid-cols-1 md:grid-cols-2 w-full h-fit gap-10 mt-6">
                @foreach ($data as $item)
                    <div class="flex flex-col  py-4 px-6 bg-gray-100 rounded-xl relative overflow-hidden h-fit  ">

                        <h1 class="font-poppins-semibold text-lg py-2">{{ $item->nama_data }}</h1>
                        <p class="line-clamp-2 text-sm text-gray-500">{{ $item->deskripsi_data }}</p>
                        <p
                            class="font-poppins-medium text-xs mt-4 {{ $item->valid == 0 ? 'text-red-500' : 'text-green-500' }}">
                            {{ $item->valid == 0 ? 'Menunggu Konfirmasi' : 'Telah Dikonfirmasi' }}</p>
                        <div class="flex flex-row justify-between mt-6">
                            <div class="flex flex-row gap-3 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15"
                                    viewBox="0 0 20 15" fill="none">
                                    <path
                                        d="M4.50049 12.5H15.2001V11.25H4.50049M15.2001 5.625H12.1431V1.875H7.55752V5.625H4.50049L9.8503 10L15.2001 5.625Z"
                                        fill="black" />
                                </svg>
                                <p>{{ $item->download_count }}</p>
                            </div>
                            <div class="flex flex-row gap-2">
                                <div onclick="handleEdit({{ $item }})" class="hover:bg-gray-200 p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M3 17.25V21H6.75L17.81 9.94L14.06 6.19L3 17.25ZM20.71 7.04C20.8027 6.94749 20.8763 6.8376 20.9264 6.71663C20.9766 6.59565 21.0024 6.46597 21.0024 6.335C21.0024 6.20403 20.9766 6.07435 20.9264 5.95338C20.8763 5.83241 20.8027 5.72252 20.71 5.63L18.37 3.29C18.2775 3.1973 18.1676 3.12375 18.0466 3.07357C17.9257 3.02339 17.796 2.99756 17.665 2.99756C17.534 2.99756 17.4043 3.02339 17.2834 3.07357C17.1624 3.12375 17.0525 3.1973 16.96 3.29L15.13 5.12L18.88 8.87L20.71 7.04Z"
                                            fill="black" />
                                    </svg>
                                </div>
                                <div onclick="handleDelete('/user/dataset/delete/{{ $item->id_data }}?token={{ csrf_token() }}')" class="hover:bg-gray-200 p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M6 19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V7H6V19ZM19 4H15.5L14.5 3H9.5L8.5 4H5V6H19V4Z"
                                            fill="black" />
                                    </svg>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div
                class="mt-4 flex flex-col justify-end md:flex-row md:justify-between gap-2 py-2 items-center md:items-end flex-1">
                {{ $data->onEachSide(2)->links('components.pagination') }}
            </div>
        @else
            <div class="flex w-full h-full items-center flex-col justify-center">
                <img class="h-96" src="/assets/images/nodata.svg" alt="nodata">
                <p class="font-poppins-semibold text-lg">Tidak ada data</p>
            </div>
        @endif
    </div>
@endsection

@section('otherjs')
    <script src="/js/KelolahDataset.js"></script>
@endsection
