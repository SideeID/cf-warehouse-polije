@extends('layouts.main')

@section('konten')
    <div class="flex flex-col min-h-full w-full py-8 px-4">


        <div class="flex flex-col md:flex-row md:justify-between items-start md:items-center">
            <div class="flex flex-col md:flex-row gap-3 cursor-default items-start md:items-center relative pb-4">
                <h1 class="font-poppins-semibold text-md pl-6 md:pl-0">Menunggu Konfirmasi</h1>
                <div class="font-poppins-medium text-gray-500 text-md pl-6 md:pl-4 hover:bg-slate-100 pr-4 py-3 rounded-md">
                    Telah Dikonfirmasi.</div>
                <div class="absolute w-2 h-[30px] bg-slate-700 md:h-2 md:w-[185px] md:bottom-0">

                </div>
            </div>
            <div class="flex flex-row border-2 px-4 border-gray-300 rounded-xl items-center w-full md:w-[30%] mt-6 md:mt-0">
                <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                    fill="none">
                    <path
                        d="M14.2574 11.821C14.8132 10.7172 15.1131 9.48331 15.1131 8.19489C15.1131 6.12164 14.3413 4.17009 12.9458 2.70118C10.0588 -0.328943 5.36039 -0.328943 2.47336 2.70118C-0.413646 5.73133 -0.413646 10.6627 2.47336 13.6928C3.91689 15.2078 5.81224 15.9633 7.70759 15.9633C8.89918 15.9633 10.0868 15.6653 11.1664 15.0694L14.4853 18.5528L17.5762 15.3044L14.2574 11.821ZM3.04118 13.0968C0.46606 10.394 0.46606 5.99991 3.04118 3.29713C4.32873 1.94575 6.01617 1.27006 7.70759 1.27006C9.39901 1.27006 11.0904 1.94575 12.378 3.29713C13.6256 4.60238 14.3133 6.34406 14.3133 8.19489C14.3133 10.0499 13.6256 11.7916 12.378 13.0968C9.80287 15.7996 5.61631 15.7996 3.04118 13.0968ZM18.8598 16.6516L18.14 15.8961L15.0491 19.1445L15.7688 19.8999C16.1927 20.3448 16.7525 20.5714 17.3123 20.5714C17.8721 20.5714 18.4319 20.3448 18.8598 19.8999C19.7115 19.006 19.7115 17.5455 18.8598 16.6516Z"
                        fill="#757575" />
                </svg>
                <form action="/admin/menunggu-konfirmasi" method="get">
                    <input class="py-3 px-3 border-transparent outline-none w-full flex" type="text" name="search"
                        id="" placeholder="Cari disini.." value="{{ Request::query('search', '') }}">
                </form>
            </div>
        </div>
        @if (count($data) != 0)
            <div class="grid grid-cols-1 md:grid-cols-2 w-full h-fit gap-10 mt-10 flex-1">
                @foreach ($data as $item)
                    <div class="flex flex-col  py-4 px-6 bg-gray-100 rounded-xl relative overflow-hidden h-fit">
                        <h1 class="font-poppins-semibold text-lg py-2">{{ $item->nama_data }}</h1>
                        <p class="line-clamp-2 text-sm text-gray-500">{{ $item->deskripsi_data }}</p>
                        <div class="flex flex-row justify-between mt-12">
                            <div class="bg-slate-500 hover:bg-slate-600 text-white px-2 py-2 rounded-md">Lihat Detail</div>
                            <div class="flex flex-row gap-3 items-center">
                                <a href="/admin/menunggu-konfirmasi/delete/{{ $item->id_data }}?token={{ csrf_token() }}" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md">✘</a>
                                <a href="/admin/menunggu-konfirmasi/accept/{{ $item->id_data }}?token={{ csrf_token() }}" class="bg-green-400 hover:bg-green-500 px-3 py-2 rounded-md">✓</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4 flex flex-col justify-center md:flex-row md:justify-between gap-2 py-2 items-center">

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
