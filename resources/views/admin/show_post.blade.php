<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                <strong>Success!</strong> {{Session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- Body-->
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">All Post</h2>
            </div>
        </div>

        <div class="col-lg-12 mx-auto">
            <div class="block">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="bg-black">
                            <tr>
                                <th>#</th>
                                <th class="h6">Title</th>
                                <th class="h6">Description</th>
                                <th class="h6">Post by</th>
                                <th class="h6">Status</th>
                                <th class="h6">Type</th>
                                <th class="h6">Image</th>
                                <th class="h6">Video</th>
                                <th class="h6">Delete</th>
                                <th class="h6">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $posts)
                                <tr>
                                    <th scope="row">{{$posts->id}}</th>
                                    <td>{{$posts->title}}</td>
                                    <td>{{$posts->description}}</td>
                                    <td>{{$posts->name}}</td>
                                    <td>{{$posts->post_status}}</td>
                                    <td>{{$posts->usertype}}</td>
                                    <td class="" style="width: 10px;"><img src="postimage/{{$posts->image}}" alt=""></td>
                                    <td class="" style="width: 10px;">
                                        <video class="bg-video_content" autoplay muted loop>
                                            <source src="/postvideo/{{$posts->video}}" type="video/mp4">
                                        </video>
                                    </td>
                                    <td>
                                        <a href="{{route('delete.post', $posts->id)}}" onclick="confirmation(event)" class="btn btn-danger">Delete</a>
                                    </td>
                                    <td>
                                        <a href="{{route('edit.page', $posts->id)}}" class="btn btn-warning">edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

    <script>
        function confirmation(ev) {
            ev.preventDefault();

            var urlToRedirect = ev.currentTarget.getAttribute('href');

            console.log(urlToRedirect);

            swal({
                title : "Are you sure to delete?",
                text : "You won't be able to revert this delete",
                icon : "warning",
                buttons : {
                    cancel : "Cancel",
                    confirmation : "Yes"
                },
                dangerMode : "true",
            })

            .then((willCancel)=>
                {
                    if(willCancel) {
                        window.location.href = urlToRedirect;
                    }
                }
            );
        }
    </script>
  </body>
</html>
