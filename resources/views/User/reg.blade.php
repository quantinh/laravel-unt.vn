<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Thư viện bootstrap qua link:cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Đăng kí tài khoản</title>
</head>

<body>
    <div class="container">
        <h1>Thêm bài viết</h1>
           {!! Form::open(['url'=>'user/store','method'=>'POST']) !!}
                <div class="form-group">
                    {!! Form::label('username', 'Tên đăng nhập') !!}
                    {!! Form::text('username', '', ['class'=>'form-control', 'placeholder'=>'Tên đăng nhập']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Mật khẩu') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', '', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'Thành phố') !!}
                    {!! Form::select('city', [0=> 'Chọn', 1=>'Hà Nội', 2=>'TP.Hồ Chí Minh', 3=>'Đà Nẵng'], 2, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('gender', 'Giới tính') !!}
                    <div class="form-check">
                        {!! Form::radio('gender', 'male', 'checked', ['class'=>'form-check-input', 'id'=>'male']) !!}
                        {!! Form::label('male', 'Nam', ['class'=>'form-check-label']) !!}
                    </div>
                    <div class="form-check">
                        {!! Form::radio('gender', 'female', '', ['class'=>'form-check-input', 'id'=>'female']) !!}
                        {!! Form::label('female', 'Nữ', ['class'=>'form-check-label']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('skills', 'Kỹ năng') !!}
                    <div class="form-check">
                        {!! Form::checkbox('skills', 'html', '', ['class'=>'form-check-input','id'=>'html']) !!}
                        {!! Form::label('html', 'Html', ['class'=>'form-check-label']) !!}
                    </div>
                    <div class="form-check">
                        {!! Form::checkbox('skills', 'css', '', ['class'=>'form-check-input','id'=>'css']) !!}
                        {!! Form::label('css', 'Css', ['class'=>'form-check-label']) !!}
                    </div>
                    <div class="form-check">
                        {!! Form::checkbox('skills', 'php', '', ['class'=>'form-check-input','id'=>'php']) !!}
                        {!! Form::label('php', 'Php', ['class'=>'form-check-label']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('birth', 'Ngày sinh') !!}
                    {!! Form::date('birth', '', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('intro', 'Giới thiệu bản thân') !!}
                    {!! Form::textarea('intro', '', ['class'=>'form-control', 'id'=>'intro']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Đăng ký', ['class'=>'btn btn-primary', 'name'=>'sm-reg']) !!}
                </div>
           {!! Form::close() !!}
        </div>
    </body>

</html>
