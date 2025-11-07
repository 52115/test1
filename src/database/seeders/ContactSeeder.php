<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'name' => '山田太郎',
                'gender' => '男性',
                'email' => 'taro@example.com',
                'tel' => '12345',
                'address' => '東京都渋谷区1-1-1',
                'building' => 'テストビル201',
                'category_id' => 1,
                'detail' => '商品の注文に関する問い合わせです。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '佐藤花子',
                'gender' => '女性',
                'email' => 'hanako@example.com',
                'tel' => '54321',
                'address' => '大阪府北区2-2-2',
                'building' => null,
                'category_id' => 2,
                'detail' => '返品の件で相談したいです。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
