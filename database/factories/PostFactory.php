<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(4);

        return [
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'user_id' => User::inRandomOrder()->first()?->id,
            'title' => ucfirst($title),
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->sentence(20),
            'content' => $this->faker->paragraphs(5, true),
            'meta_title' => ucfirst($title) . ' | Blog Post',
            'meta_keywords' => implode(', ', $this->faker->words(6)),
            'meta_description' => $this->faker->sentence(20),
            'featured_image' => $this->faker->imageUrl(1200, 800, 'blog', true),
            'is_published' => $this->faker->boolean(80),
        ];
    }
}
