<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    public function run()
    {
        \DB::table('collections')->insert([
            [
                'name' => 'Uncategorized',
                'slug' => \Str::slug('Uncategorized')
            ],
            [
                'name' => 'Featured Products',
                'slug' => \Str::slug('Featured Products')
            ],
            [
                'name' => 'On Sale',
                'slug' => \Str::slug('On Sale')
            ],
            [
                'name' => 'New Arrivals',
                'slug' => \Str::slug('New Arrivals')
            ],
            [
                'name' => 'Summer Sale',
                'slug' => \Str::slug('Summer Sale')
            ],
            [
                'name' => 'Winter Sale',
                'slug' => \Str::slug('Winter Sale')
            ],
            [
                'name' => 'Only For Men',
                'slug' => \Str::slug('Only For Men')
            ]
        ]);
    }
}
