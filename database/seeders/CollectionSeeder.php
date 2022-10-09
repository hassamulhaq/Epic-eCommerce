<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class CollectionSeeder extends Seeder
{
    public function run()
    {
        \DB::table('collections')->insert([
            [
                'title' => 'Uncategorized',
                'slug' => \Str::slug('Uncategorized')
            ],
            [
                'title' => 'Featured Products',
                'slug' => \Str::slug('Featured Products')
            ],
            [
                'title' => 'On Sale',
                'slug' => \Str::slug('On Sale')
            ],
            [
                'title' => 'New Arrivals',
                'slug' => \Str::slug('New Arrivals')
            ],
            [
                'title' => 'Summer Sale',
                'slug' => \Str::slug('Summer Sale')
            ],
            [
                'title' => 'Winter Sale',
                'slug' => \Str::slug('Winter Sale')
            ],
            [
                'title' => 'Only For Men',
                'slug' => \Str::slug('Only For Men')
            ]
        ]);
    }
}
