<?php

namespace App\Http\Controllers;
use App\FeaturedImages;
use Illuminate\Http\Request;

class FeaturedImagesController extends Controller
{
    //Phương thức lấy dữ liệu hiển thị
    function read()
    {
        //Từ model featuredImages lấy dữ liệu từ model Post và hiển thị
        #Tìm bài viết của hình ảnh có id = 1
        $post = FeaturedImages::find(1)
        ->post;
        return $post;
    }
}
