<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subcategories')->insert([
            [
                'subcategory_name' => 'Football Shoes',
                'slug' => Str::slug('Football Shoes'),
                'description' => 'High-quality football shoes for all levels of play.',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subcategory_name' => 'Football Balls',
                'slug' => Str::slug('Football Balls'),
                'description' => 'Durable and professional footballs for training and games.',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('subcategories')->insert([
            [
                'subcategory_name' => 'Bikes',
                'slug' => Str::slug('Bikes'),
                'description' => 'Top-quality bicycles for all kinds of cycling.',
                'category_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subcategory_name' => 'Cycling Helmets',
                'slug' => Str::slug('Cycling Helmets'),
                'description' => 'Protective helmets for cyclists of all levels.',
                'category_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('subcategories')->insert([
            [
                'subcategory_name' => 'Rackets',
                'slug' => Str::slug('Rackets'),
                'description' => 'Tennis rackets for professional and recreational players.',
                'category_id' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subcategory_name' => 'Tennis Balls',
                'slug' => Str::slug('Tennis Balls'),
                'description' => 'High-quality tennis balls for competitive play.',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
