<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        .swiper-wrapper {
            width: 100%;
            height: max-content !important;
            padding-bottom: 64px !important;
            -webkit-transition-timing-function: linear !important;
            transition-timing-function: linear !important;
            position: relative;
        }
        .swiper-pagination-bullet {
            background: #D0CECD;
        }
        .swiper-pagination-bullet-active {
            background: #D0CECD;
        }

        @media screen and (max-width: 1200px) {
            html {
                font-size: 55%;
            }
        }

        .ck-editor__editable {
            min-height: 350px !important;
        }
    </style>
</head>
<body class="font-sans">
    {{-- Start Header section --}}
    <header class="bg-white sm:border border-judy">
        {{-- Start nav section --}}
        <nav class="w-11/12 mx-auto h-24 flex justify-between items-center">
            <div class="flex items-center justify-center gap-12">
                <div class="w-40">
                    <img class="" src="{{asset('images/3.jpg')}}" alt="">
                </div>

                <div class="hidden sm:block sm:ml-10">
                    <ul class="font-semibold text-xl flex gap-x-14">
                        <li class="hover:text-slate-500"><a href="{{url('/')}}">Home</a></li>
                        <li class="hover:text-slate-500"><a href="{{route('career')}}">Career</a></li>
                        <li class="hover:text-slate-500"><a href="">About Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="flex items-center">
                @if (Route::has('login'))
                    @auth
                        <x-app-layout></x-app-layout>
                    @else
                        <a href="{{route('login')}}">
                            <button class="text-fuchsia-950 bg-white py-1 px-6 rounded-lg border-2 border-fuchsia-400 font-semibold text-xl">Log in</button>
                        </a>
                        <a href="{{route('register')}}" class="ml-4">
                            <button class="text-white bg-sky-500 py-1 px-6 rounded-lg border-2 border-blue-500 font-semibold text-xl">Sign up</button>
                        </a>
                    @endauth
                @endif
            </div>
        </nav>
        {{-- End nav section --}}
    </header>
    {{-- End Header section --}}

    @yield('content')

    {{-- Start Footer section --}}
    <div class="border bg-black h-24 mb-8">
        <div class="text-white font-medium text-3xl w-[70%] mx-auto mt-6 gap-4 flex items-center justify-center">
            <p>© 2025</p>
            <a href=""><i class="fa-brands fa-square-facebook"></i></a>
            <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
            <a href=""><i class="fa-regular fa-envelope"></i></a>
            <a href="">Rss feed</a>
        </div>
    </div>
    {{-- End Footer section --}}

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="editor-sdk.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script type="module" src="https://unpkg.com/@material-tailwind/html@latest/scripts/popover.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('script')
</body>
</html>
