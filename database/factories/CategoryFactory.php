<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true); // e.g. "Web Development"

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(15),
            'meta_title' => ucfirst($name) . ' | Blog Category',
            'meta_keywords' => implode(', ', $this->faker->words(5)),
            'meta_description' => $this->faker->sentence(20),
            'image' => $this->faker->imageUrl(640, 480, 'category', true),
            'is_active' => $this->faker->boolean(90),
            'parent_id' => null,
        ];
    }
}
