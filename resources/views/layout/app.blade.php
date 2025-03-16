<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    {{-- swiper link --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="editor-sdk.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    @vite('resources/css/app.css')
    @livewireStyles

    <style>
    /* CSS Code */
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
      background: #D0CECD; !important;
      }

    /* Breakpoints */
    @media screen and (max-width: 1200px) {
        html {
            font-size: 55%;
        }
    }

    /* CKEditor */
    .ck-editor__editable {
        min-height: 350px !important;
    }



    </style>
</head>
<body class="font-sans">
    {{-- Start Header section --}}
    <header class="bg-white sm:border border-judy">
        {{-- Start nav section --}}
        <nav class="w-11/12  mx-auto h-24 flex justify-between items-center">
            <div class="flex items-center justify-center">
                <div class="w-40">
                    <img class="" src="{{asset('images/3.jpg')}}" alt="">
                </div>

                <div class="hidden sm:block sm:ml-10 ">
                    <ul class="font-semibold text-xl flex gap-x-14">
                        <li class="hover:text-slate-500"><a href="{{url('/')}}">Home</a></li>
                        <li class="hover:text-slate-500"><a href="{{route('career')}}">Career </a></li>
                        <li class="hover:text-slate-500"><a href="">About Us </a></li>
                    </ul>
                </div>
            </div>

            <div class="flex items-center">
                @if (Route::has('login'))

                @auth
                    <x-app-layout>

                    </x-app-layout>

                {{-- <a class="flex" href="{{route('home')}}">
                    <button class="text-fuchsia-950 bg-white py-1 px-6 rounded-lg border-2 border-fuchsia-400 font-semibold text-xl ">Do you want to create posts</button>
                    <p>{{Auth::user()->name}}</p>
                </a> --}}

                @else
                    <a href="{{route('login')}}">
                        <button class="text-fuchsia-950 bg-white py-1 px-6 rounded-lg border-2 border-fuchsia-400 font-semibold text-xl ">Log in</button>
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
        <div class="text-white font-medium text-3xl  w-[70%] mx-auto mt-6 gap-4 flex items-center justify-center ">
            <p>© 2023</p>
            <a href="">About us</a>
            <a href="">Linkdln</a>
            <a href="">Email</a>
            <a href="">Rss feed</a>
        </div>
    </div>
    {{-- End Footer section --}}


    @livewireScripts
    <script>
        document.querySelectorAll('.tab-link').forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove active class from all tabs
                document.querySelectorAll('.tab-link').forEach(link => {
                    link.classList.remove('text-white', 'bg-blue-700', 'dark:bg-blue-600');
                    link.classList.add('text-gray-500', 'dark:text-gray-400', 'dark:bg-gray-800');
                });

                // Add active class to clicked tab
                this.classList.add('text-white', 'bg-blue-700', 'dark:bg-blue-600');
                this.classList.remove('text-gray-500', 'dark:text-gray-400', 'dark:bg-gray-800');

                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.add('hidden');
                });

                // Show content of clicked tab
                document.getElementById(this.getAttribute('data-tab')).classList.remove('hidden');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-popover-target]').forEach(button => {
                button.addEventListener('click', function () {
                    let popoverId = this.getAttribute('data-popover-target');
                    let popoverMenu = document.querySelector(`[data-popover="${popoverId}"]`);

                    if (popoverMenu) {
                        popoverMenu.classList.toggle('hidden');
                    }
                });
            });

            // Close the dropdown when clicking outside
            document.addEventListener('click', function (event) {
                document.querySelectorAll('[data-popover]').forEach(menu => {
                    if (!menu.contains(event.target) && !event.target.closest('[data-popover-target]')) {
                        menu.classList.add('hidden');
                    }
                });
            });
        });
    </script>

    {{-- CKEditor --}}
    <script>
        var element = document.getElementById('editor');

        ClassicEditor
            .create(element, {
                ckfinder: {
                    uploadUrl: "{{ route('upload.user.image')}}?&_token={{ csrf_token() }}"
                }
            })
            .then(editor => {
                console.log("Editor is ready!");

                // Custom integration with SquidexFormField
                var field = new SquidexFormField();

                // Handle value changes and set the text to the editor.
                field.onValueChanged(function (value) {
                    if (value) {
                        editor.setData(value);
                    }
                });

                // Disable the editor when needed.
                field.onDisabled(function (disabled) {
                    editor.isReadOnly = disabled;
                });

                editor.model.document.on('change', function () {
                    var data = editor.getData();

                    // Notify UI of the value change
                    field.valueChanged(data);
                });

                editor.ui.focusTracker.on('change:isFocused', function (event, name, isFocused) {
                    if (!isFocused) {
                        // Notify UI that the field has been touched.
                        field.touched();
                    }
                });

            })
            .catch(error => {
                console.error("There was an error initializing CKEditor:", error);
            });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    {{-- <script type="module" src="node_modules/@material-tailwind/html@latest/scripts/popover.js"></script> --}}

    <!-- from cdn -->
    <script type="module"src="https://unpkg.com/@material-tailwind/html@latest/scripts/popover.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    {{-- swiper js --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('script')
</body>
</html>

