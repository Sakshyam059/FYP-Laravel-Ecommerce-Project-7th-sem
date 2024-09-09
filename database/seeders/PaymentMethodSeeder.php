<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_methods')->insert([[
            'method_name' => "Cash",
            'method_type' => '0',
        ],[
            'method_name' => "Esewa",
            'method_type' => '1',
        ],[
            'method_name' => "Khalti",
            'method_type' => '1',
        ]]);
    }
}
