@extends('layout.app')

@section('title')
    Category
@endsection

@section('content')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px) scale(0.98);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .fade-in-up {
        animation: fadeInUp 0.5s ease-out both;
    }
</style>

<div class="max-w-6xl mx-auto px-4 sm:px-6 py-8">
    @foreach ($post as $posts)
        @php
            $date = \Carbon\Carbon::parse($posts->created_at);
            $isToday = $date->isToday();
            $formattedDate = $isToday ? 'Today' : $date->format('jS M, Y');
            $relativeTime = $date->diffForHumans();
        @endphp

        <div class="fade-in-up group transition-transform duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg 
                    flex flex-col sm:flex-row gap-4 bg-white border border-gray-100 rounded-2xl  overflow-hidden">
            
            {{-- Media --}}
            <div class="w-full sm:w-5/12 h-48 sm:h-40 flex-shrink-0">
                @if ($posts->image)
                    <img src="{{ $posts->image }}" alt="{{ $posts->title }}"
                         class="w-full h-full object-cover object-center rounded-t-xl sm:rounded-t-none sm:rounded-l-xl">
                @elseif ($posts->video)
                    <video class="w-full h-full object-cover rounded-t-xl sm:rounded-t-none sm:rounded-l-xl" autoplay muted loop>
                        <source src="{{ $posts->video }}" type="video/mp4">
                    </video>
                @else
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-sm">
                        No media
                    </div>
                @endif
            </div>

            {{-- Content --}}
            <div class="w-full sm:w-7/12 py-4 px-5 flex flex-col justify-between">
                {{-- Header Info --}}
                <div class="flex items-start justify-between mb-2">
                    <div class="flex items-center gap-2">
                        <img src="{{ Auth::user() ? asset('storage/' . Auth::user()->photo) : asset('images/user.jpg') }}"
                             class="w-14 h-14 sm:w-10 sm:h-10  rounded-full border object-cover" alt="User">
                        <div class="text-[10px] font-medium sm:text-sm">
                            <p class=" text-gray-800">{{ $posts->name }}</p>
                            <span class="text-[10px] font-medium sm:text-sm text-gray-500">{{ $formattedDate }} • {{ $relativeTime }}</span>
                        </div>
                    </div>
                    {{-- Tags --}}
                    <div class="flex sm:flex flex-wrap gap-1">
                        <span class="bg-sky-100 text-sky-700 text-[10px] px-2 py-0.5 rounded-full">Tech</span>
                        <span class="bg-gray-100 text-gray-700 text-[10px] px-2 py-0.5 rounded-full">{{ $posts->category->title }}</span>
                    </div>
                </div>

                {{-- Title + Description --}}
                <a href="{{ route('read.post', $posts->id) }}"
                    class="group block hover:bg-gray-50 transition-all duration-300 rounded-lg px-2 py-1">
                 
                     <h2 class="text-2xl font-semibold sm:text-xl text-gray-900 leading-snug mb-1 relative inline-block
                                after:block after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-sky-500
                                after:transition-all after:duration-300 group-hover:after:w-full">
                         {{ \Illuminate\Support\Str::limit($posts->title, 80) }}
                     </h2>
                 
                     <p class=" text-gray-600 group-hover:text-gray-800 transition-colors duration-300 text-[12px] font-medium sm:text-sm md:text-lg">
                         {{ \Illuminate\Support\Str::limit(strip_tags($posts->description), 140) }}
                     </p>
                </a>
                 

                {{-- Actions --}}
                <div class="flex items-center justify-between mt-4 text-gray-500">
                    <div class="flex items-center gap-4 text-[10px] sm:text-xs">
                        <livewire:like-button :key="$posts->id" :posts="$posts" />
                        <div class="flex items-center gap-1">
                            <i class="fa-solid fa-thumbs-down"></i>
                            <span class="">10K</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fa-solid fa-comments"></i>
                            <span>{{ $posts->comments()->count() }}</span>
                        </div>
                    </div>
                    <a href="#" onclick="sharePost('{{ $posts->id }}', '{{ $posts->title }}', '{{ asset('storage/' . $posts->image) }}')"
                       class="hover:text-sky-500 transition">
                        <i class="fa-solid fa-share-nodes"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr class="my-6 w-4 border border-slate-400 mx-auto">
    @endforeach

    <hr class="w-fullborder my-8 border-slate-400 sm:w-full">

    {{-- Pagination --}}
    <div class="flex justify-center my-8">
        {{ $post->onEachSide(1)->links() }}
    </div>
</div>
@endsection
