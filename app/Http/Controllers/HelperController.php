<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class HelperController extends Controller
{
    // Phương thức tạo link url
    function url()
    {
        //1)Tạo link url đường dẫn gốc + /login
        // $url = url('login');
        //2)Tạo link url theo tên của route
        // $url = route('post.show');
        //3)Tạo link url qua action của controller
        // $url = action('PostsController@store');
        //4)Lấy đường dẫn hiện tại đang ở
        $url = url()->current();
        echo $url;
    }
    //Phương thức chuỗi
    function string()
    {
        //1)Lấy độ dài của chuỗi
        // $str_1 = 'HaQuanTinh';
        // echo Str::length($str_1);
        //2)In thường, in hoa một chuỗi
        // echo Str::lower($str_1);
        // echo Str::upper($str_1);
        //3)Tạo chuỗi ngẫu nhiên
        // echo Str::random(10);
        //4)Loại bỏ ký tự trắng dư thừa
        // $str_2 = Str::of('  toi ten la  ')->trim();
        // echo $str_2;
        //5)Tạo link thân thiện slug
        $name = 'PC VĂN PHÒNG';
        // $str_3 = Str::slug('Academy.vn học web đi làm');
        $str_3 = Str::slug($name);
        echo $str_3;
        //6)Lấy chuỗi con trong 1 chuỗi
        // $str_4 = 'Laravel pro';
        // echo Str::of($str_4)->substr(8);
        // echo Str::of($str_4)->substr(0, 7);
        //7)Nối chuỗi vào đuôi một chuỗi cho trước
        // echo Str::of('Hà Quan')->append('Tính');
        //8)Tìm kiếm và thay thế chuỗi
        // $str_5 = 'Laravel 7x';
        // echo Str::of($str_5)->replace('7x', '6x');
        //9)Cắt một số kí tự so với ban đầu
        // $str_6 = 'Hot girl Đắk Lắk xinh đẹp "ăn như hùm" vẫn có thân hình nảy nở vạn người mê';
        // echo Str::of($str_6)->limit('30');
        //10)Kiểm tra chuỗi cha có chứa chuỗi con hay không?
        // $str_7 = 'Academy học web đi làm';
        // echo Str::contains($str_7, 'Academy');
    }
}
