<!DOCTYPE html>
<html>
  <head>
    @include('admin.include.css')

    <script src="editor-sdk.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
  </head>
  <body>

    <style>
        .ck-editor__editable {
            min-height: 450px !important;
            border-color: #343a40 !important;
        }

        /* Change toolbar background color */
        .ck-toolbar {
            background-color: #1a202c !important; /* Dark mode example */
            border-color: #343a40 !important;
        }

        /* Change button colors */
        .ck-button {
            background-color: #33a40 !important; /* Dark Gray */
            color: white !important; /* Text color */
        }



        /* Change editor content background and text color */
        .ck-editor__editable {
            background-color: #343a40 !important; /* Dark background */
            color: white !important; /* Text color */
            min-height: 450px !important; /* Set height */
        }

        /* Change placeholder text color */
        .ck-placeholder {
            color: #b0b0b0 !important;
            border-color: #343a40 !important;
        }

    </style>



    @include('admin.include.header')

    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('admin.include.sidebar')
      <!-- Sidebar Navigation end-->

        <div class="page-content w-[2000px]">
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
                        <form method="POST" action="{{ route('add.post') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="flex justify-between my-4">
                                <!-- Post Title -->
                                <div class="form-group col-5">
                                    <label class="form-control-label text-white">Post Title</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control bg-dark rounded text-white">
                                    @error('title')
                                        <span class="alert alert-danger mt-2">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Category Selection -->
                                <div class="form-group col-5">
                                    <label class="form-control-label text-white">Category</label>
                                    <select class="form-select form-control bg-dark rounded text-white" name="category_id">
                                        @foreach ($category as $categorys)
                                            <option value="{{ $categorys->id }}">{{ $categorys->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="alert alert-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label class="form-control-label text-white" for="">Post Description</label>
                                <textarea class="form-control rounded text-white" name="description" rows="2"></textarea>
                                @error('description')
                                    <span class="alert alert-danger mt-2">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Post Body (With Embedded Images/Videos) -->
                            <div class="form-group col-12">
                                <label class="form-control-label text-white">Post Body</label>
                                <textarea class="form-control rounded" name="body" id="editor"></textarea>
                                @error('body')
                                    <span class="alert alert-danger mt-2">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group col-5">
                                <input type="submit" value="Submit" class="btn btn-primary col-5">
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

    <script>
        var element = document.getElementById('editor');

        ClassicEditor
            .create(element, {
                ckfinder: {
                    uploadUrl: "{{ route('upload.image')}}?&_token={{ csrf_token() }}"
                }
            })
            .then(editor => {
                console.log("Editor is ready!");

                // Custom integration with SquidexFormField
                var field = new SquidexFormField();

                // Handle value changes and set the text to the editor.
                field.onValueChanged(function (value) {
                    if (value) {
                        editor.setData(value);
                    }
                });

                // Disable the editor when needed.
                field.onDisabled(function (disabled) {
                    editor.isReadOnly = disabled;
                });

                editor.model.document.on('change', function () {
                    var data = editor.getData();

                    // Notify UI of the value change
                    field.valueChanged(data);
                });

                editor.ui.focusTracker.on('change:isFocused', function (event, name, isFocused) {
                    if (!isFocused) {
                        // Notify UI that the field has been touched.
                        field.touched();
                    }
                });

            })
            .catch(error => {
                console.error("There was an error initializing CKEditor:", error);
            });
    </script>

  </body>
</html>
