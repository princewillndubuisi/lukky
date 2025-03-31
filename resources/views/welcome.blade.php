@extends('layout.app')

@section('title')
    Home
@endsection

@section('content')
    {{-- Start main section --}}
    <main class="bg-prince h-full">
        <div class="my-2 h-12 flex justify-center items-center">
            <div class="w-11/12 mx-auto flex justify-center items-center">
                <p class="w-[92px] h-[28px] text-[12px] rounded-xl bg-red-500 flex justify-center items-center text-white sm:w-32 sm:rounded-lg sm:py-1 font-semibold sm:text-xl ">Live News</p>
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
                <div id="category-toggle-btn" class="w-[44px] h-[37px] border border-black flex items-center justify-center rounded-lg">
                    <button  class="text-[13px] text-black" data-dropdown-toggle="category-menu" ><i class='bx bx-menu-alt-left' ></i> </button>
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

        <div class="w-11/12 mx-auto relative sm:w-11/12 sm:mx-auto">
            <!-- Slider Container (unchanged) -->
            <div class="slider h-[323px] mt-12 overflow-hidden grid grid-flow-col auto-cols-[80%] xs:gap-x-6 sm:h-[400px] sm:mt-0 sm:auto-cols-[25%] sm:gap-x-6 sm:items-center sm:overflow-hidden">
                @foreach ($ten as $tens)
                    <div class="w-[267px] h-inherit sm:w-80 sm:h-80">
                        <a href="{{route('read.post', $tens->id)}}" class="relative z-[5]">
                            <div class="w-[267px] h-[256px] sm:h-full sm:w-full">
                                @if ($tens->image)
                                    <img class="block w-full h-full object-cover rounded-[1rem] sm:h-full sm:w-full sm:rounded-[1rem]" src="{{$tens->image}}" alt="">
                                @elseif ($tens->video)
                                    <video class="h-full w-full rounded-[1rem] object-cover sm:rounded-[1rem]" autoplay muted loop>
                                        <source src="{{$tens->video}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
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
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        
            <!-- Navigation Buttons - Modified to not block links -->
            <div class="absolute inset-0 flex items-center justify-between  p-6 pointer-events-none z-[10]">
                <button id="leftButton" class="w-12 h-12 p-1 text-[16px] rounded-full bg-black text-white pointer-events-auto">
                    <i class='bx bxs-chevron-left'></i>
                </button>
                <button id="rightButton" class="w-12 h-12 p-1 text-[16px] rounded-full bg-black text-white pointer-events-auto">
                    <i class='bx bxs-chevron-right'></i>
                </button>
            </div>
        </div>
        
        <style>
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
        </style>
        {{--End Trending news section --}}

        {{-- Start Your timeline section --}}
        <div class="w-11/12 mx-auto mt-20 sm:w-11/12">
            <div>
                <h6 class="text-4xl font-medium">Your Timeline</h6>
            </div>

            <div class="w-full gap-x-10 mt-8 sm:flex sm:justify-between ">
                {{-- Start Post blog --}}
                <livewire:post-blog />
                {{-- End Post blog --}}



                <div class="w-[28%] hidden sm:block">
                    <div class="h-80 border bg-white flex justify-between px-6 py-8">
                        <livewire:category-blog  />

                        {{-- <div class="flex flex-col justify-between">
                            <a class="font-medium text-gray-500" href="">Clear All</a>
                            <a class="font-medium text-gray-500" href="">See All</a>
                        </div> --}}
                    </div>


                    {{-- <div class="h-80 border bg-white flex justify-between px-6 py-8 mt-8">
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
                    </div> --}}


                    <div class="hidden relative h-[400px] w-full border-2 rounded-md mt-8 sm:block">
                        @if($adverts && count($adverts) > 0)
                            <x-advert-card :adverts="$adverts" />
                        @else
                            <div class="flex items-center justify-center h-full bg-red-50">
                                <p class="text-red-500 font-bold">NO ADVERTS FOUND! Check:</p>
                                <ul class="list-disc ml-6 text-red-500">
                                    <li>Database records exist</li>
                                    <li>Files are in storage/app/public</li>
                                    <li>Storage is linked (php artisan storage:link)</li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex justify-end items-center mt-4">
                        <a class="flex" href="#page-top">
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
    // Categories
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
