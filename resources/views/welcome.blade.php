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

            <livewire:search-box />
            </div>

            <div class="flex gap-x-6 items-center w-11/12 mx-auto mt-8">
                @foreach ($ten as $ten)
                <div class="w-80 h-80">
                    <a  href="">
                        <div class="h-full w-full">
                            @if ($ten->image)
                                <img class="h-full w-full rounded-md" src="/postimage/{{$ten->image}}" alt="">
                            @elseif ($ten->video)
                                <video class="h-full w-full object-cover rounded-md" autoplay muted loop>
                                    <source src="/postvideo/{{$ten->video}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                {{-- <p>No media available</p> --}}
                            @endif
                        </div>
                    </a>
                    <div class="mt-2">
                        <a class="font-medium text-lg hover:text-sky-400 hover:text-xl" href="{{route('read.post', $ten->id)}}">
                            {{$ten->title}}
                        </a>
                    </div>
                    <div class="w-24 rounded-full -mt-[335px] ml-44">
                        @if($ten->category)
                            <a class="rounded-full bg-white font-medium px-6 py-1" href="">{{$ten->category->title}}</a>
                        @else
                            {{-- <a class="rounded-full bg-white font-medium px-6 py-1" href="#">noCategory</a> --}}
                        @endif
                    </div>
                </div>
                @endforeach

                {{-- <div class="w-80 h-80">
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
                </div> --}}
            </div>
            {{--End Trending news section --}}

            {{-- Start Your timeline section --}}
            <div class="w-11/12 mx-auto mt-28">
                <div>
                    <h6 class="text-4xl font-medium">Your Timeline</h6>
                </div>

                <div class="flex justify-between gap-x-10 mt-8">
                    {{-- Start Post blog --}}
                    <livewire:post-blog />
                    {{-- End Post blog --}}

                    <div class="w-[28%]">
                        <div class="h-80 border bg-white flex justify-between px-6 py-8">
                            <livewire:category-blog  />

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

                        <div class="h-84 border bg-white px-6 py-8 mt-8">
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
                            <div class="flex justify-end mt-6">
                                <a class=" font-medium text-gray-500" href="">See More</a>
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



                {{-- <div class="w-[70%] h-10 border border-yellow-500 my-6">
                    <div class="pagination">
                        {{ $post->onEachSide(1)->links() }}
                    </div>
                </div> --}}
            </div>
            {{--End Your timeline section --}}
        </main>
        {{-- End main section --}}
@endsection
