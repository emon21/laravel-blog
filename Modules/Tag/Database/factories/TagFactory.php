<?php

namespace Modules\Tag\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Tag\Entities\Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tag_name = $this->faker->name();
     //$category_name = $this->faker->name();

        return [
            'tag_name' => $tag_name,
            'slug' => Str::slug($tag_name),
        ];
    }
}

