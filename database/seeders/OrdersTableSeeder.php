<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'product_name' => 'Sample Product 1',
                'quantity' => 5,
                'price' => 9.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Sample Product 2',
                'quantity' => 2,
                'price' => 15.49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
