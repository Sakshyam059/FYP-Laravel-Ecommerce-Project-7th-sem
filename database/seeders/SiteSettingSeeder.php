<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_settings')->insert([
            'name' => "Khelretail",
            'description' => 'Nepals largest sports ecommerce',
            'email' => 'Khelretail@gmail.com',
            'phone' => '9812364578',
            'address' => 'Gaindakot',
            'working_hrs' => '24',
            'fb_link'=>'https://www.facebook.com',
            'insta_link'=>'https://www.instagram.com',
            'twitter_link'=>'https://www.twitter.com'
        ]);
    }
}
