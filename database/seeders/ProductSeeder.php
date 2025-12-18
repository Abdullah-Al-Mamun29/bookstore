<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Himu', 'author' => 'Humayun Ahmed', 'price' => 250, 'image' => 'himu.jpeg'],
            ['name' => 'Misir Ali', 'author' => 'Humayun Ahmed', 'price' => 270, 'image' => 'Misir ali boi.jpg'],
            ['name' => 'Nishithini', 'author' => 'Humayun Ahmed', 'price' => 300, 'image' => 'nishithini.jpg'],
            ['name' => 'Pather Panchali', 'author' => 'Bibhutibhushan Bandyopadhyay', 'price' => 400, 'image' => 'pother_pancali.jpg'],
            ['name' => 'Aronyak', 'author' => 'Bibhutibhushan Bandyopadhyay', 'price' => 350, 'image' => 'Aronyak.jpg'],
            ['name' => 'Kalo Haat', 'author' => 'Towheed Sadik', 'price' => 290, 'image' => 'kalo_haat.jpg'],
            ['name' => 'Ondhokar', 'author' => 'Saleheen Rana', 'price' => 280, 'image' => 'abcd.jpg'], 
            ['name' => 'Chhaya', 'author' => 'Rakib Noor', 'price' => 260, 'image' => 'Chaya.jpg'],
            ['name' => 'Rohosso Dip', 'author' => 'Tanvir Hasan', 'price' => 350, 'image' => 'Rohosso dip.jpg'],
            ['name' => 'Ojana Jongol', 'author' => 'Raihan Kabir', 'price' => 360, 'image' => 'jangule.jpg'],
            ['name' => 'Alo Chorao', 'author' => 'Mufti Salman', 'price' => 300, 'image' => 'alo_charao.jpg'],
            ['name' => 'Siratunnobi', 'author' => 'Allama Shibli Nomani', 'price' => 420, 'image' => 'siratunn_nobi.jpg'],
            ['name' => 'Bukhari Sharif', 'author' => 'Imam Bukhari', 'price' => 450, 'image' => 'Bukhari.jpg'],
            ['name' => 'Quran', 'author' => 'Al-Quran', 'price' => 500, 'image' => 'Quran.jpg'],
            ['name' => 'Harry Potter', 'author' => 'J.K. Rowling', 'price' => 750, 'image' => 'Harrypotter.jpg'],
            ['name' => 'Dark Knight', 'author' => 'Christopher Nolan', 'price' => 700, 'image' => 'Dark Knight.jpeg'],
            ['name' => 'Angels & Demons', 'author' => 'Dan Brown', 'price' => 550, 'image' => 'angels & demons.jpg'],
            ['name' => 'Avatar', 'author' => 'James Cameron', 'price' => 600, 'image' => 'avatar.jpeg'],
            ['name' => 'Beautiful Disaster', 'author' => 'Jamie McGuire', 'price' => 400, 'image' => 'beautiful disaster.jpg'],
            ['name' => 'Bhoy', 'author' => 'Various', 'price' => 220, 'image' => 'Bhoy.jpg'],
            ['name' => 'Chander Pahar', 'author' => 'Bibhutibhushan', 'price' => 300, 'image' => 'chander-pahar.jpg'],
            ['name' => 'Jurassic Park', 'author' => 'Michael Crichton', 'price' => 500, 'image' => 'Jurassic Park.jpg'],
            ['name' => 'Light of Iman', 'author' => 'Unknown', 'price' => 150, 'image' => 'Light of Iman.jpg'],
            ['name' => 'Lost for Words', 'author' => 'Stephanie Butland', 'price' => 320, 'image' => 'lost for words.jpg'],
            ['name' => 'Roktogolap', 'author' => 'Various', 'price' => 280, 'image' => 'Roktogolap.jpg'],
            ['name' => 'The Spirit of Islam', 'author' => 'Syed Ameer Ali', 'price' => 450, 'image' => 'The Spirit of Islam.jpg'],
            ['name' => 'Vuture', 'author' => 'Various', 'price' => 200, 'image' => 'vuture.jpg'],
            ['name' => 'Tirmigi', 'author' => 'Imam Tirmidhi', 'price' => 420, 'image' => 'Tirmigi.jpg'],
        ]);
    }
}