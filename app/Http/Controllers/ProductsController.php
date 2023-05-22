<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    //Phương thức hiển thị danh sách sản phẩm
    function show()
    {
        $products = product::all();
        return view('Products.show', compact('products'));
    }

    function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $banners = [
                [
                    'id' => 1,
                    'image' => 'banner1.png',
                ],
                // Thêm các banner khác vào đây nếu cần
            ];
            $products = Product::where('name', 'LIKE', "%$keyword%")->get();
            return response()->json(
                [
                    'products' => $products,
                    'banners'   => $banners,
                ]
            );
        } else {
            return response()->json(['error' => 'Từ khóa tìm kiếm không được để trống'], 400);
        }
    }

}
