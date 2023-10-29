@extends('layouts.main')

@section('header')
    Telah Dikonfirmasi
@endsection

@section('modal')
    {{-- bg hitam --}}
    <div onclick="handleModal()" id="bg"
        class="min-h-screen bg-black fixed flex w-full opacity-0 left-0 top-0 pointer-events-none duration-300 ease-in-out z-[60]">
    </div>

    {{-- dialog --}}
    <di id="dialog"
        class="flex flex-col w-full md:w-[60%] md:max-w-[800px] min-h-screen h-full fixed right-0 translate-x-[800px] md:translate-x-[1000px] drop-shadow-xl duration-300 ease-in-out z-[70] bg-white">
        <div class="flex flex-row justify-between items-center border-b-[2px] px-6 py-6">
            <div class="flex flex-row gap-4 items-center">
                <p id="d_title" class="font-poppins-semibold text-2xl">Hand Recognition Dataset</p>
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
        <div class="flex w-full h-full flex-col py-6 px-6 overflow-y-auto ">
            <h1 class="font-poppins-semibold text-2xl py-1">Deskripsi</h1>
            <div id="d_deskripsi" class="whitespace-pre-line h-fit">Lorem ipsum dolor sit amet, consectetur adipisicing
                elit. Repudiandae, in
                ex! Nam nobis doloribus nisi.
                Cumque dolorum exercitationem eveniet pariatur sint iusto officia eligendi, quas accusamus necessitatibus
                quasi ipsam blanditiis quis mollitia dolores doloribus illo minus nemo? Beatae, repellendus odit.

                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque dolores voluptatibus autem a necessitatibus
                vero voluptate, voluptas vel delectus ad neque rerum rem numquam placeat assumenda nihil aspernatur
                explicabo reiciendis laudantium. Accusamus aspernatur expedita quasi tenetur inventore, laudantium unde
                aliquam?

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem cupiditate earum repellat neque perferendis
                illo soluta, itaque at numquam? Consectetur magni facilis optio obcaecati eligendi dolores nostrum odit modi
                totam.
            </div>

            <h1 class="font-poppins-semibold text-2xl py-1 mt-4">Files</h1>
            <a href="#" id="d_file"
                class="border-b-2 border-b-blue-700 w-fit pb-3 text-blue-700 hover:border-b-blue-800 hover:text-blue-800 cursor-pointer">
                gesture-recognition.zip</a>
            <h1 class="font-poppins-semibold text-2xl py-1 mt-4">Paper</h1>
            <div id="d_paper">
                <div class="flex flex-row gap-3 py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                        fill="none">
                        <path
                            d="M10.2915 7.12498V2.77081L14.6457 7.12498M4.74984 1.58331C3.87109 1.58331 3.1665 2.2879 3.1665 3.16665V15.8333C3.1665 16.2532 3.33332 16.656 3.63025 16.9529C3.92718 17.2498 4.32991 17.4166 4.74984 17.4166H14.2498C14.6698 17.4166 15.0725 17.2498 15.3694 16.9529C15.6664 16.656 15.8332 16.2532 15.8332 15.8333V6.33331L11.0832 1.58331H4.74984Z"
                            fill="black" />
                    </svg>
                    <p>Gesture Recognition based Kiosk</p>
                </div>
                <div class="flex flex-row gap-3 py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                        fill="none">
                        <path
                            d="M10.2915 7.12498V2.77081L14.6457 7.12498M4.74984 1.58331C3.87109 1.58331 3.1665 2.2879 3.1665 3.16665V15.8333C3.1665 16.2532 3.33332 16.656 3.63025 16.9529C3.92718 17.2498 4.32991 17.4166 4.74984 17.4166H14.2498C14.6698 17.4166 15.0725 17.2498 15.3694 16.9529C15.6664 16.656 15.8332 16.2532 15.8332 15.8333V6.33331L11.0832 1.58331H4.74984Z"
                            fill="black" />
                    </svg>
                    <p>Gesture Recognition based Kiosk</p>
                </div>
            </div>
        </div>

    </di>
@endsection

@section('konten')
    <div class="flex flex-col min-h-full w-full py-8 px-4">


        <div class="flex flex-col md:flex-row md:justify-between items-start md:items-center">
            <div class="flex flex-col md:flex-row gap-3 cursor-default items-start md:items-center relative pb-4">
                <a href="/admin/menunggu-konfirmasi"
                    class="font-poppins-medium text-gray-500 text-md hover:bg-slate-100 pr-4 py-3 rounded-md">Menunggu
                    Konfirmasi</a>
                <h1 class="font-poppins-semibold text-md pl-6 md:pl-0">Telah Dikonfirmasi</h1>
                <div class="absolute w-2 h-[50px] bottom-0 bg-slate-700 md:h-2 md:w-[155px] md:bottom-0 md:right-0">

                </div>
            </div>
            <div class="flex flex-row border-2 px-4 border-gray-300 rounded-xl items-center w-full md:w-[30%] mt-6 md:mt-0">
                <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                    fill="none">
                    <path
                        d="M14.2574 11.821C14.8132 10.7172 15.1131 9.48331 15.1131 8.19489C15.1131 6.12164 14.3413 4.17009 12.9458 2.70118C10.0588 -0.328943 5.36039 -0.328943 2.47336 2.70118C-0.413646 5.73133 -0.413646 10.6627 2.47336 13.6928C3.91689 15.2078 5.81224 15.9633 7.70759 15.9633C8.89918 15.9633 10.0868 15.6653 11.1664 15.0694L14.4853 18.5528L17.5762 15.3044L14.2574 11.821ZM3.04118 13.0968C0.46606 10.394 0.46606 5.99991 3.04118 3.29713C4.32873 1.94575 6.01617 1.27006 7.70759 1.27006C9.39901 1.27006 11.0904 1.94575 12.378 3.29713C13.6256 4.60238 14.3133 6.34406 14.3133 8.19489C14.3133 10.0499 13.6256 11.7916 12.378 13.0968C9.80287 15.7996 5.61631 15.7996 3.04118 13.0968ZM18.8598 16.6516L18.14 15.8961L15.0491 19.1445L15.7688 19.8999C16.1927 20.3448 16.7525 20.5714 17.3123 20.5714C17.8721 20.5714 18.4319 20.3448 18.8598 19.8999C19.7115 19.006 19.7115 17.5455 18.8598 16.6516Z"
                        fill="#757575" />
                </svg>
                <form action="/admin/telah-konfirmasi" method="get">
                    <input class="py-3 px-3 border-transparent outline-none w-full flex" type="text" name="search"
                        id="" placeholder="Cari disini.." value="{{ Request::query('search', '') }}">
                </form>
            </div>
        </div>
        @if (count($data) != 0)
            <div class="grid grid-cols-1 md:grid-cols-2 w-full h-fit gap-4 mt-10">
                @foreach ($data as $item)
                    <div class="flex flex-col  py-4 px-6 bg-gray-100 rounded-xl relative h-fit overflow-hidden">
                        <h1 class="font-poppins-semibold text-lg py-2">{{ $item->nama_data }}</h1>
                        <p class="line-clamp-2 text-sm text-gray-500">{{ $item->deskripsi_data }}</p>
                        <div onclick="detailDataset({{ $item }})" class="flex flex-row justify-between mt-12">
                            <div class="bg-slate-500 hover:bg-slate-600 text-white px-2 py-2 rounded-md">Lihat Detail</div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4 flex flex-col justify-end md:flex-row md:justify-between gap-2 py-2 items-center md:items-end flex-1">
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
    <script src="/js/TelahKonfirmasi.js"></script>
@endsection
