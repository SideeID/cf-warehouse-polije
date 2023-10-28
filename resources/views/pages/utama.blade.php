@extends('layouts.main')

@section('konten')

<div class="flex flex-1 w-full">
    <div class="text-center mt-2 flex flex-col min-h-full w-full py-8 px-4">
        <h1 class="text-xl font-bold">Welcome to the Jember State Polytechnic data warehouse</h1>
        <p class="mt-5">Source of Inspiration and Referral: This repository is a great place for anyone looking for inspiration, resources and support on their learning journey.</p>
        <div class="mt-10">
            <a  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border-blue-700 rounded-lg mb-5 mx-5">
                {{-- href="{{ route('dataset.index') }}" --}}
                View Dataset
            </a>
            <a  class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 border-yellow-700 rounded-lg mb-5 mx-5">
                {{-- href="{{ route('dataset.create') }}" --}}
                Contribute a dataset
            </a>
        </div>

        <div class="text-center flex justify-between">
            <table class="table-auto w-1/2 border-2 mx-5 my-4">
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

            <table class="table-auto w-1/2 border-2 mx-5 my-4">
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
        </div>
    </div>
</div>

@endsection
