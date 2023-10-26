@extends('layouts.main')

@section('konten')
    <div class="flex flex-col min-h-full w-full py-8 px-6">
        <div class="flex flex-row gap-3 items-center">
            <img class="h-6 w-6 rounded-full" src="https://picsum.photos/200" alt="foto">
            <p class="text-xs text-gray-500">e41210618@student.polije.ac.id - Diperbarui 13 hari yang lalu</p>
        </div>
        <div class="flex flex-col md:flex-row h-full w-full mt-8">
            <div class="flex flex-col flex-1 h-full pr-8">
                <h1 class="font-poppins-semibold text-3xl text-gray-700 border-b-2 pb-6">Hand Recognition Dataset</h1>
                <h1 class="font-poppins-semibold text-3xl text-gray-700 py-6">Deskripsi</h1>
                <div class="whitespace-pre-line">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem possimus
                    totam cupiditate dolorem? Quam
                    dicta ipsum et illo veniam ea autem possimus quibusdam esse numquam, velit debitis quasi at perferendis
                    vel! Debitis, provident magni blanditiis ullam nobis alias animi consequatur officiis, voluptas dolore
                    quae recusandae consequuntur assumenda itaque esse qui? Aut cumque labore ut repellat accusantium vitae
                    consequatur ex reprehenderit explicabo, incidunt, perspiciatis, ratione maxime officiis quisquam?
                    Mollitia dolorem nostrum voluptate quam adipisci, tenetur, illo maxime veniam fugit eveniet, aspernatur
                    unde harum! Velit, maiores ipsam? Error accusamus veniam soluta nemo.

                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni temporibus modi quae accusamus, dolorem,
                    omnis impedit saepe minus numquam quos enim dignissimos illum quas! Eveniet porro a doloribus deserunt
                    nesciunt at esse exercitationem ipsam delectus explicabo, id quis amet dicta tempore quisquam unde,
                    numquam minima sed nemo quasi enim atque dolores eligendi. Dolores dolorum similique nulla, magni
                    reprehenderit quia voluptates, quaerat libero, et voluptas nemo id excepturi? In ipsum quae ut
                    necessitatibus iusto voluptatibus unde quam sunt, maiores inventore. Non, dignissimos? Non perferendis
                    tenetur molestiae ipsa cupiditate temporibus laudantium hic!

                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde quo impedit voluptatibus veniam,
                    praesentium aliquam consequuntur, error facere deserunt molestiae aspernatur accusamus commodi! Unde
                    velit quo soluta laudantium asperiores, natus ad? Quasi ut, nemo libero eveniet consequuntur non, eos
                    est ipsa, mollitia fugit nesciunt. Voluptatum non porro nisi eligendi. Veniam atque commodi unde fuga
                    animi accusantium modi asperiores impedit tempore quia rem in officia, temporibus qui. Nisi consectetur
                    aliquid rem atque aspernatur, officia dolores reprehenderit pariatur. Molestias, distinctio amet non
                    fugiat nobis enim aut blanditiis tempora, quisquam et velit error?

                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, sed! Mollitia unde obcaecati debitis
                    perspiciatis officiis eaque at adipisci eos. Nesciunt quod eos earum consequatur molestiae culpa?
                    Praesentium ipsum reprehenderit exercitationem harum minus quibusdam tenetur, ad ipsam voluptas
                    excepturi doloremque veritatis, quae adipisci, recusandae illo vel atque voluptates ratione
                    necessitatibus qui est earum modi id doloribus! Eveniet recusandae temporibus dignissimos neque
                    assumenda at repellendus rem, nisi cupiditate porro mollitia aut odit maxime laborum corrupti, dolorum
                    laudantium voluptatum! Explicabo illo, repudiandae, ab, eaque reiciendis accusantium quidem blanditiis
                    molestias quis error aliquid!
                </div>
            </div>
            <div class="flex flex-col w-full mt-6 md:mt-0 border-t-2 md:border-t-0 md:w-[30%] h-full gap-2 px-0 md:px-4 py-4">
                <button
                    class="bg-slate-700 hover:bg-slate-900 text-white py-4 rounded-md flex flex-row gap-3 items-center justify-center"><svg
                        width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.5835 18.3333H17.4168V16.5H4.5835M17.4168 8.25H13.7502V2.75H8.25016V8.25H4.5835L11.0002 14.6667L17.4168 8.25Z"
                            fill="white" />
                    </svg> Download</button>
                <div class="flex flex-row gap-3 py-2">

                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.5835 18.3333H17.4168V16.5H4.5835M17.4168 8.25H13.7502V2.75H8.25016V8.25H4.5835L11.0002 14.6667L17.4168 8.25Z"
                            fill="black" />
                    </svg>
                    <p class="">8 Kali diunduh</p>
                </div>
                <h1 class="font-poppins-semibold text-3xl mb-2 mt-6">Paper</h1>
                @for ($i = 0; $i < 4; $i++)
                    <div class="flex flex-row gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                            fill="none">
                            <path
                                d="M10.2915 7.12498V2.77081L14.6457 7.12498M4.74984 1.58331C3.87109 1.58331 3.1665 2.2879 3.1665 3.16665V15.8333C3.1665 16.2532 3.33332 16.656 3.63025 16.9529C3.92718 17.2498 4.32991 17.4166 4.74984 17.4166H14.2498C14.6698 17.4166 15.0725 17.2498 15.3694 16.9529C15.6664 16.656 15.8332 16.2532 15.8332 15.8333V6.33331L11.0832 1.58331H4.74984Z"
                                fill="black" />
                        </svg>
                        <p>Kiosk hand recognition berbasis website</p>
                    </div>
                @endfor
            </div>
        </div>
        <div class="flex flex-col gap-2 h-full w-full mt-12">
            <div class="flex flex-row gap-2 py-4 pt-8 justify-between items-center border-t-2">
                <div class="flex flex-row gap-2 items-center">

                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 24.75L2.75 16.5L11 8.25L12.9594 10.2094L6.63437 16.5344L12.925 22.825L11 24.75ZM22 24.75L20.0406 22.7906L26.3656 16.4656L20.075 10.175L22 8.25L30.25 16.5L22 24.75Z"
                            fill="black" />
                    </svg>
                    <p class="font-poppins-semibold text-2xl text-gray-600">Popular Dataset</p>
                </div>
                <p class="hover:text-blue-700 text-xs md:text-base cursor-pointer">Lihat Semua</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mt-4">
                @for ($i = 0; $i < 4; $i++)
                    <div class="w-full flex border-2 rounded-lg h-fit flex-col py-4 overflow-hidden">
                        <div class="px-8">
                            <h1 class="font-poppins-semibold text-xl">Hand Recognition Dataset</h1>
                            <p class="text-xs text-gray-600">Diperbarui 6 hari yang lalu</p>
                            <p class="line-clamp-2 pt-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore
                                eveniet hic possimus, minima magnam et libero impedit porro amet tempore doloremque? Rem
                                minima quas nulla beatae assumenda, sed voluptatibus voluptates?</p>


                        </div>
                        <div class="flex flex-row justify-between gap-2 border-t-2 mt-4 px-8 pt-4">
                            <p>e41210618@student.polije.ac.id</p>
                            <div class="flex flex-row gap-2">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.5835 18.3333H17.4168V16.5H4.5835M17.4168 8.25H13.7502V2.75H8.25016V8.25H4.5835L11.0002 14.6667L17.4168 8.25Z"
                                        fill="black" />
                                </svg>
                                <p>8</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="flex flex-col gap-2 h-full w-full mt-12">
            <div class="flex flex-row gap-2 py-4 pt-8 justify-between items-center border-t-2">
                <div class="flex flex-row gap-2 items-center">

                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 24.75L2.75 16.5L11 8.25L12.9594 10.2094L6.63437 16.5344L12.925 22.825L11 24.75ZM22 24.75L20.0406 22.7906L26.3656 16.4656L20.075 10.175L22 8.25L30.25 16.5L22 24.75Z"
                            fill="black" />
                    </svg>
                    <p class="font-poppins-semibold text-2xl text-gray-600">Newer Dataset</p>
                </div>
                <p class="hover:text-blue-700 text-xs md:text-base cursor-pointer">Lihat Semua</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mt-4">
                @for ($i = 0; $i < 4; $i++)
                    <div class="w-full flex border-2 rounded-lg h-fit flex-col py-4 overflow-hidden">
                        <div class="px-8">
                            <h1 class="font-poppins-semibold text-xl">Hand Recognition Dataset</h1>
                            <p class="text-xs text-gray-600">Diperbarui 6 hari yang lalu</p>
                            <p class="line-clamp-2 pt-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore
                                eveniet hic possimus, minima magnam et libero impedit porro amet tempore doloremque? Rem
                                minima quas nulla beatae assumenda, sed voluptatibus voluptates?</p>


                        </div>
                        <div class="flex flex-row justify-between gap-2 border-t-2 mt-4 px-8 pt-4">
                            <p>e41210618@student.polije.ac.id</p>
                            <div class="flex flex-row gap-2">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.5835 18.3333H17.4168V16.5H4.5835M17.4168 8.25H13.7502V2.75H8.25016V8.25H4.5835L11.0002 14.6667L17.4168 8.25Z"
                                        fill="black" />
                                </svg>
                                <p>8</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
