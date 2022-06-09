<?php

namespace Modules\Category\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Category\Entities\Category;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Category\Entities\Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    // $category_name = $this->faker->name();
        return [
         'category_name' => $this->faker->word(),
         'slug' => Str::slug($this->faker->word()),
         'image' => 'default.jpg',
         'status' => '0',
        ];

      //   $factory->define(Category::class,function(Faker $faker){
       
      //          return [
      //             'category_name' => $this->faker->word(),
      //             'slug' => Str::slug($faker->word()),
      //       ];

      //   });
    }
}

