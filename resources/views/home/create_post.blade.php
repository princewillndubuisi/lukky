@extends('layout.app')

@section('title')
    Create Post
@endsection

@section('content')
    <div class="flex items-center justify-center bg-indigo-200 h-screen">
        @include('sweetalert::alert')
        <div class="w-[40%] p-6 border rounded-md">
            <h5 class="font-bold text-2xl">Create a post</h5>
            <hr class="my-2">
            <form action="{{route('user.post')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label class="block my-2 font-bold" for="">Title</label>
                    <input class="w-full bg-indigo-200 border border-white rounded-md focus:outline-none focus:ring-1 focus:border-gray-600" name="title" type="text" placeholder="Title">
                </div>
                <div class="mb-6">
                    <label class="block my-2 font-bold" for="">Description</label>
                    <textarea class="w-full bg-indigo-200 border border-white rounded-md focus:outline-none focus:ring-1 focus:border-gray-600" placeholder="Description" name="description" id="" rows="3"></textarea>
                </div>
                <div class="mb-6">
                    <label class="block my-2 font-bold" for="">Add Image</label>
                    <input class="w-full bg-indigo-200 border border-white rounded-md focus:outline-none focus:ring-1 focus:border-gray-600" accept=".jpeg,.png,.jpg,.gif,.mp4,.mov,.ogg,.qt" name="image" type="file" placeholder="">
                </div>
                <div class="mb-6">
                    <label class="block my-2 font-bold" for="">Add Video</label>
                    <input class="w-full bg-indigo-200 border border-white rounded-md focus:outline-none focus:ring-1 focus:border-gray-600" accept=".jpeg,.png,.jpg,.gif,.mp4,.mov,.ogg,.qt" name="video" type="file" placeholder="">
                </div>
                <div class="">
                    <input class="border bg-blue-600 px-6 py-2 hover:bg-blue-500 text-white font-bold rounded-md" value="Add post" type="submit">
                </div>
            </form>

        </div>
    </div>
@endsection
