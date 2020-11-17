<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug(3),
            'status' => 'published',
            'mark' => $this->faker->numberBetween(1, 5),
            'lg_image' => 'https://picsum.photos/1200/800',
            'md_image' => 'https://picsum.photos/700/467',
            'sm_image' => 'https://picsum.photos/180/120',
            'gallery_image' => 'https://picsum.photos/1920/720',
            'header_image' => '',
            'views' => $this->faker->numberBetween(1, 1000),
            'time_to_read' => $this->faker->numberBetween(1, 15),
            'user_id' => User::inRandomOrder()->first()->id,
            'description' => $this->faker->realText(100, 2),
            'content' => $this->faker->realText(1000, 2),
            'is_published' => true
        ];
    }
}
