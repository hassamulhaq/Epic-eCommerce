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
                'id' => Uuid::uuid4()->toString(),
                'title' => 'Uncategorized',
                'slug' => \Str::slug('Uncategorized')
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'title' => 'Featured Products',
                'slug' => \Str::slug('Featured Products')
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'title' => 'On Sale',
                'slug' => \Str::slug('On Sale')
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'title' => 'New Arrivals',
                'slug' => \Str::slug('New Arrivals')
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'title' => 'Summer Sale',
                'slug' => \Str::slug('Summer Sale')
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'title' => 'Winter Sale',
                'slug' => \Str::slug('Winter Sale')
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'title' => 'Only For Men',
                'slug' => \Str::slug('Only For Men')
            ]
        ]);
    }
}
