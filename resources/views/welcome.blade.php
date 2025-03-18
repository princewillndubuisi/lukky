@extends('layout.app')

@section('title')
    Home
@endsection

@section('content')
    {{-- Start main section --}}
    <main class="bg-prince h-full">
        <div class="my-2 h-12 bg-white">
            <div class="w-11/12 mx-auto flex justify-center items-center">
                <p class="w-[92px] h-[28px] text-[12px] rounded-xl flex justify-center items-center text-white sm:w-32 sm:rounded-lg sm:py-1 font-semibold sm:text-xl bg-red-600">Live News</p>
                <marquee class="text-[10px] ml-8 text-dark font-semibold sm:text-xl" behavior="" direction="">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium hic nobis fugiat eaque inventore quo, neque saepe quaerat cumque nihil nostrum soluta, velit facere perspiciatis nisi in obcaecati, molestias dignissimos.</marquee>
            </div>
        </div>

        {{-- Start Trending news section --}}
        <div class="flex justify-between items-center w-11/12 mx-auto mt-12">
            <div>
                <h6 class="text-[13px] font-medium text-black sm:text-4xl sm:text-black">Trending News</h6>
            </div>

            <livewire:search-box />

            <div class="sm:hidden">
                <div id="category-toggle-btn" class="w-[44px] h-[37px] border flex items-center justify-center rounded-lg">
                    <button  class="text-[13px]  text-gray-300" data-dropdown-toggle="category-menu" ><i class='bx bx-menu-alt-left' ></i> </button>
                </div>

                <div class="z-50 hidden w-[165px] h-[162px] overflow-y-auto max-h-[200px] border bg-white justify-between px-6 py-8" id="category-menu" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <livewire:category-blog  />

                    {{-- <div class="flex flex-col justify-between">
                        <a class="font-medium text-gray-500" href="">Clear All</a>
                        <a class="font-medium text-gray-500" href="">See All</a>
                    </div> --}}
                </div>
            </div>

        </div>

        <div class="w-11/12 mx-auto relative overflow-hidden sm:w-11/12 sm:mx-auto  sm:overflow-visible ">
            <div class="slider h-[323px] mt-12 overflow-hidden grid grid-flow-col auto-cols-[80%] sm:h-[400px] sm:mt-0 sm:auto-cols-[25%] sm:gap-x-6 sm:items-center sm:overflow-hidden">
                @foreach ($ten as $tens)
                    <div class="w-[267px] h-inherit sm:w-80 sm:h-80">
                        <a  href="">
                            <div class="w-[267px] h-[256px] sm:h-full sm:w-full">
                                @if ($tens->image)
                                    <img class="block w-full h-full object-cover rounded-[1rem] sm:h-full sm:w-full sm:rounded-[1rem]" src="{{$tens->image}}" alt="">
                                @elseif ($tens->video)
                                    <video class="h-full w-full rounded-[1rem] object-cover sm:rounded-[1rem]" autoplay muted loop>
                                        <source src="{{$tens->video}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    {{-- <p>No media available</p> --}}
                                @endif
                            </div>
                        </a>
                        <div class="mt-2">
                            <a class="font-medium text-[12px] hover:text-sky-400 hover:text-[14px] sm:font-medium sm:text-lg sm:hover:text-sky-400 sm:hover:text-xl" href="{{route('read.post', $tens->id)}}">
                                {{$tens->title}}
                            </a>
                        </div>
                        <div class="w-[41px] h-[16px] ml-[155px] -mt-[259px] sm:w-24 sm:-mt-[335px] sm:ml-48">
                            @if($tens->category)
                                <a class="text-[12px] font-medium rounded-full px-14 py-3 bg-white sm:rounded-full sm:text-[15px] sm:font-medium sm:px-6 sm:py-1" href="">{{$tens->category->title}}</a>
                            @else
                                {{-- <a class="rounded-full bg-white font-medium px-6 py-1" href="#">noCategory</a> --}}
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="absolute inset-0 flex items-center justify-between p-6">
                <button id="leftButton" class="w-12 h-12 p-1 text-[16px] rounded-full bg-black text-white"><i class='bx bxs-chevron-left' ></i> </button>
                <button id="rightButton" class="w-12 h-12 p-1 text-[16px] rounded-full bg-black text-white"><i class='bx bxs-chevron-right' ></i></button>
            </div>
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
        <div class="w-11/12 mx-auto mt-20">
            <div>
                <h6 class="text-4xl font-medium">Your Timeline</h6>
            </div>

            <div class="w-full sm:flex sm:justify-between gap-x-10 mt-8">
                {{-- Start Post blog --}}
                <livewire:post-blog />
                {{-- End Post blog --}}



                <div class="w-[28%] hidden sm:block">
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
                                <input type="checkbox" class="w-5 h-5 rounded-md" name="" id="">
                                <label for="" class="text-sm text-princess font-medium">All Contents</label>
                            </div>
                            <div class="flex items-center gap-6 mt-6">
                                <input type="checkbox" class="w-5 h-5 rounded-md" name="" id="">
                                <label for="" class="text-sm text-princess font-medium">Sport News</label>
                            </div>
                            <div class="flex items-center gap-6 mt-6">
                                <input type="checkbox" class="w-5 h-5 rounded-md" name="" id="">
                                <label for="" class="text-sm text-princess font-medium">eSports</label>
                            </div>
                            <div class="flex items-center gap-6 mt-6">
                                <input type="checkbox" class="w-5 h-5 rounded-md" name="" id="">
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

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const button = document.getElementById('category-toggle-btn');

        button.addEventListener('click', () => {
            // Toggle the button color
            button.classList.toggle('bg-gray-300'); // Gray color
            button.classList.toggle('bg-black');   // Normal color

            // Toggle the icon color
            const icon = button.querySelector('i');
            icon.classList.toggle('text-white'); // Toggle white color
        });
    });
</script>

@endpush
