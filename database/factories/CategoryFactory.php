<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'image' => 'https://picsum.photos/700/467',
            'slug' => $this->faker->slug,
            'description' => $this->faker->realText(100),
            'quantity' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
