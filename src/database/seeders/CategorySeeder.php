<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['category_name' => '商品の注文について', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => '返品・交換について', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => '配送に関するご質問', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'その他のお問い合わせ', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
