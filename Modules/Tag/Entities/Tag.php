<?php

namespace Modules\Tag\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag_name','slug'];

    protected static function newFactory()
    {
        return \Modules\Tag\Database\factories\TagFactory::new();
    }
}
