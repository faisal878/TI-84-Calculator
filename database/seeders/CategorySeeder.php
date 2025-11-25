<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'uncategorized' => 'HTML, CSS, JavaScript, Laravel, PHP, React, Vue, Full Stack, Frontend, Backend',
        ];

        foreach ($categories as $name => $keywords) {
            Category::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'meta_title' => $name ,
                    'meta_description' => '',
                    'meta_keywords' => $keywords,
                    'is_active' => true,
                ]
            );
        }
    }
}
