<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @hasSection('header')
            @yield('header') |
        @endif CF Wirehouse
    </title>
    @yield('othercss')
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="flex min-h-screen w-full flex-col container mx-auto">
        @yield('modal')
        @include('components.header')

        <div class="flex flex-1 w-full">
            {{-- isi disini --}}
            @yield('konten')
        </div>

    </div>

    <script src="/js/profile.js"></script>
    @yield('otherjs')
</body>

</html>
