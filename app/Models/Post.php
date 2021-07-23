<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title', 'description', 'content','image','slug','id_category',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
