<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name','slug','image'
    ];

    protected static function newFactory()
    {
        return \Modules\Category\Database\factories\CategoryFactory::new();
    }

    
}
