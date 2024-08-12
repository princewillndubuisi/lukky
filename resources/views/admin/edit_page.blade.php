<!DOCTYPE html>
<html>
  <head>
    <base href="/public">

    @include('admin.include.css')
  </head>
  <body>
    @include('admin.include.header')

    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('admin.include.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        @if (Session()->has('success'))
            <div class="alert alert-warning alert-dismissible fade show mt-1" role="alert">
                <strong>Success!</strong> {{Session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Body-->
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Update Post</h2>
            </div>
        </div>

        <div class="col-lg-10 mx-auto">
            <div class="block">
                <div class="block-body">
                    <form method="POST" action="{{route('update.post', $post->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="form-control-label text-white">Post Title</label>
                            <input type="text" name="title" value="{{$post->title}}" placeholder="Title" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label class="form-control-label text-white">Post Description</label>
                            <textarea class="form-control" name="description"id=""  rows="3">{{$post->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label text-white">Category</label>
                            <select class="form-select form-control" name="category_id" aria-label="Default select example">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label text-white">Update old image</label>
                            <img style="width: 120px" src="/postimage/{{$post->image}}" class="mb-3" alt="">
                            <input type="file" name="image" value="{{$post->image}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label text-white">Update old Video</label>
                            <video class="bg-video_content rounded-md mb-2" style="width: 120px" autoplay muted loop>
                                <source src="/postvideo/{{$post->video}}" type="video/mp4">
                            </video>
                            <input type="file" accept=".jpeg,.png,.jpg,.gif,.mp4,.mov,.ogg,.qt" name="video" value="{{$post->video}}"  class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Body end-->

        <!-- Footer-->
        @include('admin.include.footer')
        <!-- Footer end-->
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.include.js')
  </body>
</html>
