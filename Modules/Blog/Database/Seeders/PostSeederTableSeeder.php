<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Post;
use Illuminate\Support\Str;
class PostSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $post = New Post();
        $post->title = 'this title';
        $post->slug = Str::slug($post->title);
        $post->image = 'backend/blog/default.jpg';
        $post->description = 'good php code';
        $post->category_id = '1';
        $post->user_id = '1';
        $post->status = 'publish';
        $post->published_at = Now();
        $post->save();
        // $this->call("OthersTableSeeder");
    }
}
