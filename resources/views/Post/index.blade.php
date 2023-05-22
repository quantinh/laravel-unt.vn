<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Thư viện bootstrap qua link:cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Trang hiển thị danh sách bài viết</title>
</head>

<body>
    <h1>Trang danh sách bài viết</h1>
    {{-- Thông báo đã thêm thành công --}}
    @if(session('status'))
        {{-- <div class="alert alert-success">
            {{session('status')}}
        </div> --}}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Thông báo !</h4>
                {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="">{{ $post->title }}</a>
                {{-- <img src="{{url($post->thumbnail)}}" alt=""> --}}
                <p>{!!$post->content!!}</p>
            </li>
        @endforeach
    </ul>
    {{-- Thanh phân trang --}}
    {{$posts->appends(['sort'=>'votes'])->links()}}
</body>

</html>
