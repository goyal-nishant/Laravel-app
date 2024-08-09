<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run()
    {
        $numberOfPosts = 10;

        for ($i = 0; $i < $numberOfPosts; $i++) {
            DB::table('posts')->insert([
                'title' => 'Sample Post ' . ($i + 1),
                'content' => 'This is a sample content for post number ' . ($i + 1),
                'slug' => Str::slug('Sample Post ' . ($i + 1)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }   
}
