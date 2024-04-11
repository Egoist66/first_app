<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    
        return [
            'title' => $this->faker->sentence(5),
            'content' => $this->faker->text(),
            'image' => $this->faker->imageUrl(640, 480),
            'likes' => random_int(1, 2000),
            'is_published' => 1,
            'category_id' => Category::query()->get()->random()->id
        ];
    }
}
