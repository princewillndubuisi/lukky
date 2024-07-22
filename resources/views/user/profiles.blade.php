@extends('layout.app')

@section('title')
    Profile
@endsection

@section('content')

<div class="md:flex bg-gray-100">
    @include('user.include.sidebar')

    <div class="w-[80%] border border-lucy">
        @php
            $date = \Carbon\Carbon::parse(Auth::user()->created_at);
            $isToday = $date->isToday();
            $formattedDate = $isToday ? 'Today' : $date->format('jS M, Y');
            $relativeTime = $date->diffForHumans();
        @endphp
        {{-- Start Username --}}
        <div class="bg-mary w-[100%] h-60">
            <div class="w-[90%] mx-auto flex justify-center">
                <div class="flex mt-24">
                    <div class="">
                        <img class="w-32 h-32 rounded-full" src="{{asset('images/pexels-pixabay-220429.jpg')}}" alt="">
                    </div>
                    <div class="w-[70%] mx-auto space-y-2 ms-10">
                        <div class="flex gap-x-6">
                            <p class="text-2xl -mt-1.5">{{Auth::user()->name}}</p>
                            <a class="border bg-sky-200 rounded-2xl text-gray-500 font-bold text-xs py-0.5 px-4" href="">Level 2 creator</a>
                        </div>
                        <div class="flex items-center text-xs font-bold space-x-3">
                            <p>{{$formattedDate}}</p>
                            <p class="mb-2">.</p>
                            <p>12,500 followers</p>
                        </div>
                        <p class="text-base font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolor iusto eum quod eveniet, deleniti.adipisicing elit. Adipisci dolor iusto eum quod eveniet, deleniti.</p>
                    </div>
                </div>
                <div class="mr-32 mt-24">
                    <i class="fa-regular fa-pen-to-square text-xl"></i>
                </div>
            </div>
        </div>

        {{-- End Username --}}

        <div id="profile" class="tab-content p-6 text-medium text-gray-500 rounded-lg w-full">
            @include('user.include.profilebar')
            {{-- <h3 class="text-lg font-bold text-gray-900 mb-2">Profile Tab</h3>
            <p class="mb-2">This is some placeholder content for the Profile tab's associated content. Clicking another tab will toggle the visibility of this one for the next.</p>
            <p>The tab JavaScript swaps classes to control the content visibility and styling.</p> --}}
        </div>

        <div id="dashboard" class="tab-content p-6 bg-gray-50 text-medium text-gray-500 rounded-lg w-full hidden">
            <h3 class="text-lg font-bold text-gray-900 mb-2">Dashboard Tab</h3>
            <p class="mb-2">This is some placeholder content for the Dashboard tab's associated content. Clicking another tab will toggle the visibility of this one for the next.</p>
        </div>
        <div id="settings" class="tab-content p-6 bg-gray-50 text-medium text-gray-500 rounded-lg w-full hidden">
            <h3 class="text-lg font-bold text-gray-900 mb-2">Settings Tab</h3>
            <p class="mb-2">This is some placeholder content for the Settings tab's associated content. Clicking another tab will toggle the visibility of this one for the next.</p>
        </div>
        <div id="contact" class="tab-content p-6 bg-gray-50 text-medium text-gray-500 rounded-lg w-full hidden">
            <h3 class="text-lg font-bold text-gray-900 mb-2">Contact Tab</h3>
            <p class="mb-2">This is some placeholder content for the Contact tab's associated content. Clicking another tab will toggle the visibility of this one for the next.</p>
        </div>
    </div>

</div>

@endsection
