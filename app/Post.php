<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    //Được hiểu model này có tương tác với table posts trên csdl
    // protected $table = 'posts';
    protected $fillable = ['title', 'content', 'user_id', 'votes', 'thumbnail'];
    //Phương thức định nghĩa liên kết model Post với model FeaturedImages
    function FeaturedImages()
    {
        //Định nghĩa mối quan hệ 1:1 từ bảng post tới bảng FeaturedImages
        return $this->hasOne('App\FeaturedImages');
    }
    //Phương thức định nghĩa liên kết mối liên hệ n:1 với model User (Tất cả bài viết này từ user_id nào tạo)
    function User()
    {
        return $this->belongsTo('App\User');
    }
}
