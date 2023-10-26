@extends('layouts.main')

@section('konten')
    <div class="flex flex-col min-h-full w-full py-8 px-6">

        <h1 class="font-poppins-semibold text-2xl">Kelolah Dataset</h1>
        <div class="flex flex-col md:flex-row md:justify-between items-start md:items-center">
            <div class="flex flex-row gap-3">
                <p class="">Buat Database Baru,</p>
                <p class=" text-blue-600">disini</p>
            </div>
            <div class="flex flex-row border-2 px-4 border-gray-300 rounded-xl items-center w-full md:w-[30%] mt-6 md:mt-0">
                <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                    fill="none">
                    <path
                        d="M14.2574 11.821C14.8132 10.7172 15.1131 9.48331 15.1131 8.19489C15.1131 6.12164 14.3413 4.17009 12.9458 2.70118C10.0588 -0.328943 5.36039 -0.328943 2.47336 2.70118C-0.413646 5.73133 -0.413646 10.6627 2.47336 13.6928C3.91689 15.2078 5.81224 15.9633 7.70759 15.9633C8.89918 15.9633 10.0868 15.6653 11.1664 15.0694L14.4853 18.5528L17.5762 15.3044L14.2574 11.821ZM3.04118 13.0968C0.46606 10.394 0.46606 5.99991 3.04118 3.29713C4.32873 1.94575 6.01617 1.27006 7.70759 1.27006C9.39901 1.27006 11.0904 1.94575 12.378 3.29713C13.6256 4.60238 14.3133 6.34406 14.3133 8.19489C14.3133 10.0499 13.6256 11.7916 12.378 13.0968C9.80287 15.7996 5.61631 15.7996 3.04118 13.0968ZM18.8598 16.6516L18.14 15.8961L15.0491 19.1445L15.7688 19.8999C16.1927 20.3448 16.7525 20.5714 17.3123 20.5714C17.8721 20.5714 18.4319 20.3448 18.8598 19.8999C19.7115 19.006 19.7115 17.5455 18.8598 16.6516Z"
                        fill="#757575" />
                </svg>
                <input class="py-3 px-3 border-transparent outline-none w-full flex" type="text" name="" id=""
                    placeholder="Cari disini..">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 w-full h-fit gap-10 mt-6">
            @for ($i = 0; $i < 6; $i++)
                <div class="flex flex-col  py-4 px-6 bg-gray-100 rounded-xl relative overflow-hidden">
                    <svg class="absolute top-4 right-8" xmlns="http://www.w3.org/2000/svg" width="3" height="24" viewBox="0 0 3 24" fill="none">
                        <g clip-path="url(#clip0_44_16)">
                            <path d="M0.556152 6.00101H2.39037M0.556152 12.001H2.39037M0.556152 18.001H2.39037"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_44_16">
                                <rect width="2.44563" height="24" fill="white" transform="translate(0.250488)" />
                            </clipPath>
                        </defs>
                    </svg>
                    <h1 class="font-poppins-semibold text-lg py-2">Hand Recognition Dataset</h1>
                    <p class="line-clamp-2 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Perspiciatis
                        doloremque quis quas voluptates quae consectetur officia ipsa a incidunt nobis. Magnam placeat
                        quaerat magni voluptatibus, pariatur modi minus temporibus cum reprehenderit qui. Consectetur
                        reprehenderit est neque voluptas obcaecati. Accusantium, pariatur.</p>
                    <div class="flex flex-row justify-between mt-12">
                        <div class="flex flex-row gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15"
                                fill="none">
                                <path
                                    d="M4.50049 12.5H15.2001V11.25H4.50049M15.2001 5.625H12.1431V1.875H7.55752V5.625H4.50049L9.8503 10L15.2001 5.625Z"
                                    fill="black" />
                            </svg>
                            <p>46</p>
                        </div>
                        <p class="font-poppins-medium text-xs">Menunggu Konfirmasi</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
