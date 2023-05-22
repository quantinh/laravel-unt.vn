<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    //Phương thức thêm dữ liệu
    function add()
    {
        DB::table('products')
            ->insert([
                'name' => 'tiêu đề 2',
                'content' => 'nội dung 2',
                'price' => 2000000,
                'user_id' => 2,
                'product_cat_id' => 1
            ]);
    }
    //Phương thức hiển thị dữ liệu
    function show()
    {
        $products = DB::table('products')
            ->select('name', 'price')
            ->get();
        return $products;
    }
    //Phương thức cập nhập dữ liệu
    function update($id)
    {
        DB::table('products')
            ->where('id', $id)
            ->update([
                'name' => 'macbook 2020', 'price' => 2000000
            ]);
    }
    //Phương thức xóa dữ liệu
    function delete($id)
    {
        return DB::table('products')
            ->where('id', $id)
            ->delete();
    }
}
