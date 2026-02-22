<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $categories = [
            'Medical',
            'Education',
            'Disaster Relief',
            'Animal Welfare',
            'Community',
            'Religious',
            'Startup',
            'Environment',
            'Sports',
            'Emergency'
        ];

        foreach ($categories as $category) {
            BlogCategory::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
