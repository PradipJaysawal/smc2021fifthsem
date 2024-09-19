<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>

</head>
<body>
    @include('layouts.alert')
    <nav class="flex px-20 py-2 bg-white justify-between items-center shadow-lg sticky top-0 z-30">
        <img src="{{asset('logo/event2.png')}}" alt="" class="h-16">
        <div class="flex gap-5">
            <a href="{{route('home')}}">Home</a>
            <a href="{{route('about')}}">About</a>
            <a href="{{route('contact')}}">Contact</a>
            @auth
                <div class="relative group">
                    <i class="ri-user-fill p-2 cursor-pointer bg-gray-100 rounded-full"></i>
                    <div class="absolute right-0 top-7 w-48 bg-gray-100 rounded-lg hidden group-hover:block">
                        <p class="p-2 hover:bg-gray-200 cursor-pointer rounded-lg">Hi, {{auth()->user()->name}}</p>
                        <a href="{{route('cart.index')}}" class="p-2 block hover:bg-gray-200 cursor-pointer rounded-lg">My Cart</a>
                        <form action="{{route('logout')}}" method="post" class="p-2 hover:bg-gray-200 rounded-lg">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
                @else
                  <a href="{{route('login')}}">Login</a>
            @endauth
        </div>
    </nav>
    @yield('content')

    <footer class="bg-blue-600 mt-20 py-4 px-20">
        <p class="text-center text-white">copyright &copy; 2024 | All right reserved</p>
    </footer>

</body>
</html>

