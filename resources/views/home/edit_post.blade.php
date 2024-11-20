@extends('layout.app')

@section('title')
    Create Post
@endsection

@section('content')
    <div class="flex items-center justify-center border border-yellow-600 bg-indigo-500 h-[948px]">
        @include('sweetalert::alert')
        <div class="w-[60%] p-6 border rounded-md ">
            <h5 class="font-bold text-2xl">Update a post</h5>
            <hr class="my-2">
            <form action="{{route('user_post.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block my-1 font-bold" for="">Title</label>
                    <input class="w-full bg-indigo-200 border border-white rounded-md focus:outline-none focus:ring-1 focus:border-gray-600" name="title" value="{{$data->title}}" type="text" placeholder="Title">
                </div>
                <div class="mb-4">
                    <label class="block my-1 font-bold" for="">Description</label>
                    <textarea class="w-full bg-indigo-200 border border-white rounded-md focus:outline-none focus:ring-1 focus:border-gray-600" placeholder="Description" name="description" value="" id="" rows="3">{{$data->description}}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block my-1 font-bold" for="">Category</label>
                    <select name="category_id" class="w-full" id="">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $data->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block my-1 font-bold" for="">Update old Image</label>
                    <img style="width: 120px" src="/postimage/{{$data->image}}" class="mb-2" alt="">
                    <input class="w-full bg-indigo-200 border border-white rounded-md focus:outline-none focus:ring-1 focus:border-gray-600" accept=".jpeg,.png,.jpg,.gif,.mp4,.mov,.ogg,.qt" name="image" value="{{$data->image}}" type="file" placeholder="">
                </div>
                <div class="mb-4">
                    <label class="block my-1 font-bold" for="">Update old Video</label>
                    <video class="bg-video_content rounded-md mb-2" style="width: 120px" autoplay muted loop>
                        <source src="/postvideo/{{$data->video}}" type="video/mp4">
                    </video>
                    <input class="w-full bg-indigo-200 border border-white rounded-md focus:outline-none focus:ring-1 focus:border-gray-600" accept=".jpeg,.png,.jpg,.gif,.mp4,.mov,.ogg,.qt" name="video" value="{{$data->video}}" type="file" placeholder="">
                </div>
                <div class="">
                    <input class="border bg-blue-600 px-6 py-2 hover:bg-blue-500 text-white font-bold rounded-md" value="Update post" type="submit">
                </div>
            </form>

        </div>
    </div>
@endsection
