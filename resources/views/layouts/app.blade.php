<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
    <body>
        <div id="wrapper">
            <div id="header">
                <h1>Header</h1>
            </div>
            <div id="wrapper-content">
                <div id="content">
                    {{-- Tạo ra cổng để gọi nội dung content từ con --}}
                    @yield('content')
                </div>
                <div id="siderbar">
                    {{-- Tạo ra cổng để gọi nội dung sidebar từ con --}}
                    {{-- @yield('sidebar') --}}
                    @section('sidebar')
                        <p>Khối tìm kiếm</p>
                    @show
                </div>
            </div>
            <div id="footer">
                <h1>Footer</h1>
            </div>
        </div>
    </body>
</html>
