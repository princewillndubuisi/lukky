<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #D3D9D4; /* Soft neutral background */
            color: #212A31; /* Dark blue-black text */
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            color: #124E66; /* Deep Teal for headings */
        }

        /* 🔵 Navigation */
        .header {
            background-color: #212A31; /* Dark navy */
        }
        nav ul li a {
            
            transition: color 0.3s ease;
        }
        nav ul li a:hover {
            color: #124E66;
        }

        /* ✨ Buttons */
        .btn-login {
            color: #124E66;
            border: 2px solid #2E3944;
            padding: 8px 18px;
            transition: all 0.3s ease-in-out;
        }
        .btn-login:hover {
            background-color: #2E3944;
            color: #D3D9D4;
        }
        .btn-signup {
            background-color: #124E66;
            color: #D3D9D4;
            border: 2px solid #124E66;
            padding: 8px 18px;
            transition: all 0.3s ease-in-out;
        }
        .btn-signup:hover {
            background-color: #2E3944;
        }

        /* Footer */
        .footer {
            background: #212A31;
            color: #D3D9D4;
            text-align: center;
            padding: 20px 0;
            font-size: 18px;
        }
        .footer a {
            color: #D3D9D4;
            margin: 0 10px;
            transition: color 0.3s ease-in-out;
        }
        .footer a:hover {
            color: #124E66;
        }

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
        
         /* Add this CSS without changing your JS */
        .slider a {
            position: relative;
            z-index: 10; /* Higher than buttons */
        }
        
        /* Make sure slider items can be clicked */
        .slider > div {
            pointer-events: auto;
        }
        
        /* Buttons container doesn't block clicks */
        .pointer-events-none {
            pointer-events: none;
        }
        
        /* Buttons themselves are clickable */
        .pointer-events-auto {
            pointer-events: auto;
        }

         /* CKEditor Styling */
         .ck-editor__editable {
            min-height: 450px;
            background-color: #343a40 !important;
            color: white !important;
            border: 1px solid #495057 !important;
            padding: 15px !important;
        }

        .ck-toolbar {
            background-color: #1a202c !important;
            border: 1px solid #495057 !important;
            border-bottom: none !important;
        }

        .ck-button {
            color: white !important;
        }

        .ck-button:not(.ck-disabled):hover {
            background-color: #2d3748 !important;
        }

        .ck-dropdown__panel {
            background-color: #1a202c !important;
            border: 1px solid #495057 !important;
        }

        .ck-list__item:hover {
            background-color: #2d3748 !important;
        }

        .ck-placeholder {
            color: #b0b0b0 !important;
        }

        .ck-editor__editable {
            min-height: 350px !important;
        }

        .post-content ol {
            list-style-type: decimal;
            padding-left: 20px;
            margin: 1em 0;
        }
        .post-content ol li {
            margin-bottom: 0.5em;
        }
        .post-content ul {
            list-style-type: disc;
            padding-left: 20px;
            margin: 1em 0;
        }

        a {
            pointer-events: auto;
            position: relative;
            z-index: 10;
        }
  
    </style>
</head>
<body class="font-sans">
    {{-- Start Header section --}}
    <header id="page-top" class="bg-white sm:border border-judy">
        {{-- Start nav section --}}
        <nav class="w-11/12 mx-auto h-24 flex justify-between items-center">
            <div class="flex items-center justify-center gap-12">
                <div class="w-40">
                    <img class="" src="{{asset('images/3.jpg')}}" alt="">
                </div>

                <div class="hidden sm:block sm:ml-10">
                    <ul class="font-semibold text-xl flex gap-x-14">
                        <li class="text-slate-500 hover:text-slate-300"><a href="{{url('/')}}">Home</a></li>
                        <li class="text-slate-500 hover:text-slate-300"><a href="{{route('career')}}">Career</a></li>
                        <li class="text-slate-500 hover:text-slate-300"><a href="">About Us</a></li>
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
            <a href=""><i class="fa-brands fa-whatsapp"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
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
