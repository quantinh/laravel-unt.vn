<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    //Phương thức thiết lập cookie
    function set()
    {
        $response = new Response;
        return $response->cookie('Academy', 'Học web đi làm nka!', 24 * 60);
    }
    //Phương thức lấy giá trị cookie
    function get(request $request)
    {
        return $request->cookie('Academy');
    }
}
