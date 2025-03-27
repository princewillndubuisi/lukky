<div class=" w-full sm:w-[80%]">

    @foreach ($this->post as $posts)
        @php
            $date = \Carbon\Carbon::parse($posts->created_at);
            $isToday = $date->isToday();
            $formattedDate = $isToday ? 'Today' : $date->format('jS M, Y');
            $relativeTime = $date->diffForHumans();
        @endphp

        {{-- @php
            $sentences = explode('.', strip_tags($posts->description));
            $preview = implode('.', array_slice($sentences, 0, 3)) . '.';
        @endphp --}}

        @if ($posts->image)
            <div class="w-full h-[520px] py-10 flex flex-col border border-yellow-400 sm:flex sm:flex-row sm:justify-center bg-white sm:w-full sm:h-80 px-6 sm:py-10 sm:gap-x-4">

                <div class="w-full h-[180px] sm:w-[70%] sm:h-full ">
                    <div class=" h-[48px] flex items-center">

                        <div class="w-[48px] h-[48px] mr-4">
                            @if (Auth::user())
                                <img class="w-full h-full sm:w-12 sm:h-12 rounded-full" src="{{ asset('storage/' . Auth::user()->photo) }}" alt="">
                            @else
                                <img class="w-full h-full sm:w-12 sm:h-12 rounded-full" src="{{ asset('images/user.jpg') }}" alt="">
                            @endif
                        </div>

                        <div class="h-[48px]">
                            <div class="sm:h-[20px] flex items-center font-medium gap-2 text-gray-500">
                                <p class="text-[12px] font-medium sm:text-base">{{$posts->name}}</p>
                                <p class="hidden sm:block font-medium mb-4 text-2xl">.</p>
                                <p class="hidden sm:block sm:text-base">{{$formattedDate}}</p>
                                <p class="text-[12px] font-medium mb-4 sm:text-2xl">.</p>
                                <p class="text-[12px] font-medium sm:text-base">{{$relativeTime}}</p>
                            </div>

                            <div class="mb-4 mt-3 sm:mt-1">
                                <a class="w-[94px] h-[20px] px-4 py-[0.5px] font-medium text-[12px] border border-sky-100 rounded-full sm:py-[3px] sm:w-[113px] sm:h-[20px] sm:px-4 sm:font-medium sm:text-[12px] bg-sky-200" href="">Tech trends</a>
                                <a class="w-[94px] h-[20px] px-4 py-[0.5px] font-medium text-[12px] border border-sky-100 rounded-full sm:py-[3px] sm:w-[113px] sm:h-[20px] sm:px-4 sm:font-medium sm:text-[12px] bg-sky-200" href="">{{$posts->category->title}}</a>
                            </div>
                        </div>
                    </div>

                    <a class="sm:ml-16" href="{{route('read.post', $posts->id)}}">
                        <div class="mt-6 mb-2 sm:mt-0">
                            <h1 class="text-3xl font-semibold sm:text-2xl transition-all duration-300 ease-in-out hover:text-sky-400 hover:text-4xl sm:hover:text-2xl">
                                {{$posts->title}}
                            </h1>
                        </div>
                        <p class="text-[12px] font-medium sm:text-base sm:font-medium md:text-lg text-gray-500 tracking-wide leading-relaxed sm:ml-0 transition-all duration-300 ease-in-out hover:text-gray-400">
                            {{$posts->description}}
                        </p>
                    </a>                    
                </div>


                <div class="w-full h-[280px] sm:mt-4 sm:w-[40%] sm:h-52 bg-slate-50 mt-1">
                    <img class="w-full h-[280px] sm:mt- rounded-md sm:rounded-md sm:w-full sm:h-full" src="{{$posts->image}}" alt="">
                    <div class="flex my-4 items-center justify-around sm:my-3">
                       <livewire:like-button  :key="$posts->id" :posts="$posts"  />
                        <div class="flex items-center">
                            <i class="fa-solid fa-thumbs-down text-[10px] sm:text-xs text-slate-500"></i>
                            <p class="text-slate-500 text-[10px] sm:text-xs ml-2">10K</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fa-solid fa-comments text-[10px] sm:text-xs text-slate-500"></i>
                            <p class="text-slate-500 text-[10px] sm:text-xs ml-2">{{$posts->comments()->count()}}</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fa-solid fa-share-nodes text-[10px] sm:text-xs text-slate-500"></i>
                            <p class="text-slate-500 text-[10px] sm:text-xs ml-2">10K</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-8 w-4 border border-slate-400 mx-auto sm:my-4">

        @elseif ($posts->video)
            <div class="flex border bg-white h-90 px-6 py-8">
                <div class="flex flex-col items-center w-[9%]">
                    @if (Auth::user())
                        <img class="w-12 h-12 rounded-full" src="{{ asset('storage/' . Auth::user()->photo) }}" alt="">
                    @else
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/user.jpg') }}" alt="">
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
                        <p class="text-md font-medium text-gray-500 tracking-wide leading-loose">{{$posts->description}} </p>
                    </div>
                    <div class="w-full mt-4 bg-video">
                        <video class="bg-video_content rounded-md sm:rounded-md" autoplay muted loop>
                            <source src="{{$posts->video}}" type="video/mp4">
                        </video>
                    </div>
                    <div class="flex items-center justify-end mt-5 gap-x-6">
                       <livewire:like-button  :key="$posts->id" :posts="$posts" />
                        <div class="flex items-center">
                            <i class="fa-solid fa-thumbs-down text-[10px] sm:text-xs text-slate-500"></i>
                            <p class="text-slate-500 text-[10px] sm:text-xs ml-2">10K</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fa-solid fa-comments text-[10px] sm:text-xs text-slate-500"></i>
                            <p class="text-slate-500 text-[10px] sm:text-xs ml-2">{{$posts->comments()->count()}}</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fa-solid fa-share-nodes text-[10px] sm:text-xs text-slate-500"></i>
                            <p class="text-slate-500 text-[10px] sm:text-xs ml-2">10K</p>
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
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/user.jpg') }}" alt="">
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

                    <a class="mt-2.5 border border-yellow-500" href="{{route('read.post', $posts->id)}}">
                        <h1 class="text-3xl font-semibold hover:text-sky-400 hover:text-4xl sm:text-2xl sm:hover:text-2xl">{{$posts->title}}</h1>
                        <p class="text-md font-medium text-gray-500 hover:text-gray-400 tracking-wide leading-loose">{{$posts->description}}</p>
                    </a>

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
    @endforeach

    <hr class="w-fullborder my-8 border-slate-400 sm:w-full">

    {{-- Pagination --}}
    <div class="w-fullsm:w-full h-10 mb-20">
        <div class="pagination ">
            {{ $this->post->onEachSide(1)->links() }}
        </div>
    </div>
</div>
