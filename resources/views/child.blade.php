{{-- Kế thừ từ folder/file app --}}
@extends('layouts.app')

{{-- Thay đổi nội dung tiêu đề từ con --}}
@section('title', 'Tiêu đề con')

{{-- Thay đổi nội dung content từ con --}}
@section('content')
    <p>Nội dung trang con</p>
    {{-- <p>Họ và tên: {!! $data !!}</p> --}}
    {{-- @if ($data % 2 == 0)
        <p>{{$data}} là số chẵn</p>
    @else
        <p>{{$data}} là số lẻ</p>
    @endif --}}
    {{-- Kiểm tra tiêu đề bài viết có tồn tại hay không --}}
    {{-- @isset($post_title)
        <p>Tiêu đề: {{$post_title}}</p>
    @endisset --}}
    {{-- Kiểm tra biến or mảng có trống hay không --}}
    @empty($users)
        <p>Không có user nào</p>
    @endempty
@endsection

{{-- Thay đổi nội dung sidebar từ con --}}
@section('sidebar')
    @parent
    <p>Sidebar trang con</p>
@endsection
