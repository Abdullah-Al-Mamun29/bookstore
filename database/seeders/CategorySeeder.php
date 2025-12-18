<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'cat_name' => 'Islamic Corner',
                'cat_icon' => '<i class="fas fa-book-quran"></i>'
            ],
            [
                'cat_name' => 'Fiction',
                'cat_icon' => '<i class="fas fa-atom"></i>'
            ],
            [
                'cat_name' => 'Mystery',
                'cat_icon' => '<i class="fas fa-user-secret"></i>'
            ],
            [
                'cat_name' => 'Horror',
                'cat_icon' => '<i class="fas fa-ghost"></i>'
            ],
            [
                'cat_name' => 'Adventure',
                'cat_icon' => '<i class="fas fa-cannabis"></i>'
            ],
        ]);
    }
}