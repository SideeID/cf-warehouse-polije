<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <title>Login</title>
    @vite('resources/css/app.css')
<body>

    <div class="min-h-screen flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="/assets/images/bgLogin.png" alt="" class="w-full h-full object-cover filter blur-sm brightness-50">
        </div>

        <img src="/assets/images/blue.png" alt="" class="absolute top-4 left-4 w-27 h-12 z-10">

        <div class="relative z-10 p-8 flex flex-col items-center justify-center h-screen">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-4 text-white font-poppins-semibold">Single Sign On (SSO)</h1>
                <h3 class="text-white text-xl mb-10">Politeknik Negeri Jember</h3>
                <div class="flex items-center justify-center mb-4">
                    <img src="/assets/images/Poltek.png" alt="">
                </div>
                <div class="flex items-center pt-4 pb-0">
                    <div class="flex-grow h-px bg-white"></div> 
                    <span class="flex-shrink text-base text-white px-4 font-light">Silahkan Masuk</span>
                    <div class="flex-grow h-px bg-white"></div>
                </div>
            </div>
                    
            <form action="{{ route('google.login') }}" method="GET">
                <div class="flex items-center justify-center dark:bg-gray-800">
                    <button class="px-6 py-2 border flex gap-4 border-slate-200 dark:border-slate-700 rounded-lg text-white dark:text-slate-200 hover:border-slate-400 dark:hover:border-slate-500 hover:text-slate-900 dark:hover:text-slate-300 hover:shadow transition duration-150">
                        <img class="w-6 h-6" src="https://www.svgrepo.com/show/475656/google-color.svg" loading="lazy" alt="google logo">
                        <span>Login with Google</span>
                    </button>
                </div>
            </form>

        </div>   

    </div>
</body>
</html>