<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            'id'=>1,
            'book_id'=>1,
            'score'=>90,
            'content'=>'初学者向けにおすすめです。',
            'user_id'=>1,
            'reviewed_at'=>'2024-11-26'
        ]);
    }
}
