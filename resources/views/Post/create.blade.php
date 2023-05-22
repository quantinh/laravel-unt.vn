    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- Thư viên biên tập tiny.cloud --}}
        <script src="https://cdn.tiny.cloud/1/2atz1z10b5nr3uca5yjmuczzzor7gw44gcwkfxpdgzr89743/tinymce/5/tinymce.min.js"
                referrerpolicy="origin">
        </script>
        <script type="text/javascript">
            var editor_config = {
                //Copy đường dẫn dự án vào đây để upload ảnh
                path_absolute: "http://localhost:8181/Unt/Framework/LaravelPro/Lesson/section-3/laravel-unt.vn/",
                selector: 'textarea',
                relative_urls: false,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                file_picker_callback: function(callback, value, meta) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                        'body')[0].clientWidth;
                    var y = window.innerHeight || document.documentElement.clientHeight || document
                        .getElementsByTagName('body')[0].clientHeight;
                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                    if (meta.filetype == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }
                    tinyMCE.activeEditor.windowManager.openUrl({
                        url: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no",
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }
            };
            tinymce.init(editor_config);
        </script>
        {{-- Thư viện bootstrap qua link:cdn --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Thêm bài viết</title>
    </head>

    <body>
        <div class="container">
            <h1>Thêm bài viết</h1>
            {{-- Hiển thị khi có ít nhất một lỗi --}}
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            {!! Form::open(['url' => 'post/store', 'method' => 'POST', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Tiêu đề']) !!}
                    @error('title')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::textarea('content', '', ['class' => 'form-control', 'placeholder' => 'Nội dung', 'cols' => '30', 'rows' => '10']) !!}
                    @error('content')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::file('file', ['class' => 'form-control-file']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Thêm mới', ['class' => 'btn btn-primary', 'name' => 'sm-add']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </body>

    </html>
