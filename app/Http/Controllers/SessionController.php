<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //Phương thức thêm dữ liệu vào session
    function add(Request $request)
    {
        // $request->session()->put('username', 'Haquantinh');
        // $request->session()->put('login', true);
        session(['username' => 'HaQuanTinh']);
    }
    //Phương thức hiển thị dữ liệu của session
    function show(Request $request)
    {
        //Kiểm tra session có tồn tại dữ liệu hay không ?
        // if($request->session()->has('username'))
        // {
        //     echo "Đã lưu username vào session";
        // }
        //lấy tất cả dữ liệu lưu trữ của session
        // return $request->session()->all();
        //Lấy theo key nào đó
        // return $request->session()->get('username');
        // return $request->session()->get('status');
        return session('username');
    }
    //Phương thức flash session thêm nhanh dữ liệu qua 1 phiên
    function add_flash(Request $request)
    {
        //Thêm nhanh dữ liệu với flash
        $request->session()->flash('status', 'Đã thêm sản phẩm thành công !');
    }
    //Phương thức xóa dữ liệu session
    function delete(request $request)
    {
        //Hủy dữ liệu session với forget (Xóa 1 phần tử trong session)
        $request->session()->forget('username');
        //Xóa nhanh dữ liệu với flush (Xóa tất cả trong session)
        // $request->session()->flush();
    }
}
