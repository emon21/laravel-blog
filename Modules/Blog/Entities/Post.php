<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;
use Modules\Tag\Entities\Tag;
use App\Models\User;
use Illuminate\Support\Str;
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

   //  protected $appends = ['image_url', 'image','logo_image2_url', 'favicon_image_url'];
    protected $appends = ['image_url','title_slug'];
    
   //  public function getImageUrlAttribute($image)
   //  {
   //      if (is_null($this->image)) {
   //          return asset('backend/blog/default.png');
   //      }

   //      return asset($this->image);
   //  }



  //Accessor 
   public function getImageUrlAttribute() 
   {
       if (is_null($this->image)) {
           return asset('backend/blog/default.jpg');
       }

       return asset($this->image);
   }

   public function getTitleSlugAttribute() 
   {
     

       return Str::slug($this->title);

   
   }

    public function category()
    {
       return $this->belongsTo(Category::class);
    }
    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function tags()
    {
       return $this->belongsToMany(Tag::class);
    }

   
}
