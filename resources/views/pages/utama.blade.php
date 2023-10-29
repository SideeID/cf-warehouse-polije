@extends('layouts.main')

@section('header')
    Home    
@endsection

@section('konten')
    <div class="flex flex-1 w-full">
        <div class="text-center flex flex-col min-h-full w-full py-8 px-4">
            <h1 class="text-xl font-bold">Welcome to the Jember State Polytechnic data warehouse</h1>
            <p class="mt-5">Source of Inspiration and Referral: This repository is a great place for anyone looking for
                inspiration, resources and support on their learning journey.</p>
            <div class="mt-10 flex flex-col gap-0 md:gap-6 md:flex-row w-full justify-center">
                <a href="{{ route('dataset.dataset') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border-blue-700 rounded-lg mb-5">
                    View Dataset
                </a>
                @guest
                    <a href="{{ route('login') }}"
                        class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 border-yellow-700 rounded-lg mb-5 ">
                        Contribute a dataset
                    </a>
                @else
                    <a href="/user/dataset?create"
                        class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 border-yellow-700 rounded-lg mb-5 ">
                        Contribute a dataset
                    </a>
                @endguest
            </div>
            <div class="flex flex-col md:flex-row justify-between w-full gap-8 h-full mt-12">
                <div class="flex flex-col flex-1 w-full h-full border-2">
                    <h1 class="py-2 font-poppins-semibold border-b-2 text-xl">Newer Dataset</h1>
                    <div class="flex-1">
                        @foreach ($newer as $item)
                            <a href="/data/{{ $item->user->email }}/{{ $item->id_data }}"
                                class="flex hover:bg-gray-100 flex-col flex-wrap w-full items-start px-6 border-b-2 text-left py-6">
                                <h1 class="font-poppins-semibold text-xl">{{ $item->nama_data }}</h1>
                                <p class="line-clamp-2 break-all">{{ $item->deskripsi_data }}</p>
                            </a>
                        @endforeach
                    </div>
                    <a href="/dataset/newer"
                        class="font-poppins-semibold py-2 cursor-pointer border-t-2 flex hover:text-blue-600 items-end justify-center">Lihat
                        Semua
                    </a>
                </div>

                <div class="flex flex-col flex-1 w-full h-full border-2">
                    <h1 class="py-2 font-poppins-semibold border-b-2 text-xl">Popular Dataset</h1>
                    <div class="flex-1">
                        @foreach ($popular as $item)
                            <a href="/data/{{ $item->user->email }}/{{ $item->id_data }}"
                                class="flex hover:bg-gray-100 flex-col w-full items-start px-6 border-b-2 text-left py-6">
                                <h1 class="font-poppins-semibold text-xl">{{ $item->nama_data }}</h1>
                                <p class="line-clamp-2 break-all">{{ $item->deskripsi_data }}</p>
                            </a>
                        @endforeach
                    </div>
                    <a href="/dataset/popular"
                        class="font-poppins-semibold py-2 cursor-pointer border-t-2 flex hover:text-blue-600 items-end justify-center">Lihat
                        Semua
                    </a>
                </div>

            </div>

            {{-- <div class="text-center flex flex-col md:flex-row justify-between mt-12">
            <table class="flex-1 border-2 mx-5 my-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2">New Dataset</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($newer as $newDataset)
                    <tr>
                        <td class="font-poppins-semibold border-2 px-4 py-2 rounded-lg text-left text-lg">{{ $newDataset->nama_data }}
                            <p class="line-clamp-2 text-xs text-gray-500 mt-2">{{ $newDataset->deskripsi_data }}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="flex-1 border-2 mx-5 my-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Popular Dataset</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($popular as $popularDataset)
                    <tr>
                        <td class="font-poppins-semibold border-2 px-4 py-2 rounded-lg text-left text-lg">{{ $newDataset->nama_data }}
                            <p class="line-clamp-2 text-xs text-gray-500 mt-2">{{ $newDataset->deskripsi_data }}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
        </div>
    </div>
@endsection
