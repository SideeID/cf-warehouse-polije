@extends('layouts.main')
@section('header')
    Dataset
@endsection
@section('konten')
    <div class="container mx-auto flex flex-col mt-6">
        <div class="flex flex-col md:flex-row items-center justify-between mb-1 px-4">
            <h1 class="text-2xl font-semibold">Browse Dataset</h1>

            <div class="flex flex-row border-2 px-4 border-gray-300 rounded-xl items-center w-full md:w-[30%] mt-6 md:mt-0">
                <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                    fill="none">
                    <path
                        d="M14.2574 11.821C14.8132 10.7172 15.1131 9.48331 15.1131 8.19489C15.1131 6.12164 14.3413 4.17009 12.9458 2.70118C10.0588 -0.328943 5.36039 -0.328943 2.47336 2.70118C-0.413646 5.73133 -0.413646 10.6627 2.47336 13.6928C3.91689 15.2078 5.81224 15.9633 7.70759 15.9633C8.89918 15.9633 10.0868 15.6653 11.1664 15.0694L14.4853 18.5528L17.5762 15.3044L14.2574 11.821ZM3.04118 13.0968C0.46606 10.394 0.46606 5.99991 3.04118 3.29713C4.32873 1.94575 6.01617 1.27006 7.70759 1.27006C9.39901 1.27006 11.0904 1.94575 12.378 3.29713C13.6256 4.60238 14.3133 6.34406 14.3133 8.19489C14.3133 10.0499 13.6256 11.7916 12.378 13.0968C9.80287 15.7996 5.61631 15.7996 3.04118 13.0968ZM18.8598 16.6516L18.14 15.8961L15.0491 19.1445L15.7688 19.8999C16.1927 20.3448 16.7525 20.5714 17.3123 20.5714C17.8721 20.5714 18.4319 20.3448 18.8598 19.8999C19.7115 19.006 19.7115 17.5455 18.8598 16.6516Z"
                        fill="#757575" />
                </svg>
                <form action="{{ route('dataset.dataset') }}" method="get">
                    <input class="py-3 px-3 border-transparent outline-none w-full flex" type="text" name="search"
                        id="" placeholder="Cari disini.." value="{{ Request::query('search', '') }}">
                </form>
            </div>

        </div>
        <div class="mb-2 px-4 mt-6 md:mt-2">
            <label for="sort" class="text-sm font-medium text-gray-600">Sort by:</label>
            <select onchange="sortDataset(this)" id="sort" name="sort"
                class="bg-gray-100 border border-gray-200 rounded-md py-1 px-2 text-sm">
                <option {{ Request::segment(2) == '' ? 'selected' : '' }} value="">All</option>
                <option {{ Request::segment(2) === 'newer' ? 'selected' : '' }} value="newer">Newer</option>
                <option {{ Request::segment(2) === 'popular' ? 'selected' : '' }} value="popular">Popular</option>
            </select>
        </div>
        @if (count($datasets) != 0)
            <div class="flex flex-1 flex-col h-full">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mt-4 px-4">
                    @foreach ($datasets as $item)
                        @php
                            $startDate = \Carbon\Carbon::parse($item->updated_at);
                            $lastUpdate = $startDate->diffInDays(\Carbon\Carbon::now());
                        @endphp

                        <a href="/data/{{ $item->user->email }}/{{ $item->id_data }}"
                            class="w-full flex border-2 rounded-lg h-fit flex-col py-4 overflow-hidden">
                            <div class="px-8">
                                <h1 class="font-poppins-semibold text-xl">{{ $item->nama_data }}</h1>
                                <p class="text-xs text-gray-600">Diperbarui {{ $lastUpdate }} hari yang lalu</p>
                                <p class="line-clamp-2 pt-4">{{ $item->deskripsi_data }}</p>


                            </div>
                            <div class="flex flex-row justify-between gap-2 border-t-2 mt-4 px-8 pt-4">
                                <p>{{ strtoupper(explode('@', $item->user->email)[0]) }}</p>
                                <div class="flex flex-row gap-2">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.5835 18.3333H17.4168V16.5H4.5835M17.4168 8.25H13.7502V2.75H8.25016V8.25H4.5835L11.0002 14.6667L17.4168 8.25Z"
                                            fill="black" />
                                    </svg>
                                    <p>{{ $item->download_count }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div
                    class="mt-4 flex flex-col justify-end md:flex-row md:justify-between gap-2 py-2 items-center md:items-end flex-1 mb-4">

                    {{ $datasets->onEachSide(2)->links('components.pagination') }}
                </div>
            </div>
        @else
            <div class="flex w-full h-full items-center flex-col justify-center">
                <img class="h-96" src="/assets/images/nodata.svg" alt="nodata">
                <p class="font-poppins-semibold text-lg">Tidak ada data</p>
            </div>
        @endif

        {{-- <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full min-w-full">
                <tbody>
                    @foreach ($datasets as $dataset)
                        @php
                            $startDate = \Carbon\Carbon::parse($dataset->updated_at);
                            $lastUpdate = $startDate->diffInDays(\Carbon\Carbon::now());
                        @endphp
                        <tr>
                            <td class="border-2 px-4 py-2 rounded-lg text-left text-lg">
                                <button onclick="detailDataset({{ json_encode($dataset) }})" class="open-modal font-poppins-semibold text-lg" data-id="{{ $dataset->id }}">
                                    {{ $dataset->nama_data }}
                                </button>
                                <p class="text-xs text-gray-600">Diperbarui {{ $lastUpdate }} hari yang lalu</p>
                                <p class="line-clamp-2 pt-4 text-sm">{{ $dataset->deskripsi_data }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
    </div>
@endsection
@section('otherjs')
    <script src="/js/dataset.js"></script>
@endsection
