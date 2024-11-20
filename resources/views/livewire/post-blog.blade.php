<div class="w-[75%]">

    @foreach ($this->post as $posts)
        @php
            $date = \Carbon\Carbon::parse($posts->created_at);
            $isToday = $date->isToday();
            $formattedDate = $isToday ? 'Today' : $date->format('jS M, Y');
            $relativeTime = $date->diffForHumans();
        @endphp

        @if ($posts->image)
            <div class="border flex justify-center bg-white h-80 px-6 py-10 gap-x-4">
                <div class="flex flex-col items-center w-[9%]">
                    @if (Auth::user())
                        <img class="w-12 h-12 rounded-full" src="{{ asset('storage/' . Auth::user()->photo) }}" alt="">
                    @else
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/anthony-tran-uM45BGGeync-unsplash.jpg') }}" alt="">
                    @endif
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
                        <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">{{$posts->category->title}}</a>
                    </div>

                    <div class="">
                        <a href="{{route('read.post', $posts->id)}}">
                            <h1 class="text-xl font-semibold mb-2 hover:text-sky-400 hover:text-2xl">{{$posts->title}}</h1>
                        </a>
                        <p class="text-base font-medium text-gray-500 tracking-wide leading-relaxed">Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi totam consectetur est soluta. Odio quis accusamus libero earum quas ducimus sequi Lorem ipsum dolor quas ducimus hgud</p>
                    </div>
                </div>

                <div class="w-[40%] h-52 bg-slate-50 mt-1">
                    <img class="w-full h-full" src="/postimage/{{$posts->image}}" alt="">
                    <div class="flex items-center justify-around my-3">
                       <livewire:like-button  :key="$posts->id" :posts="$posts"  />
                        <div class="flex items-center">
                            <i class="fa-solid fa-thumbs-down text-xs text-slate-500"></i>
                            <p class="text-slate-500 text-xs ml-2">10K</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fa-solid fa-comments text-xs text-slate-500"></i>
                            <p class="text-slate-500 text-xs ml-2">{{$posts->comments()->count()}}</p>
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
                    @if (Auth::user())
                        <img class="w-12 h-12 rounded-full" src="{{ asset('storage/' . Auth::user()->photo) }}" alt="">
                    @else
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/anthony-tran-uM45BGGeync-unsplash.jpg') }}" alt="">
                    @endif
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
                        <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">{{$posts->category->title}}</a>
                    </div>

                    <div class="mt-2.5">
                        <h1 class="text-xl font-semibold">{{$posts->title}}</h1>
                        <p class="text-md font-medium text-gray-500 tracking-wide leading-loose">Lorem ipsum dolor Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi totam consectetur </p>
                    </div>
                    <div class="w-full mt-4 bg-video">
                        <video class="bg-video_content rounded-md" autoplay muted loop>
                            <source src="/postvideo/{{$posts->video}}" type="video/mp4">
                        </video>
                    </div>
                    <div class="flex items-center justify-end mt-5 gap-x-6">
                       <livewire:like-button  :key="$posts->id" :posts="$posts" />
                        <div class="flex items-center">
                            <i class="fa-solid fa-thumbs-down text-xs text-slate-500"></i>
                            <p class="text-slate-500 text-xs ml-2">10K</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fa-solid fa-comments text-xs text-slate-500"></i>
                            <p class="text-slate-500 text-xs ml-2">{{$posts->comments()->count()}}</p>
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
                    @if (Auth::user())
                        <img class="w-12 h-12 rounded-full" src="{{ asset('storage/' . Auth::user()->photo) }}" alt="">
                    @else
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/anthony-tran-uM45BGGeync-unsplash.jpg') }}" alt="">
                    @endif
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
                        <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">{{$posts->category->title}}</a>
                    </div>

                    <div class="mt-2.5">
                        <h1 class="text-xl font-semibold">{{$posts->title}}</h1>
                        <p class="text-md font-medium text-gray-500 tracking-wide leading-loose">Lorem ipsum dolor Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi totam consectetur est soluta. Odio quis accusamus libero earum quas ducimus sequi, dolore quos voluptas nemo nam tempore esse obcaecati. Officiis.</p>
                    </div>

                    <div class="flex items-center justify-end mt-5 gap-x-6 mr-4">
                       <livewire:like-button  :key="$posts->id" :posts="$posts" />
                        <div class="flex items-center">
                            <i class="fa-solid fa-thumbs-down text-xs text-slate-500"></i>
                            <p class="text-slate-500 text-xs ml-2">10K</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fa-solid fa-comments text-xs text-slate-500"></i>
                            <p class="text-slate-500 text-xs ml-2">{{$posts->comments()->count()}}</p>
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

    <hr class="border my-8 border-slate-400 w-[full">

    {{-- Pagination --}}
    <div class="w-full h-10 mb-20">
        <div class="pagination">
            {{ $this->post->onEachSide(1)->links() }}
        </div>
    </div>
</div>
