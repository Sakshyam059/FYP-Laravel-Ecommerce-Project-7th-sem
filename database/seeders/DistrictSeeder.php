<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('districts')->insert([
            ['name' => 'Jhapa', 'province_id' => 1],
            ['name' => 'Ilam', 'province_id' => 1],
            ['name' => 'Panchthar', 'province_id' => 1],
            ['name' => 'Taplejung', 'province_id' => 1],
            ['name' => 'Sankhuwasabha', 'province_id' => 1],
            ['name' => 'Bhojpur', 'province_id' => 1],
            ['name' => 'Khotang', 'province_id' => 1],
            ['name' => 'Solukhumbu', 'province_id' => 1],
            ['name' => 'Udayapur', 'province_id' => 1],
            ['name' => 'Okhaldhunga', 'province_id' => 1],
            ['name' => 'Sunsari', 'province_id' => 1],
            ['name' => 'Morang', 'province_id' => 1],
            ['name' => 'Dhankuta', 'province_id' => 1],
            ['name' => 'Chitwan', 'province_id' => 1],
        ]);

        DB::table('districts')->insert([
            ['name' => 'Saptari', 'province_id' => 2],
            ['name' => 'Siraha', 'province_id' => 2],
            ['name' => 'Dhanusa', 'province_id' => 2],
            ['name' => 'Mahottari', 'province_id' => 2],
            ['name' => 'Sarlahi', 'province_id' => 2],
            ['name' => 'Rautahat', 'province_id' => 2],
            ['name' => 'Bara', 'province_id' => 2],
            ['name' => 'Parsa', 'province_id' => 2],
        ]);

        DB::table('districts')->insert([
            ['name' => 'Kathmandu', 'province_id' => 3],
            ['name' => 'Bhaktapur', 'province_id' => 3],
            ['name' => 'Lalitpur', 'province_id' => 3],
            ['name' => 'Kavrepalanchok', 'province_id' => 3],
            ['name' => 'Sindhupalchok', 'province_id' => 3],
            ['name' => 'Nuwakot', 'province_id' => 3],
            ['name' => 'Rasuwa', 'province_id' => 3],
            ['name' => 'Makwanpur', 'province_id' => 3],
            ['name' => 'Chitwan', 'province_id' => 3],
            ['name' => 'Sindhuli', 'province_id' => 3],
            ['name' => 'Dolakha', 'province_id' => 3],
            ['name' => 'Ramechhap', 'province_id' => 3],
            ['name' => 'Bara', 'province_id' => 3],
        ]);

        DB::table('districts')->insert([
            ['name' => 'Pokhara', 'province_id' => 4],
            ['name' => 'Kaski', 'province_id' => 4],
            ['name' => 'Lamjung', 'province_id' => 4],
            ['name' => 'Tanahun', 'province_id' => 4],
            ['name' => 'Gorkha', 'province_id' => 4],
            ['name' => 'Syangja', 'province_id' => 4],
            ['name' => 'Nawalparasi', 'province_id' => 4],
            ['name' => 'Parbat', 'province_id' => 4],
            ['name' => 'Myagdi', 'province_id' => 4],
            ['name' => 'Baglung', 'province_id' => 4],
        ]);

        DB::table('districts')->insert([
            ['name' => 'Lumbini', 'province_id' => 5],
            ['name' => 'Kapilvastu', 'province_id' => 5],
            ['name' => 'Rupandehi', 'province_id' => 5],
            ['name' => 'Nawalparasi', 'province_id' => 5],
            ['name' => 'Arghakhanchi', 'province_id' => 5],
            ['name' => 'Palpa', 'province_id' => 5],
            ['name' => 'Dang', 'province_id' => 5],
            ['name' => 'Pyuthan', 'province_id' => 5],
            ['name' => 'Banke', 'province_id' => 5],
            ['name' => 'Bardiya', 'province_id' => 5],
            ['name' => 'Surkhet', 'province_id' => 5],
            ['name' => 'Rolpa', 'province_id' => 5],
        ]);

        DB::table('districts')->insert([
            ['name' => 'Surkhet', 'province_id' => 6],
            ['name' => 'Dailekh', 'province_id' => 6],
            ['name' => 'Jajarkot', 'province_id' => 6],
            ['name' => 'Rukum', 'province_id' => 6],
            ['name' => 'Salyan', 'province_id' => 6],
            ['name' => 'Mugu', 'province_id' => 6],
            ['name' => 'Dolpa', 'province_id' => 6],
            ['name' => 'Humla', 'province_id' => 6],
            ['name' => 'Kalikot', 'province_id' => 6],
            ['name' => 'Bajura', 'province_id' => 6],
        ]);

        DB::table('districts')->insert([
            ['name' => 'Kanchanpur', 'province_id' => 7],
            ['name' => 'Baitadi', 'province_id' => 7],
            ['name' => 'Dadeldhura', 'province_id' => 7],
            ['name' => 'Doti', 'province_id' => 7],
            ['name' => 'Achham', 'province_id' => 7],
            ['name' => 'Kailali', 'province_id' => 7],
            ['name' => 'Far Western', 'province_id' => 7],
            ['name' => 'Sundharkot', 'province_id' => 7],
            ['name' => 'Bagalpur', 'province_id' => 7],
        ]);
    }
}
