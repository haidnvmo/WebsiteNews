<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    protected $table = 'posts';
    const POST_HIGHLIGHTS = 1;
    const POST_NEWS = 2;
    const POST_SPORT = 4;
    const POST_CULTURAL = 5;
    const POST_CONTACT= 6;
    const POST_HOTNEWS = 7;
    

    protected $fillable = [
        'title', 'description','content','image','slug','id_category','sort',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public static function getNewsOfCategory($idCate) {
       return self::select('posts.*', 'category.name')->join('category', function($join) {
            $join->on('posts.id_category', '=', 'category.id');
        })->where('category.id', $idCate)
           ;
    }
    // public static function getPost($notgetcate) {
    //     return self::select('posts.*', 'category.name')->join('category', function($join) {
    //          $join->on('posts.id_category', '=', 'category.id');
    //      })->whereNotIn('id', $notgetcate);
    //  }    
}
