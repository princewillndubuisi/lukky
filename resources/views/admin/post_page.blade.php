<!DOCTYPE html>
<html>
  <head>
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
                <div class="bg-yellow-100 border-t border-b border-yellow-500 text-yellow-700 px-4 py-3 mt-1 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ Session('success') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close" onclick="this.parentElement.style.display='none';">
                        <span class="text-2xl font-semibold text-yellow-700" aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <!-- Body-->
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Add Post</h2>
                </div>
            </div>

            <div class="col-lg-10 mx-auto">
                <div class="block">
                    <div class="block-body">
                        <form method="POST" action="{{route('add.post')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="form-control-label text-white">Post Title</label>
                                <input type="text" name="title" placeholder="Title" class="form-control">
                            </div>
                            <div class="form-group ">
                                <label class="form-control-label text-white">Post Description</label>
                                <textarea class="form-control" name="description" id=""  rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-white">Image</label>
                                <input type="file" name="image"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-white">Video</label>
                                <input type="file" accept=".jpeg,.png,.jpg,.gif,.mp4,.mov,.ogg,.qt" name="video"  class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary">
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
