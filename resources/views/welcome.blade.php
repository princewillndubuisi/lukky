@extends('layout.app')

@section('title')
    Dashboard
@endsection

@section('content')
        {{-- Start main section --}}
        <main class="bg-prince h-full">
            <div class="my-2 h-12 bg-white">
                <div class="w-11/12 mx-auto flex justify-center items-center">
                    <button class="w-32 rounded-lg py-1 text-white font-semibold text-xl bg-red-600">Live News</button>
                    <marquee class="ml-8 text-dark font-semibold text-xl" behavior="" direction="">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium hic nobis fugiat eaque inventore quo, neque saepe quaerat cumque nihil nostrum soluta, velit facere perspiciatis nisi in obcaecati, molestias dignissimos.</marquee>
                </div>
            </div>

            {{-- Start Trending news section --}}
            <div class="flex justify-between items-center w-11/12 mx-auto mt-12">
                <div>
                    <h6 class="text-4xl font-medium text-gray-700">Trending News</h6>
                </div>

                <div class=" w-5/12 flex items-center justify-center">
                    <input class="border-2 py-3.5 w-full px-8 rounded-full placeholder-gray-700 font-medium" type="text" placeholder="Search">
                    <button class="text-2xl absolute right-16 py-2 border-l-2 border-inherit px-6"><i class="fa-solid fa-magnifying-glass mt-2.5"></i></button>
                </div>
            </div>

            <div class="flex gap-x-6 items-center w-11/12 mx-auto mt-8">
                <div class="w-80 h-80">
                    <a  href="">
                        <div class="h-full w-full">
                            <img class="h-full rounded-md" src="{{asset('images/bench-accounting-nvzvOPQW0gc-unsplash.jpg')}}" alt="">
                        </div>
                    </a>
                    <div class="mt-2">
                        <a class="font-medium text-lg" href="">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        </a>
                    </div>
                    <div class="w-24 rounded-full">
                        <a class="rounded-full bg-white font-medium ml-44 absolute top-72 mt-4 px-6 py-1" href="">Politics</a>
                    </div>
                </div>
                <div class="w-80 h-80">
                    <a  href="">
                        <div class="h-full w-full">
                            <img class="h-full rounded-md " src="{{asset('images/bench-accounting-nvzvOPQW0gc-unsplash.jpg')}}" alt="">
                        </div>
                    </a>
                    <div class="mt-2">
                        <a class="font-medium text-lg" href="">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        </a>
                    </div>
                    <div class="w-64.5 rounded-full flex items-end justify-end">
                        <a class="rounded-full bg-white font-medium mr-3 absolute top-72 mt-4 px-6 py-1" href="">Sports</a>
                    </div>
                </div>
                <div class="w-80 h-80">
                    <a  href="">
                        <div class="h-full w-full">
                            <img class="h-full rounded-md" src="{{asset('images/cesar-rincon-XHVpWcr5grQ-unsplash.jpg')}}" alt="">
                        </div>
                    </a>
                    <div class="mt-2">
                        <a class="font-medium text-lg" href="">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        </a>
                    </div>
                    <div class="w-64.5 rounded-full flex items-end justify-end">
                        <a class="rounded-full bg-white font-medium mr-3 absolute top-72 mt-4 px-6 py-1" href="">Society</a>
                    </div>
                </div>
                <div class="w-80 h-80">
                    <a  href="">
                        <div class="h-full w-full">
                            <img class="h-full rounded-md" src="{{asset('images/cesar-rincon-XHVpWcr5grQ-unsplash.jpg')}}" alt="">
                        </div>
                    </a>
                    <div class="mt-2">
                        <a class="font-medium text-lg" href="">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        </a>
                    </div>
                    <div class="w-64.5 rounded-full flex items-end justify-end">
                        <a class="rounded-full bg-white font-medium mr-3 absolute top-72 mt-4 px-6 py-1" href="">Education</a>
                    </div>
                </div>
            </div>
            {{--End Trending news section --}}

            {{-- Start Your timeline section --}}
            <div class="w-11/12 mx-auto mt-28">
                <div>
                    <h6 class="text-4xl font-medium">Your Timeline</h6>
                </div>

                <div class="flex justify-between gap-x-10 mt-8">
                    <div class="w-[75%]">

                        @foreach ($post as $posts)
                            @php
                                $date = \Carbon\Carbon::parse($posts->created_at);
                                $isToday = $date->isToday();
                                $formattedDate = $isToday ? 'Today' : $date->format('jS M, Y');
                                $relativeTime = $date->diffForHumans();
                            @endphp

                            @if ($posts->image)
                                <div class="border flex justify-center bg-white h-80 px-6 py-10 gap-x-4">
                                    <div class="flex flex-col items-center w-[9%]">
                                        <img class="w-12 h-12 rounded-full" src="{{asset('images/brooks-leibee-27QcqVqgVg4-unsplash.jpg')}}" alt="">
                                    </div>

                                    <div class="w-[70%] -mt-4">
                                        <div class="flex items-center font-medium gap-2 text-gray-500">
                                            <p>{{$posts->name}}</p>
                                            <p class="font-bold mb-4 text-2xl">.</p>
                                            <p class="">{{$formattedDate}}</p>
                                            <p class="font-bold mb-4 text-2xl">.</p>
                                            <p>{{$relativeTime}}</p>
                                        </div>

                                        <div class="mb-4">
                                            <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Tech trends</a>
                                            <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Entertainment</a>
                                        </div>

                                        <div class="">
                                            <a href="{{route('read.post', $posts->id)}}">
                                                <h1 class="text-xl font-semibold mb-2 hover:text-sky-400">{{$posts->title}}</h1>
                                            </a>
                                            <p class="text-base font-medium text-gray-500 tracking-wide leading-relaxed">Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi totam consectetur est soluta. Odio quis accusamus libero earum quas ducimus sequi Lorem ipsum dolor quas ducimus hgud</p>
                                        </div>
                                    </div>

                                    <div class="w-[40%] h-52 bg-slate-50 mt-1">
                                        <img class="w-full h-full" src="/postimage/{{$posts->image}}" alt="">
                                        <div class="flex items-center justify-around my-3">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-thumbs-up text-xs text-slate-500"></i>
                                                <p class="text-slate-500 text-xs ml-2">10K</p>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-thumbs-down text-xs text-slate-500"></i>
                                                <p class="text-slate-500 text-xs ml-2">10K</p>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-comments text-xs text-slate-500"></i>
                                                <p class="text-slate-500 text-xs ml-2">10K</p>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-share-nodes text-xs text-slate-500"></i>
                                                <p class="text-slate-500 text-xs ml-2">10K</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4 w-4 border border-slate-400 mx-auto">

                            @elseif ($posts->video)
                                <div class="flex border bg-white h-90 px-6 py-8">
                                    <div class="flex flex-col items-center w-[9%]">
                                        <img class="w-12 h-12 rounded-full" src="{{asset('images/anthony-tran-uM45BGGeync-unsplash.jpg')}}" alt="">
                                    </div>


                                    <div class="w-[100%] ml-4 -mt-4">
                                        <div class="flex items-center font-medium gap-2 text-gray-500">
                                            <p>{{$posts->name}}</p>
                                            <p class="font-bold mb-4 text-2xl">.</p>
                                            <p class="">{{$formattedDate}}</p>
                                            <p class="font-bold mb-4 text-2xl">.</p>
                                            <p>{{$relativeTime}}</p>
                                        </div>

                                        <div class="mb-4">
                                            <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Tech trends</a>
                                            <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Entertainment</a>
                                        </div>

                                        <div class="mt-2.5">
                                            <h1 class="text-xl font-semibold">{{$posts->title}}</h1>
                                            <p class="text-md font-medium text-gray-500 tracking-wide leading-loose">Lorem ipsum dolor Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi totam consectetur </p>
                                        </div>
                                        <div class="h w-full mt-4 bg-video">
                                            <video class="bg-video_content" autoplay muted loop>
                                                <source src="/postvideo/{{$posts->video}}" type="video/mp4">
                                            </video>
                                        </div>
                                        <div class="flex items-center justify-end mt-5 gap-x-6">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-thumbs-up text-xs text-slate-500"></i>
                                                <p class="text-slate-500 text-xs ml-2">10K</p>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-thumbs-down text-xs text-slate-500"></i>
                                                <p class="text-slate-500 text-xs ml-2">10K</p>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-comments text-xs text-slate-500"></i>
                                                <p class="text-slate-500 text-xs ml-2">10K</p>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-share-nodes text-xs text-slate-500"></i>
                                                <p class="text-slate-500 text-xs ml-2">10K</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4 w-4 border border-slate-400 mx-auto">

                            @else
                                <div class="flex border bg-white h-80 px-6 py-8">
                                    <div class="flex flex-col items-center w-[9%]">
                                        <img class="w-12 h-12 rounded-full" src="{{asset('images/brooks-leibee-27QcqVqgVg4-unsplash.jpg')}}" alt="">
                                    </div>

                                    <div class="w-[100%] ml-4 -mt-4">
                                        <div class="flex items-center font-medium gap-2 text-gray-500">
                                            <p>{{$posts->name}}</p>
                                            <p class="font-bold mb-4 text-2xl">.</p>
                                            <p class="">{{$formattedDate}}</p>
                                            <p class="font-bold mb-4 text-2xl">.</p>
                                            <p>{{$relativeTime}}</p>
                                        </div>

                                        <div class="mb-4">
                                            <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Tech trends</a>
                                            <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Entertainment</a>
                                        </div>

                                        <div class="mt-2.5">
                                            <h1 class="text-xl font-semibold">{{$posts->title}}</h1>
                                            <p class="text-md font-medium text-gray-500 tracking-wide leading-loose">Lorem ipsum dolor Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi totam consectetur est soluta. Odio quis accusamus libero earum quas ducimus sequi, dolore quos voluptas nemo nam tempore esse obcaecati. Officiis.</p>
                                        </div>

                                        <div class="flex items-center justify-end mt-5 gap-x-6 mr-4">
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-thumbs-up text-xs text-slate-500"></i>
                                                <p class="text-slate-500 text-xs ml-2">10K</p>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-thumbs-down text-xs text-slate-500"></i>
                                                <p class="text-slate-500 text-xs ml-2">10K</p>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-comments text-xs text-slate-500"></i>
                                                <p class="text-slate-500 text-xs ml-2">10K</p>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fa-solid fa-share-nodes text-xs text-slate-500"></i>
                                                <p class="text-slate-500 text-xs ml-2">10K</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4 w-4 border-slate-400 border mx-auto">
                            @endif

                            {{-- <div class="flex border bg-white h-80 px-6 py-8">
                                <div class="flex flex-col items-center w-[9%]">
                                    <img class="w-12 h-12 rounded-full" src="{{asset('images/brooks-leibee-27QcqVqgVg4-unsplash.jpg')}}" alt="">
                                </div>

                                <div class="w-[100%] ml-4 -mt-4">
                                    <div class="flex items-center font-medium gap-2 text-gray-500">
                                        <p>{{$posts->name}}</p>
                                        <p class="font-bold mb-4 text-2xl">.</p>
                                        <p class="">{{$formattedDate}}</p>
                                        <p class="font-bold mb-4 text-2xl">.</p>
                                        <p>{{$relativeTime}}</p>
                                    </div>

                                    <div class="mb-4">
                                        <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Tech trends</a>
                                        <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Entertainment</a>
                                    </div>

                                    <div class="mt-2.5">
                                        <h1 class="text-xl font-semibold">{{$posts->title}}</h1>
                                        <p class="text-md font-medium text-gray-500 tracking-wide leading-loose">Lorem ipsum dolor Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi totam consectetur est soluta. Odio quis accusamus libero earum quas ducimus sequi, dolore quos voluptas nemo nam tempore esse obcaecati. Officiis.</p>
                                    </div>

                                    <div class="flex items-center justify-end mt-5 gap-x-6 mr-4">
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-thumbs-up text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-thumbs-down text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-comments text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-share-nodes text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4 w-4 border-slate-400 border mx-auto"> --}}

                            {{-- <div class="border flex justify-center bg-white h-80 px-6 py-10 gap-x-4">
                                <div class="flex flex-col items-center w-[9%]">
                                    <img class="w-12 h-12 rounded-full" src="{{asset('images/brooks-leibee-27QcqVqgVg4-unsplash.jpg')}}" alt="">
                                </div>

                                <div class="w-[70%] -mt-4">
                                    <div class="flex items-center font-medium gap-2 text-gray-500">
                                        <p>Eustass D. kid</p>
                                        <p class="font-bold mb-4 text-2xl">.</p>
                                        <p class="">Today</p>
                                        <p class="font-bold mb-4 text-2xl">.</p>
                                        <p>10 minutes ago</p>
                                    </div>

                                    <div class="mb-4">
                                        <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Tech trends</a>
                                        <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Entertainment</a>
                                    </div>

                                    <div class="">
                                        <a href="{{route('blog')}}">
                                            <h1 class="text-xl font-semibold mb-2">Lorem ipsum dolor sit amet consectetur</h1>
                                        </a>
                                        <p class="text-base font-medium text-gray-500 tracking-wide leading-relaxed">Lorem ipsum dolor Lorem Lorem ipsum dolor Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi totam consectetur est soluta. Odio quis accusamus libero earum quas ducimus sequi Lorem ipsum dolor quas ducimus hgud</p>
                                    </div>
                                </div>

                                <div class="w-[40%] h-52 bg-slate-50 mt-1">
                                    <img class="w-full h-full" src="{{asset('images/brooks-leibee-27QcqVqgVg4-unsplash.jpg')}}" alt="">
                                    <div class="flex items-center justify-around my-3">
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-thumbs-up text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-thumbs-down text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-comments text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-share-nodes text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4 w-4 border-slate-400 border mx-auto">

                            <div class="flex border bg-white h-80 px-6 py-8">
                                <div class="flex flex-col items-center w-[9%] mt-4">
                                    <img class="w-12 h-12 rounded-full" src="{{asset('images/brooks-leibee-27QcqVqgVg4-unsplash.jpg')}}" alt="">
                                </div>

                                <div class="w-[100%] ml-4">
                                    <div class="flex items-center font-medium gap-2 text-gray-500">
                                        <p>Eustass D. kid</p>
                                        <p class="mb-4 font-bold text-2xl">.</p>
                                        <p>6th February, 2024</p>
                                    </div>

                                    <div class="mt-2">
                                        <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Tech trends</a>
                                        <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Entertainment</a>
                                    </div>

                                    <div class="mt-2.5">
                                        <h1 class="text-xl font-semibold">Lorem ipsum dolor sit amet consectetur</h1>
                                        <p class="text-md font-medium text-gray-500 tracking-wide leading-loose">Lorem ipsum dolor Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi totam consectetur est soluta. Odio quis accusamus libero earum quas ducimus sequi, dolore quos voluptas nemo nam tempore esse obcaecati. Officiis.</p>
                                    </div>

                                    <div class="flex items-center justify-end mt-5 gap-x-6">
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-thumbs-up text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-thumbs-down text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-comments text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-share-nodes text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4 w-4 border-slate-400 border mx-auto"> --}}

                            {{-- <div class="flex border bg-white h-90 px-6 py-8">
                                <div class="flex flex-col items-center w-[9%] mt-4">
                                    <img class="w-12 h-12 rounded-full" src="{{asset('images/anthony-tran-uM45BGGeync-unsplash.jpg')}}" alt="">
                                </div>


                                <div class="w-[100%] ml-4">
                                    <div class="flex items-center font-medium gap-2 text-gray-500">
                                        <p>Eustass D. kid</p>
                                        <p class="mb-4 font-bold text-2xl">.</p>
                                        <p>6th February, 2024</p>
                                    </div>

                                    <div class="mt-2">
                                        <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Tech trends</a>
                                        <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Entertainment</a>
                                    </div>

                                    <div class="mt-2.5">
                                        <h1 class="text-xl font-semibold">Lorem ipsum dolor sit amet consectetur</h1>
                                        <p class="text-md font-medium text-gray-500 tracking-wide leading-loose">Lorem ipsum dolor Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi totam consectetur </p>
                                    </div>
                                    <div class="h w-full mt-4 bg-video">
                                        <video class="bg-video_content" autoplay muted loop>
                                            <source src="{{asset('videos/yours.mp4')}}" type="video/mp4">
                                        </video>
                                    </div>
                                    <div class="flex items-center justify-end mt-5 gap-x-6">
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-thumbs-up text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-thumbs-down text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-comments text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-share-nodes text-xs text-slate-500"></i>
                                            <p class="text-slate-500 text-xs ml-2">10K</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                    </div>

                    <div class="w-[28%]">
                        <div class="h-80 border bg-white flex justify-between px-6 py-8">
                            <div>
                                <p class="font-medium">Categories</p>
                                <div class="flex items-center gap-6 mt-6">
                                    <input type="checkbox" class="w-5 h-5" name="" id="">
                                    <label for="" class="text-sm text-princess font-medium">All Contents</label>
                                </div>
                                <div class="flex items-center gap-6 mt-6">
                                    <input type="checkbox" class="w-5 h-5" name="" id="">
                                    <label for="" class="text-sm text-princess font-medium">Sport News</label>
                                </div>
                                <div class="flex items-center gap-6 mt-6">
                                    <input type="checkbox" class="w-5 h-5" name="" id="">
                                    <label for="" class="text-sm text-princess font-medium">eSports</label>
                                </div>
                                <div class="flex items-center gap-6 mt-6">
                                    <input type="checkbox" class="w-5 h-5" name="" id="">
                                    <label for="" class="text-sm text-princess font-medium">Lorem ipsum</label>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between">
                                <a class="font-medium text-gray-500" href="">Clear All</a>
                                <a class="font-medium text-gray-500" href="">See All</a>
                            </div>
                        </div>

                        <div class="h-80 border bg-white flex justify-between px-6 py-8 mt-8">
                            <div>
                                <p class="font-medium">Viewers favourite</p>
                                <div class="flex items-center gap-6 mt-6">
                                    <input type="checkbox" class="w-5 h-5" name="" id="">
                                    <label for="" class="text-sm text-princess font-medium">All Contents</label>
                                </div>
                                <div class="flex items-center gap-6 mt-6">
                                    <input type="checkbox" class="w-5 h-5" name="" id="">
                                    <label for="" class="text-sm text-princess font-medium">Sport News</label>
                                </div>
                                <div class="flex items-center gap-6 mt-6">
                                    <input type="checkbox" class="w-5 h-5" name="" id="">
                                    <label for="" class="text-sm text-princess font-medium">eSports</label>
                                </div>
                                <div class="flex items-center gap-6 mt-6">
                                    <input type="checkbox" class="w-5 h-5" name="" id="">
                                    <label for="" class="text-sm text-princess font-medium">Lorem ipsum</label>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between">
                                <a class="font-medium text-gray-500" href="">Clear All</a>
                                <a class="font-medium text-gray-500" href="">See All</a>
                            </div>
                        </div>

                        <div class="h-96 border bg-white px-6 py-8 mt-8">
                            <div>
                                <p class="font-medium text-black">Top creators of the month</p>
                            </div>
                            <div class=" flex justify-between items-center mt-6">
                                <img class=" w-8 h-8 rounded-full" src="{{asset('images/cesar-rincon-XHVpWcr5grQ-unsplash.jpg')}}" alt="">

                                <a class="text-sm font-medium mr-9" href="">James Haliday</a>

                                <button class="border rounded-full text-black bg-sky-200 px-4 py-1 text-xs">Level 2</button>
                            </div>
                            <div class="flex justify-between items-center mt-6">
                                <img class=" w-8 h-8 rounded-full" src="{{asset('images/cesar-rincon-XHVpWcr5grQ-unsplash.jpg')}}" alt="">

                                <a class="text-sm font-medium mr-16" href="">Pinnochio</a>

                                <button class="border rounded-full text-black bg-sky-200 px-4 py-1 text-xs">Level 2</button>
                            </div>
                            <div class="flex justify-between items-center mt-6">
                                <img class=" w-8 h-8 rounded-full" src="{{asset('images/cesar-rincon-XHVpWcr5grQ-unsplash.jpg')}}" alt="">

                                <a class="text-sm font-medium mr-7" href="">Monkey D.Luffy</a>

                                <button class="border rounded-full text-black bg-sky-200 px-4 py-1 text-xs">Level 2</button>
                            </div>
                            <div class="flex justify-between items-center mt-6">
                                <img class=" w-8 h-8 rounded-full" src="{{asset('images/cesar-rincon-XHVpWcr5grQ-unsplash.jpg')}}" alt="">

                                <a class="text-sm font-medium mr-10" href="">Echiro D. Oda</a>

                                <button class="border rounded-full text-white bg-purple-500 px-4 py-1 text-xs">Admin</button>
                            </div>
                            <div class="flex justify-end mt-4">
                                <a class="pr-12 font-medium text-gray-500" href="">See More</a>
                            </div>
                        </div>
                        <div class="flex justify-end items-center mt-4">
                            <a class="flex" href="">
                                <i class="fa-solid fa-angle-up text-black mt-1.5"></i>
                                <p class="ml-5 font-medium text-gray-500">Back to top</p>
                            </a>
                        </div>
                    </div>
                </div>

                <hr class="border border-slate-400 mt-8 w-[70%]">

                <div class="w-[70%] h-10 my-6">
                    <div class="flex items-center justify-between">
                        <button class="text-slate-500 space-x-2 font-medium">
                            <i class="fa-solid fa-arrow-left"></i>
                            <span>Previous</span>
                        </button>

                        <button class="text-slate-500 space-x-4 font-medium">
                            <span class="border px-4 py-2 rounded-lg bg-white">1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>...</span>
                            <span>8</span>
                            <span>9</span>
                            <span>10</span>
                        </button>

                        <button class="text-slate-500 space-x-2 font-medium">
                            <span>Next</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>

                </div>

            </div>
            {{-- @include('include.carousel') --}}
            {{--End Your timeline section --}}
        </main>
        {{-- End main section --}}
@endsection
