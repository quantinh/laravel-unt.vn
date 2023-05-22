<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DemoController extends Controller
{
    //Phương thức gửi mail tự động
    function sendmail()
    {
        //Tạo một thuộc tính dữ liệu được truyền đi
        $data = [
            'key1'=> 'Dữ liệu động được truyền đi từ Controller'
        ];
        //Sử dụng phương thức gửi mail từ đia chỉ email:"" gửi đến một lớp(Chứa nội dung) cho người nhận
        Mail::to('htinh7444@gmail.com')->send(new DemoMail($data));
    }
}
