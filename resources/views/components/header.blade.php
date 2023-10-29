<div class="py-5 px-4 flex h-fit w-full flex-row justify-between border-b-[2px] sticky top-0 bg-white z-[50]">
    <a href="/"><img class="h-fit w-fit" src="/assets/images/logo1.png" alt="logo"></a>
    <button onclick="{{ Auth::check() ? 'handleProfile()' : '' }}"
        class="h-12 rounded-full flex items-center space-x-2 hover:text-blue-600 focus:outline-none">
        @if (Auth::check())
            <img class="h-12 rounded-full" src='/assets/images/profile.png' alt="profile">
        @endif
        <a href="{{ !Auth::check() ? '/login' : '#' }}"
            class="{{ Auth::check() ? 'hidden' : 'flex bg-blue-600 text-white px-3' }} md:flex  px-1 py-1 rounded-md">
            @if (Auth::check())
                {{ strtoupper(explode('@', Auth::user()->email)[0]) }}
            @else
                Login
            @endif
        </a>
    </button>
</div>

{{-- bg hitam --}}
<div onclick="handleProfile()" id="bgProfile"
    class="min-h-screen bg-black fixed flex w-full opacity-0 left-0 top-0 pointer-events-none duration-300 ease-in-out z-[60]">
</div>



{{-- dialog --}}
<di id="dialogProfile"
    class="flex flex-col w-full md:w-[400px] min-h-screen bg-white fixed right-0 translate-x-[800px] md:translate-x-[400px] drop-shadow-xl duration-300 ease-in-out z-[70]">
    <div class="flex flex-row justify-between items-center border-b-[2px] px-6 py-6">
        <div class="flex flex-row gap-4 items-center">
            <img class="h-12 rounded-full" src="/assets/images/profile.png" alt="profile">
            <div class="flex flex-col">
                <p class="font-poppins-semibold text-gray-600">
                    @if (Auth::check())
                        {{ strtoupper(explode('@', Auth::user()->email)[0]) }}
                    @else
                        Tamu
                    @endif
                </p>
                <p class="text-xs text-gray-600">{{ Auth::check() && Auth::user()->id_level == 1  ? 'Admin' : 'User' }}</p>
            </div>
        </div>
        <div onclick="handleProfile()" class="p-2 hover:bg-slate-200 rounded-md duration-200">
            <svg class="" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                xmlns="http://www.w3.org/2000/svg">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </div>
    </div>
    <div class="flex flex-1 w-full flex-col py-6 px-4">
        <a href="/user/dataset" class="flex flex-row gap-6 px-4 py-3 rounded-md hover:bg-slate-200 cursor-pointer duration-200">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
            </svg>
            <p>Kelolah Dataset</p>
        </a>
        @if (Auth::check() && Auth::user()->id_level == 1)
            <a href="/admin/menunggu-konfirmasi" class="flex flex-row gap-6 px-4 py-3 rounded-md hover:bg-slate-200 cursor-pointer duration-200">
                <svg class="h-6 w-6" stroke="currentColor" fill="currentColor" stroke-width="0" role="img"
                    viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <title></title>
                    <path
                        d="M11.992 1.966c-.434 0-.87.086-1.28.257L1.779 5.917c-.503.208-.49.908.012 1.116l8.982 3.558a3.266 3.266 0 0 0 2.454 0l8.982-3.558c.503-.196.503-.908.012-1.116l-8.957-3.694a3.255 3.255 0 0 0-1.272-.257zM23.4 8.056a.589.589 0 0 0-.222.045l-10.012 3.877a.612.612 0 0 0-.38.564v8.896a.6.6 0 0 0 .821.552L23.62 18.1a.583.583 0 0 0 .38-.551V8.653a.6.6 0 0 0-.6-.596zM.676 8.095a.644.644 0 0 0-.48.19C.086 8.396 0 8.53 0 8.69v8.355c0 .442.515.737.908.54l6.27-3.006.307-.147 2.969-1.436c.466-.22.43-.908-.061-1.092L.883 8.138a.57.57 0 0 0-.207-.044z">
                    </path>
                </svg>
                <p>Konfirmasi Dataset</p>
            </a>
        @endif
        <a href="/logout" class="flex flex-row gap-6 px-4 py-3 rounded-md hover:bg-slate-200 cursor-pointer duration-200">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                <polyline points="10 17 15 12 10 7"></polyline>
                <line x1="15" y1="12" x2="3" y2="12"></line>
            </svg>
            <p>Keluar</p>
        </a>
    </div>

</di>
