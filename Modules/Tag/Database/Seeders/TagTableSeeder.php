<?php

namespace Modules\Tag\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Tag\Entities\Tag;
use Illuminate\Support\Str;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        // $tag = New Tag();
        // $tag->tag_name = 'Html';
        // $tag->slug =  Str::slug($tag->tag_name);
        // $tag->save();

        $tags = [
         'Php','Laravel','Html','Css','Vue jS','Java','Python','Apps','Nuxt JS' ,'
         Asp.Net','C#','React JS'];

         foreach ($tags as $value) {
            Tag::create([
                  'tag_name' => $value,
                  'slug' => Str::slug($value),
            ]);
         }
    }
}
