{{-- 1)Cấu trúc vòng lặp for --}}
{{-- @for($i = 2; $i <= $n; $i++)
    <p>Gía trị của i hiện tại là {{$i}}</p>
@endfor --}}

{{-- 2)Cấu trúc vòng lặp foreach  --}}
{{-- @foreach($users as $user)
    <p>{{$user['name']}}</p>
@endforeach --}}

{{-- 3)Các nhúng php vào blade --}}
{{-- @php
    foreach($users as $user){
        echo $user['name'], '<br>';
    }
@endphp --}}

{{-- Gửi dữ liệu đi từ include  --}}
@include('inc.comment', ['title'=> 'Comment bài viết'])
