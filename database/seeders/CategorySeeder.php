<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Football',
            'Basketball',
            'Tennis',
            'Cycling',
            'Running',
            'Golf',
            'Swimming',
            'Fitness & Gym',
            'Hiking',
            'Winter Sports',
            'Boxing & Martial Arts',
            'Outdoor Sports',
            'Yoga & Pilates',
            'Team Sports',
            'Water Sports',
            'Athletics',
            'Sports Nutrition',
            'Sports Apparel',
            'Sports Accessories',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'category_name' => $category,
                'slug' => Str::slug($category), 
                'description' => $category . ' equipment and accessories for sports enthusiasts.', 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
