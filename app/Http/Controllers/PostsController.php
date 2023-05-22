<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;

class PostsController extends Controller
{
    //Phương thức thêm dữ liệu
    function add()
    {
        #QUERY BUILDER insert dữ liệu
        // DB::table('posts')->insert(
        //     ['title'=> 'tiêu đề 1', 'content'=> 'nội dung 1', 'user_id'=> '2']
        // );

        #ELOQUENT ORM tạo đối tượng thuộc lớp Post.php(lớp model)
        // $post = new Post;
        // $post->title = "Macbook pro 2022";
        // $post->content = "Nội dung continue";
        // $post->user_id = 2;
        // $post->votes = 23;
        // $post->save();

        #Thêm dữ liệu theo phương thức create()
        // Post::create([
        //     'title'=> 'macbook 2022',
        //     'content'=> 'nội dung macbook pro',
        //     'user_id'=> 1,
        //     'votes'=> 44
        // ]);

        return view('Post.create');
    }
    //Phương thức lưu trữ dữ liệu
    function store(Request $request)
    {
        //Chuẩn hóa dữ liệu để gửi dữ liệu vào db
        $request->validate(
            //Quy tắt yêu cầu dữ liệu
            [
                'title' => 'required|max:100|min:5',
                'content' => 'required'
            ],
            //Cấu hình thông báo lỗi
            [
                'required' => ':attribute không được để trống !',
                'min' => ':attribute phải có độ dài ít nhất :min ký tự',
                'max' => ':attribute phải có độ dài tối :max ký tự',
            ],
            //Thay đổi field thành nội dung tiếng việt
            [
                'title' => 'Tiêu đề',
                'content' => 'Nội dung'
            ]
        );
        //Lấy tất cả dữ liêu gửi lên server
        $input = $request->all();
        //Nếu có file thì xuất các thông của file
        if ($request->hasFile('file')) {
            $file = $request->file;
            // echo $file;

            //1.Lấy tên file
            $filename = $file->getClientOriginalName();

            //2.Lấy đuôi file
            echo $file->getClientOriginalExtension();
            echo "<br>";

            //3.Lấy kích thước file
            echo $file->getSize();
            echo "<br>";

            //4.Tạo folder lưu file đã upload lên server
            $path = $file->move('public/uploads', $file->getClientOriginalName());

            //5.Tạo đường dẫn file ảnh
            $thumbnail = 'public/uploads/' . $filename;

            //6.Tạo trường thumbnail và thêm đường dẫn file rảnh vào
            $input['thumbnail'] = $thumbnail;
        }
        //Phương thức input lấy ra dữ liệu vừa submit lên
        // return $request->input();
        //6.Tạo trường user_id và thêm giá trị người có user_id = 1 vào
        $input['user_id'] = 1;
        //Từ model Post tạo dữ liệu lưu vào database
        Post::create($input);
        //Chuyển hướng theo url của route thêm dữ liệu xong thì chuyển hướng tới trang hiển thị danh sách
        return redirect('post/show')->with('status', 'Bạn đã thêm bài viết thành công !');
        //Chuyển hướng theo tên được định nghĩa từ route
        // return redirect()->route('post.show');
    }
    //Phương thức hiển thị dữ liệu
    function show()
    {
        #1)Lấy tất cả bảng ghi có hai trường trên
        $posts = DB::table('posts')->select('title','content')->get();
        $posts = DB::table('posts')->get();
            foreach($posts as $post) {
                echo $post->title;
                echo $post->content;
                echo "<br>";
            }
        return $posts;
        #L2)lấy một bảng ghi có trường (tiêu đề) có điều kiện là bảng ghi đó có id = 2
        // $posts = DB::table('posts')->where('id', 2)->first();
        // echo $posts->title;
        // echo $posts->content;
        // print_r($posts);
        #3)Lấy bảng ghi có id = 1
        // $posts = DB::table('posts')->find(1);
        // // echo $posts->user_id;
        // print_r($posts);
        #4)Đếm số bảng ghi(bài viết) tạo ra của một user_id nào đó
        // $numbers_posts = DB::table('posts')->where('user_id', 1)->count();
        // echo "Có ".$numbers_posts ." bảng ghi";
        #5)Tính số lớn nhất số nhỏ nhất, tính trung bình của một cột, trường nào đó
        // $min = DB::table('posts')->min('user_id');
        // $max = DB::table('posts')->max('user_id');
        // $avg = DB::table('posts')->avg('user_id');
        // echo $avg;
        #6)Sử dụng join để lấy dữ liệu từ nhiều bảng khác nhau có sự liên kết
        // $posts = DB::table('posts')->join('users', 'users.id', '=', 'posts.user_id')
        //                            ->select('users.name', 'posts.*')
        //                            ->get();
        // // return $posts;
        // print_r($posts);
        #7)Lấy dữ liệu theo điều kiện nào đó hay sử dụng cho lọc sản phẩm, tìm kiếm sản phẩm
        // $posts = DB::table('posts')->where('user_id', 2)->get();
        // $posts = DB::table('posts')->where('user_id','>', 2)->get();
        // $posts = DB::table('posts')->where('title','Like', "%iphone%")->get();
        // echo "<pre>";
        // print_r($posts);
        // echo "</pre>";
        #8)Lấy dữ liệu bảng theo điều kiện phức And, or
        // $posts = DB::table('posts')->where(
        //     [
        //         ['title', 'Like', "%iphone%"],
        //         ['votes', '>', 60]
        //     ]
        // )->get();
        // $posts = DB::table('posts')
        // ->where('votes', '<', 20)
        // ->orWhere('user_id', '=', 2)->get();
        // echo "<pre>";
        // print_r($posts);
        // echo "</pre>";
        #9)Lấy ra dữ liệu theo nhóm
        $posts = DB::table('posts')
        ->selectRaw("count('id') as number_posts, user_id")
        ->groupBy('user_id')
        ->orderBy('number_posts', 'DESC')
        ->get();
        echo "<pre>";
        print_r($posts);
        echo "</pre>";
        #10)Sắp xếp bảng ghi theo thứ hạng
        // $posts = DB::table('posts')
        // ->orderBy('votes')
        // ->get();
        // echo "<pre>";
        // print_r($posts);
        // echo "</pre>";
        #11)Lấy một số bảng ghi có giới hạng(limit) và loại bỏ offset
        // $posts = DB::table('posts')
        // ->offset(2)
        // ->limit(2)
        // ->get();
        // echo "<pre>";
        // print_r($posts);
        // echo "</pre>";
        #12)Cập nhập một bảng ghi với các dữ liệu mới
        // $posts = DB::table('posts')
        // ->where('id', 2)
        // ->update([
        //     'title'=> 'macbook 2022',
        //     'votes'=> 20
        // ]);
        // echo "<pre>";
        // print_r($posts);
        // echo "</pre>";
        // $posts = Post::all();
        #14)Phân trang theo kiểu Query buider
        // $posts = DB::table('posts')->paginate('4');
        // $posts = DB::table('posts')->simplePaginate('4');
        #15)Phân trang theo kiểu Eloquent ORM
        // $posts = Post::paginate('5');
        // $posts = Post::simplePaginate('5');
        #16)Phân trang theo điều kiện
        //Sắp xếp những bảng ghi có id > 9 sắp xếp theo thứ tự giảm dẫn và phân 4 trang hiển thị
        $posts = Post::where('id', '>', 9)->orderby('id', 'desc')->paginate('4');
        #17)Tùy chỉnh thanh phân trang với đường dẫn
        $posts->withPath('demo/show');
        //Gửi dữ liệu đến cho view với tham số là posts nhưng vì sử dụng hàm compact nên thành chuỗi $posts => 'posts'
        return view('post.index', compact('posts'));
        // return redirect()->away('http://unitop.vn');
    }
    //Phương thức cập nhập dữ liệu
    function update($id)
    {
        #QUERY BUILDER update dữ liệu
        // DB::table('posts')
        // ->where('id', $id)
        // ->update([
        //     'title'=> 'macbook 2020','votes'=> 20
        // ]);

        #ELOQUENT ORM cập nhập dữ liệu bất kì
        // $post = Post::find($id);
        // $post->title = "Macbook pro 2021";
        // $post->content = "Nội dung 123";
        // $post->user_id = 2;
        // $post->votes = 24;
        // $post->save();

        #Update dữ liệu thông qua phương thức update()
        $posts = Post::where('id', $id)
            ->update([
                'title' => 'iphone xịn update',
                'content' => 'nội dung iphone xịn update',
                'user_id' => 2,
                'votes' => 15
            ]);
    }
    //Phương thức xóa dữ liệu
    function delete($id)
    {
        #Xóa bảng ghi theo query builder
        // return DB::table('posts')
        // ->where('id', $id)
        // ->delete();

        #Xóa bảng ghi theo phương thức bằng phương thức delete()
        $post = Post::find($id);
        $post->delete();

        #Xóa 1 hoặc nhiều bảng ghi bằng phương thức destroy()
        // return Post::destroy(3);

        #Xóa 1 bảng ghi bất kì theo điều kiện bằng phương thức delete()
        // Post::where('user_id', 2)
        // ->delete();
    }
    //Phương thức lấy dữ liệu bằng ELOQUENT ORM
    function read()
    {
        // $posts = Post::all();
        // return $posts;
        #1)Lấy danh sách bài viết của người tạo có user_id = 2
        // $posts = Post::where('user_id', 2)->get();
        #2)Tìm kiếm những tiêu đề có từ khóa iphone
        // $posts = Post::where('title', 'Like', '%macbook 2020%')->get();
        // return $posts;
        #3)Lấy bài viết bất kì từ người có user_id = 2 hoặc từ bảng ghi lấy được lấy thông tin sản phẩm đó
        // $post = Post::where('user_id', 2)->first();
        // return $post->title;
        #4)Lấy 1 bảng nào đố hoặc nội dung của bảng đó theo id
        // $post = Post::find(2);
        // return $post;
        #5)Lấy 2 hay nhiều bảng ghi cho trước theo id bất kì
        // $posts = Post::find([1, 4]);
        // return $posts;
        #5)Sắp xếp dữ liệu và lấy ra theo chiều tăng hoặc giảm dần
        // $posts = Post::orderBy('votes', 'ASC')->get();
        // return $posts;
        #6)Tính toán thống kê theo nhóm số bài viết do user_id nào đó đã tạo là bao nhiêu
        // $posts = Post::selectRaw("count('id') as number_posts, user_id")
        // ->groupBy('user_id')
        // ->get();
        // return $posts;
        #7)Lấy bảng ghi theo giới hạng hoặc loại bỏ 1,2,...n bảng ghi đầu
        // $posts = Post::limit(2)
        // ->offset(2)
        // ->get();
        // return $posts;
        #8)Hiển thị dữ liệu bao gồm đã xóa tạm thời hoặc tất cả
        $posts = Post::withTrashed()->get();
        // $posts = Post::onlyTrashed()->get();
        // return $posts;
        #9)Từ model Post lấy dữ liệu theo id từ model featuredImages và hiển thị
        //Lấy hình ảnh theo id của bài viết
        // $img = Post::find(2)
        // ->FeaturedImages;
        // return $img;
        #10)Từ bài viết có id = 1 lấy ra người đã tạo bài viết đó
        $user = Post::find(1)
            ->user;
        #11)Từ người dùng có id = 2 lấy ra những bài viết do người đó tạo
        $posts = User::find(2)
            ->posts;
        return $posts;
    }
    //Khôi phục lại dữ liệu đã xóa tạm thời trong thùng rác theo 1 id bất kì
    function restore($id)
    {
        Post::onlyTrashed()
            ->where('id', $id)
            ->restore();
    }
    //Xóa vĩnh viễn dữ liệu 1 bảng ghi theo 1 id nào đó
    function permanentlyDelete($id)
    {
        Post::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
    }
}
