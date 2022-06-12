<?php

namespace Modules\Blog\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Category\Entities\Category;
use App\Models\User;
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

       $id = rand(30, 600);
       $image = 'https://picsum.photos/id/' . $id . '/700/600';
     //   $title = $this->faker->sentence($nbWords = 5, $variableNbWords = true);
           return [
           
               'title' => $post_title,
               'slug' => Str::slug($post_title),
               'image' => $image,
               'description' => $this->faker->text(),
              // 'category_id' => Category::random()->id(),
               'category_id' => Category::inRandomOrder()->value('id'),
               'user_id' => User::inRandomOrder()->value('id'),
               'status' => $this->faker->randomDigit(),
               'published_at' => Now()


               // 'category_id' => PostCategory::inRandomOrder()->value('id'),
               // 'author_id' => User::inRandomOrder()->value('id'),
               // 'title' => $title,
               // 'slug' => Str::slug($title),
               // 'image' => $image,
               // 'short_description' => $this->faker->sentence(10),
               // 'description' => $this->faker->paragraph(50),
               // 'status' => Arr::random(['published', 'draft']),
               
           ];
    }
}

