<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Abdullah', 'email' => 'abdullah@gmail.com', 'password' => '12345', 'user_type' => 'admin'],
            ['id' => 2, 'name' => 'Hasib', 'email' => 'hasib@gmail.com', 'password' => '12345', 'user_type' => 'user'],
            ['id' => 3, 'name' => 'Farhan', 'email' => 'farhan@gmail.com', 'password' => '12345', 'user_type' => 'user'],
        ]);

        DB::table('cart')->insert([
            ['user_id' => 1, 'name' => 'Pathar Panchali', 'price' => 400, 'quantity' => 1, 'image' => 'pather_panchali.jpg'],
            ['user_id' => 2, 'name' => 'Bukhari Sharif', 'price' => 450, 'quantity' => 1, 'image' => 'bukhari_sharif.jpg'],
        ]);

        DB::table('subscriber')->insert([
            ['email' => 'abdullah@gmail.com'],
            ['email' => 'saiful@gmail.com'],
            ['email' => 'bijoy@gmail.com'],
        ]);

        DB::table('review')->insert([
            [
                'name' => 'Tarif Rahman',
                'review' => 'I recently discovered this gem of a Book Point! The collection of novels is incredible, ranging from classic literature to the latest bestsellers. I found the perfect novel that transported me to another world. The ambiance is cozy, and the staff is friendly and knowledgeable. Highly recommended!'
            ],
            [
                'name' => 'Saiful Islam',
                'review' => 'This Book Point is a haven for novel lovers. The staff\'s passion for literature is evident, and their recommendations have led me to some unforgettable reads. The store\'s ambiance invites you to linger, and the well-organized shelves make it easy to explore different genres. A fantastic place for bo'
            ],
            [
                'name' => 'Fairuz Adiba',
                'review' => 'I stumbled upon this Book Point, and it turned out to be a hidden treasure! The novel collection is vast, catering to various tastes. The staff is not only helpful but also genuinely interested in ensuring you find the perfect read. I\'ve found some rare editions here, and I look forward to my next v'
            ],
            [
                'name' => 'Fahmida Lily',
                'review' => 'Superb book selection! As an avid reader, I appreciate the diverse range of genres available. The staff here is passionate about books and always ready to offer recommendations. The cozy reading nook is a nice touch. I\'ve already lost count of the number of novels I\'ve purchased from here. '
            ]
        ]);

        DB::table('orders')->insert([
            [
                'user_id' => 1,
                'name' => 'Fairuz Adiba',
                'number' => '7654345678',
                'email' => 'adiba@gmail.com',
                'method' => 'cash on delivery',
                'address' => '73/A, Khalishpur, Khulna, Bangladesh',
                'total_products' => 'Rokto Golpo (1)',
                'total_price' => 350,
                'placed_on' => '5-nov-2025',
                'payment_status' => 'pending'
            ],
            [
                'user_id' => 2,
                'name' => 'Jannatuj Jakia',
                'number' => '01642133806',
                'email' => 'jannatujjakia77@gmail.com',
                'method' => 'Cash on delivery',
                'address' => 'Chitolmari, Khulna, Bangladesh',
                'total_products' => 'Himu (1), Misir Ali (1)',
                'total_price' => 520,
                'placed_on' => '18-dec-2025',
                'payment_status' => 'pending'
            ]
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}