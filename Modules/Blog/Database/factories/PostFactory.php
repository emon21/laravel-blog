<?php

namespace Modules\Blog\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Blog\Entities\Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $post_title = $this->faker->name();
        //$category_name = $this->faker->name();

           return [
               'title' => $post_title,
               'slug' => Str::slug($post_title),
               'image' => 'blog/default,jpg',
               'description' => $this->faker->text(),
               'category_id' => $this->faker->randomDigit(),
               'user_id' => $this->faker->randomDigit(),
               'status' => $this->faker->randomDigit(),
               'published_at' => Now()
           ];
    }
}
