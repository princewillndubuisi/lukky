@extends('layout.app')

@section('title')
    Post
@endsection

@section('content')
    {{-- Start Main post section --}}
    <div class="w-11/12 mx-auto mt-10">
        <div class="flex justify-between gap-10">
            <div class="w-[65%] h-1080">
                <div class="">
                    <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-orange-100 mr-4" href="">Tech trends</a>
                    <a class="border border-orange-100 rounded-full py-1 px-4 font-medium text-sm bg-orange-100" href="">Entertainment</a>
                </div>
                <div class="flex items-center font-medium gap-2 mt-2 text-gray-500">
                    @php
                    $date = \Carbon\Carbon::parse($post->created_at);
                    $isToday = $date->isToday();
                    $formattedDate = $isToday ? 'Today' : $date->format('jS F, Y');
                    $relativeTime = $date->diffForHumans();
                    @endphp

                    <p class="font-bold">Written by {{$post->name}}</p>
                    <p class="font-bold mb-2.5 text-2xl">.</p>
                    <p class="font-bold">{{$formattedDate}}</p>
                    <p class="font-bold mb-2.5 text-2xl">.</p>
                    <p class="font-bold">{{$relativeTime}}</p>
                </div>
                <div class="flex items-center font-medium -mt-2 gap-4 text-black ">
                    <a class="border border-orange-100 rounded-full px-6 font-medium text-sm bg-yellow-400" href="">Level 1</a>
                    <p class="font-bold mb-4 text-3xl">.</p>
                    <a href="" class="text-blue-400 text-lg">Follow</a>
                </div>
                <div class="mt-2">
                    <h1 class="text-4xl font-semibold">{{$post->title}}</h1>
                </div>
                <div class="mt-8 border border-yellow-400 w-[100%] h-[13%]">
                    <img class="w-full h-full" src="/postimage/{{$post->image}}" alt="">
                </div>
                <div class="mt-8">
                    <p class="text-xl leading-loose font-semibold">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                    </p>
                    <div class="mt-16 mb-12">
                        <img class="w-full h-96" src="{{asset('images/bench-accounting-nvzvOPQW0gc-unsplash.jpg')}}" alt="">
                    </div>
                    <p class="text-xl leading-loose font-semibold">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam repellat excepturi amet quod pariatur, ullam sed dolor nesciunt perspiciatis, quibusdam nisi officia enim dolorem beatae ut hic quidem sequi corrupti.
                    </p>
                </div>
                <div class="w-[90%] mx-auto mt-2">
                    <div class="flex justify-between items-center gap-4 px-3">
                        <div class="">
                            <i class="fa-solid fa-thumbs-up text-black text-3xl mr-5"></i>
                            <span class="text-black text-xl font-semibold ml-1">10.0K Likes</span>
                        </div>
                        <div class="py-2 px-4">
                            <i class="fa-solid fa-comments text-black text-3xl mr-5"></i>
                            <span class="text-black text-xl font-semibold ml-1">10.0K Comments</span>
                        </div>
                        <div class="py-2 px-4">
                            <i class="fa-solid fa-share-nodes text-black text-3xl mr-5"></i>
                            <span class="text-black text-xl font-semibold ml-1">10.0K Shares</span>
                        </div>
                    </div>
                </div>

                {{-- Start comments --}}
                <div class="border border-tega flex items-center justify-center bg-white w-full h-20 mt-12 rounded">
                    <a href="" class="text-princess text-xl font-semibold">Log in/Sign up to comment on or like this post</a>
                </div>

                <div class="mt-8 border border-tega rounded bg-white">
                    <div class="my-6 w-[90%] mx-auto">
                        <div class="flex items-center gap-4 font-medium text-xl text-black ">
                            <p class="font-bold">Written by {{$post->name}}</p>
                            <p class="font-bold mb-2.5 text-2xl">.</p>
                            <p class="font-bold">{{$formattedDate}}</p>
                        </div>
                        <div class="font-medium text-white mt-2">
                            <a class="mr-4 border border-orange-100 rounded-full py-2 px-8 font-medium text-sm bg-red-500" href="">
                                Level 2
                            </a>
                            <span class="mr-4 text-4xl text-black">.</span>
                            <a href="" class="text-blue-400 text-lg">Follow</a>
                        </div>
                        <p class="mt-8 text-xl text-princess  leading-loose font-semibold">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum a corporis mollitia cumque itaque ea nulla ipsam quo, ab magni quisquam hic omnis nostrum explicabo rerum numquam necessitatibus vero odit!
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum a corporis mollitia cumque itaque ea nulla ipsam quo, ab magni quisquam hic omnis nost
                        </p>
                    </div>
                </div>
                {{-- End comments --}}
            </div>


            <div class="w-[28%] mt-40">
                <div class="">
                    <h1 class="text-3xl font-semibold">Follow posts by creator</h1>
                </div>

                <div class="mt-8">
                    <div class="w-[100%] h-64">
                        <img class="w-full h-full" src="{{asset('images/ecommerce-2140604_1280.jpg')}}" alt="">
                    </div>

                    <div class="flex items-center gap-4 font-medium text-sm text-black ">
                        <p class="font-bold">Written by {{$post->name}}</p>
                        <p class="font-bold mb-3 text-2xl">.</p>
                        <p class="font-bold">{{$formattedDate}}</p>
                    </div>

                    <div class="text-xl font-semibold">
                        Lorem, ipsum dolor sitted
                    </div>

                    <div class="mt-1">
                        <p class="text-xl text-slate-600 leading-relaxed font-semibold">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, facere eos fugit aliquam ut modi optio earum facilis dolores sed nisi sit
                        </p>
                    </div>

                    <div class="mt-2">
                        <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Tech trends</a>
                        <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200 ml-2" href="">
                            Entertainment
                        </a>
                    </div>
                </div>

                <div class="mt-16">
                    <div class="w-[100%] h-64">
                        <img class="w-full h-full" src="{{asset('images/ecommerce-2140604_1280.jpg')}}" alt="">
                    </div>

                    <div class="flex items-center gap-4 font-medium text-sm text-black ">
                        <p class="font-bold">Written by {{$post->name}}</p>
                        <p class="font-bold mb-3 text-2xl">.</p>
                        <p class="font-bold">{{$formattedDate}}</p>
                    </div>

                    <div class="text-xl font-semibold">
                        Lorem, ipsum dolor sitted
                    </div>

                    <div class="mt-1">
                        <p class="text-xl text-slate-600 leading-relaxed font-semibold">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, facere eos fugit aliquam ut modi optio earum facilis dolores sed nisi sit
                        </p>
                    </div>

                    <div class="mt-2">
                        <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Tech trends</a>
                        <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200 ml-2" href="">
                            Entertainment
                        </a>
                    </div>
                </div>

                <div class="mt-16">
                    <div class="w-[100%] h-64">
                        <img class="w-full h-full" src="{{asset('images/ecommerce-2140604_1280.jpg')}}" alt="">
                    </div>

                    <div class="flex items-center gap-4 font-medium text-sm text-black ">
                        <p class="font-bold">Written by {{$post->name}}</p>
                        <p class="font-bold mb-3 text-2xl">.</p>
                        <p class="font-bold">{{$formattedDate}}</p>
                    </div>

                    <div class="text-xl font-semibold">
                        Lorem, ipsum dolor sitted
                    </div>

                    <div class="mt-1">
                        <p class="text-xl text-slate-600 leading-relaxed font-semibold">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, facere eos fugit aliquam ut modi optio earum facilis dolores sed nisi sit
                        </p>
                    </div>

                    <div class="mt-2">
                        <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Tech trends</a>
                        <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200 ml-2" href="">
                            Entertainment
                        </a>
                    </div>
                </div>

                <div class="mt-16">
                    <div class="w-[100%] h-64">
                        <img class="w-full h-full" src="{{asset('images/ecommerce-2140604_1280.jpg')}}" alt="">
                    </div>

                    <div class="flex items-center gap-4 font-medium text-sm text-black ">
                        <p class="font-bold">Written by {{$post->name}}</p>
                        <p class="font-bold mb-3 text-2xl">.</p>
                        <p class="font-bold">{{$formattedDate}}</p>
                    </div>

                    <div class="text-xl font-semibold">
                        Lorem, ipsum dolor sitted
                    </div>

                    <div class="mt-1">
                        <p class="text-xl text-slate-600 leading-relaxed font-semibold">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, facere eos fugit aliquam ut modi optio earum facilis dolores sed nisi sit
                        </p>
                    </div>

                    <div class="mt-2">
                        <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200" href="">Tech trends</a>
                        <a class="border border-sky-100 rounded-full py-1 px-4 font-medium text-sm bg-sky-200 ml-2" href="">
                            Entertainment
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- End Main post section --}}
@endsection
