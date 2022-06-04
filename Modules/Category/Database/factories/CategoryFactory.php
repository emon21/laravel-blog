<?php

namespace Modules\Category\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
     $category_name = $this->faker->name();
        return [
            'category_name' => $category_name,
            'slug' => Str::slug($category_name),
        ];
    }
}

