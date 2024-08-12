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
                <div class="flex mt-24 w-full">
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
                        <div class="">
                            <p class="text-base font-medium">{{Auth::user()->description}}</p>
                        </div>
                    </div>
                </div>
                <div class="mr-32 mt-24">
                    <button type="button"  wire:click="loadUser" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal">
                        <i class="fa-regular fa-pen-to-square text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        {{--User Modal --}}
        {{-- <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Sign in to our platform
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" action="#">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                                <input type="text" wire:model="names" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name" required />
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                <input type="email" wire:model="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                            </div>
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}


        <livewire:edit-profile />


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
