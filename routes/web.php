<?php

// use App\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Định tuyến welcome laravel
// Route::get('/', function (){
//     return view('welcome');
// });

//Định tuyến tới danh sách sản phẩm
Route::get('/', 'ProductsController@show');

Route::get('cart/search', 'ProductsController@search')->name('product.search');

//Định tuyến tới danh sách giỏ hàng
Route::get('cart/show', 'CartController@show');

//Định tuyến thêm sản phẩm vào giỏ hàng
Route::get('cart/add/{id}', 'CartController@add')->name('cart.add');

//Định tuyến xóa sản phẩm trong giỏ hàng
Route::get('cart/remove/{rowId}', 'CartController@remove')->name('cart.remove');

//Định tuyến xóa toàn bộ sản phẩm trong giỏ hàng
Route::get('cart/destroy', 'CartController@destroy')->name('cart.destroy');

//Định tuyến cập nhập số lượng trong giỏ hàng
Route::post('cart/update', 'CartController@update')->name('cart.update');

// Định tuyến cơ bản
// Route::get('/post', function() {
//     return "Đây là bài viết";
// });

// Route::get('/admin/product', function() {
//     return "Trang quản lí sản phẩm";
// });

// Route::get('/admin/product/add', function() {
//     return "Trang thêm sản phẩm";
// });

// Định tuyến tham số
// Route::get('/posts/{id}', function($id) {
//     return "Chúng ta có id = ". $id;
// });

// Route::get('/posts/{cat_id}/page/{page}', function($cat_id, $page) {
//     return $cat_id . "-" . $page;
// });

// Đặt tên định tuyến
// Route::get('users/profile', function () {
//     #Trả về đường dẫn theo tên được định nghĩa lại ở bên dưới
//     return route('profile');
//     #Route ở hàm trên được định nghĩa ngắn gọn lại với tên profile
// }) -> name('profile');

// Route::get('admin/product/add', function () {
//     #Trả về đường dẫn theo tên được định nghĩa lại ở bên dưới
//     return route('product.add');
//     #Route ở hàm trên được định nghĩa ngắn gọn lại với tên profile (modules.action)
// }) -> name('product.add');

// Định tuyến có tham số tùy chọn
// domain.com/users => Hiển thị ra danh sách người dùng
// domain.com/users/4 => Hiển thị ra thông tin người dùng có id = 4
// Route::get('/users/{id?}', function($id = 0) {
//     return $id;
// });

// Định tuyến với tham số có ràng buộc biểu thức chính quy
// Định tuyến cho sản phẩm có id với điều kiện là những con số tù 0 dến 9 ít nhất 1 kí tự
// Route::get('/products/{id}', function($id) {
//     return $id;
// }) -> where('id','[0-9]+');

// Định tuyến cho sản phẩm và có slug và id
// Route::get('/products/{slug}/{id}', function($slug, $id) {
//     return $slug . '---' . $id;
// }) -> where(['slug'=> '[A-Za-z0-9-_]+']);

//Định tuyến đến một view với 1 giá trị bất kì như id
// Route::view('/welcome', 'welcome');

// Route::view('/posts', 'posts', ['id'=> 20]);

//Định tuyến đến một controller
// Route::get('/post/{id}', 'PostController@detail');

//Tạo cấu trúc url của trang quản lí bài viết admin
//Định tuyến thêm một bài viết
// Route::get('admin/post/add', function() {
//     return "Admin: Thêm bài viết";
// });

//Định tuyến cập nhập một bài viết
// Route::get('admin/post/update/{id}', function($id) {
//     return "Admin: Cập nhập bài viết có id {$id}";
// });

//Định tuyến danh sách bài viết
// Route::get('admin/post/show', function() {
//     return "Admin: Hiển thị danh sách bài viết";
// });

//Định tuyến xóa một bài viết
// Route::get('admin/post/delete/{id}', function($id) {
//     return "Admin: Xóa bài viết có id {$id}";
// });

//Định tuyến hiển thị sản phẩm
// Route::get('/product/show/{id}', 'ProductController@show');

//Định tuyến thêm sản phẩm
// Route::get('/product/create', 'ProductController@create');

//Định tuyến cập nhập sản phẩm
// Route::get('/product/update/{id}', 'ProductController@update');

//Định tuyến theo type resource
// Route::resource('post','PostController');

//Định tuyến gọi view
// Route::get('post/index', 'PostController@index');

//Định tuyến gọi view từ quản lí bài viết
// Route::get('admin/post/show', 'AdminPostController@show');

//Định tuyến gọi view từ child và gửi dữ liệu về view
// Route::get('child', function() {
//     return view('child', ['data'=> '<strong>Hà Quan Tính</strong>']);
// });

//Định tuyến gọi view từ child và gửi dữ liệu về view
// Route::get('child', function() {
//     return view('child', ['data'=> 5]);
// });

//Định tuyến gọi view từ child và gửi dữ liệu về view for
// Route::get('demo', function() {
//     return view('demo', ['n'=> 20]);
// });

//Định tuyến gọi view từ child và gửi dữ liệu về view foreach
// Route::get('demo', function() {
//     $users  =   array(
//         1 => array(
//             'name' => 'Hà Quan Tính'
//         ),
//         2 => array(
//             'name' => 'Nguyễn Minh Tuấn'
//         ),
//         3 => array(
//             'name' => 'Trần Quang Đại'
//         )
//     );
//     return view('demo', compact('users'));
// });

//Định tuyến gọi view từ child và gửi dữ liệu về view foreach
// Route::get('demo', function() {
//     return view('demo');
// });

//Định tuyến gọi view từ child và gửi dữ liệu về view
// Route::get('child', function() {
//     return view('child', ['post_title'=> 'Khóa học laravel']);
// });

//Định tuyến gọi view từ quản lí bài viết
//Định tuyến thêm bài viết
// Route::get('admin/post/add', 'AdminPostController@add');
// // Định tuyến hiển thị danh sách
// Route::get('admin/post/show', 'AdminPostController@show');
// // Định tuyến cập nhập bài viết
// Route::get('admin/post/update/{id}', 'AdminPostController@update');
// // Định tuyến xóa bài viết
// Route::get('admin/post/delete/{id}', 'AdminPostController@delete');

//Viết gọn URL ngắn gọn hơn với prefix
// Route::group(['prefix' => 'admin/post'], function () {
//     //Định tuyến thêm bài viết
//     Route::get('add', 'AdminPostController@add');
//     // Định tuyến hiển thị danh sách
//     Route::get('show', 'AdminPostController@show');
//     // Định tuyến cập nhập bài viết
//     Route::get('update/{id}', 'AdminPostController@update');
//     // Định tuyến xóa bài viết
//     Route::get('delete/{id}', 'AdminPostController@delete');
// });

// Route::get('users/insert', function () {
//     DB::table('users')->insert(
//         array(
//             'name' => 'Hà Quan Tuấn',
//             'email' => 'tuan7444@gmail.com',
//             'password' => bcrypt('Quananh123!@#')
//         )
//     );
// });

// Route::get('posts/add', 'PostsController@add');
// Route::get('posts/show', 'PostsController@show');
// Route::get('posts/update/{id}', 'PostsController@update');
// Route::get('posts/delete/{id}', 'PostsController@delete');

#Bài tập query builder
// Route::get('admin/products/add', 'AdminProductController@add');
// Route::get('admin/products/show', 'AdminProductController@show');
// Route::get('admin/products/update/{id}', 'AdminProductController@update');
// Route::get('admin/products/delete/{id}', 'AdminProductController@delete');

#Định tuyến tới model Lấy tất cả dữ liệu từ bảng ghi posts
// Route::get('posts/read', function(){
//     $posts = Post::all();
//     return $posts;
// });

#Định tuyến tới controller bằng eloquent orm
// Route::get('posts/read', 'PostsController@read');
// Route::get('posts/restore/{id}', 'PostsController@restore');
// Route::get('posts/permanentlydelete/{id}', 'PostsController@permanentlyDelete');
// Route::get('images/read', 'FeaturedImagesController@read');
// Route::get('role/show', 'RoleController@show');

#Định tuyến Form submit
Route::get('post/add', 'PostsController@add');
Route::post('post/store', 'PostsController@store');
Route::get('post/show', 'PostsController@show')->name('post.show');
Route::get('helper/url', 'HelperController@url');
Route::get('helper/string', 'HelperController@string');

#Định tuyến Form đăng nhập
Route::get('user/reg', function() {
    return view('User/reg');
});

#Định tuyến với session
Route::get('session/add', 'SessionController@add');
Route::get('session/show', 'SessionController@show');
Route::get('session/add_flash', 'SessionController@add_flash');
Route::get('session/delete', 'SessionController@delete');

#Định tuyến với cookie
Route::get('cookie/set', 'CookieController@set');
Route::get('cookie/get', 'CookieController@get');

#Định tuyến gửi mail tự động
Route::get('demo/sendmail', 'DemoController@sendmail');

#Định tuyến tải ảnh lên
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

