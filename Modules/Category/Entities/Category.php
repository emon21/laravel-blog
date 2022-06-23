<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Entities\Post;

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

    protected $appends = ['image_url'];
   //Accessor 
   public function getImageUrlAttribute() 
   {
      if (is_null($this->image)) {
         return asset('backend/category/default_image.png');
      }
      return asset($this->image);
   }

   //Posts Relationship
    public function posts()
    {
      return $this->hasOne(Post::class);
    }
}
