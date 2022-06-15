<?php

namespace Modules\Tag\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Entities\Post;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag_name','slug'];

    public function posts()
    {
       return $this->belongsToMany(Post::class);
    }

    protected static function newFactory()
    {
        return \Modules\Tag\Database\factories\TagFactory::new();
    }
}
