<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    //Phương thức hiển thị danh sách giỏ hàng
    function show() {
        return view('Cart.show');
    }

    //Phương thức thêm sản phẩm vào giỏ hàng
    function add(Request $request ,$id) {

        // Cart::destroy();

        $product = Product::find($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'options' => [
                'thumbnail' => $product->thumbnail
            ]
        ]);

        // echo "<pre>";
        // print_r(Cart::content());
        // print_r(Cart::total());
        // echo "</pre>";

        // return redirect('cart/show');
    }

    //Phương thức xóa sản phẩm trong giỏ hàng
    function remove($rowId) {
        Cart::remove($rowId);
        return redirect('cart/show');
    }

    //Phương thức xóa toàn bộ sản phẩm trong giỏ hàng
    function destroy() {
        Cart::destroy();
        return redirect('cart/show');
    }

    //Phương thức cập nhập số lượng trong giỏ hàng
    function update(Request $request) {
        // dd($request->all());
        $data = $request->get('qty');
        foreach($data as $k=>$v) {
            Cart::update($k, $v);
        }
        // return $data;
        // return $request->all();
        return redirect('cart/show');
    }
}
