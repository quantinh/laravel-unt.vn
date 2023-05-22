<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Phương thức hiển thị sản phẩm theo id
    function show($id)
    {
        $price = 50000;
        $colors = ['red', 'blue'];
        // return "Thông tin sản phẩm có id:". $id;
        // C1:Chuyển dữ liệu từ controller qua view
        // return view('product.show', array('id'=> $id, 'price'=> $price));
        // C2:Chuyển dữ liệu từ controller qua view theo hàm compact
        return view('product.show', compact('id', 'price', 'colors'));
    }
    //Phương thức thêm sản phẩm
    function create()
    {
        // return "Thêm sản phẩm thành công";
        return view('product');
    }
    //Phương thức cập nhập sản phẩm
    function update($id)
    {
        return "Cập nhập sản phẩm có id:" . $id;
    }
}
