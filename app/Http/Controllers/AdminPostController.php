<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
   //Phương thức thêm bài viết
   function add()
   {
       return view('Admin.Post.add');
   }

   //Phương thức hiển thị danh sách
   function show()
   {
       return view('Admin.Post.show');
   }
   //Phương thức cập nhập
   function update($id)
   {
       return view('Admin.Post.update', compact('id'));
   }

   //Phương thức xóa bài viết
   function delete($id)
   {
       return view('Admin.Post.delete', compact('id'));
   }
}
