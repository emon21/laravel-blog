<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug','image','description','category_id','user_id','status','published_at'
    ];

    protected $dates = [
        'published_at',
        //'published_at' => 'date:Y-m-d',
        // 'joined_at' => 'datetime:Y-m-d H:00',
    ];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\PostFactory::new();
    }
}
