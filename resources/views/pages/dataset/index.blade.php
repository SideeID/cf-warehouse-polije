@extends('layouts.main')

@section('modal')
    {{-- bg hitam --}}
    <div onclick="handleModal()" id="bg"
        class="min-h-screen bg-black fixed flex w-full opacity-0 left-0 top-0 pointer-events-none duration-300 ease-in-out z-[60]">
    </div>

    {{-- dialog --}}
    <div id="dialog"
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
        <div class="flex w-full h-full flex-col py-6 px-4 overflow-y-auto ">
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

    </div>
@endsection

@section('konten')
    <div class="container mx-auto mt-10">
        <div class="flex items-center justify-between mb-1 px-4">
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
        <div class="mb-2 px-4">
            <label for="sort" class="text-sm font-medium text-gray-600">Sort by:</label>
            <select id="sort" name="sort" class="bg-gray-100 border border-gray-200 rounded-md py-1 px-2 text-sm">
                <option value="desc">Newest First</option>
                <option value="asc">Oldest First</option>
            </select>
        </div>
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full min-w-full">
                <tbody>
                    @foreach ($datasets as $dataset)
                        @php
                            $startDate = \Carbon\Carbon::parse($dataset->updated_at);
                            $lastUpdate = $startDate->diffInDays(\Carbon\Carbon::now());
                        @endphp
                        <tr>
                            <td class="border-2 px-4 py-2 rounded-lg text-left text-lg">
                                {{-- <h1 class="font-poppins-semibold text-lg">{{ $dataset->nama_data }}</h1> --}}
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
        </div>
    </div>
@endsection
@section('otherjs')
    <script src="/js/dataset.js"></script>
@endsection
