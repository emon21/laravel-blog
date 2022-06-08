<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;
use App\Models\User;
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

    
   //  public function getImageUrlAttribute($image)
   //  {
   //      if (is_null($this->image)) {
   //          return asset('backend/blog/default.png');
   //      }

   //      return asset($this->image);
   //  }

  // protected $appends = ['logo_image_url', 'logo_image2_url', 'favicon_image_url'];

  //Accessor 
   public function getImageAttribute($value) 
   {
       if (is_null($value)) {
           return asset('backend/blog/default.png');
       }

       return asset($value);
   }

    public function category()
    {
       return $this->belongsTo(Category::class);
    }
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
