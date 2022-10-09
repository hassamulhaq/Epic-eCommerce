<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class CategorySeeder extends Seeder
{
    public function run()
    {
        \DB::table('categories')->insert([
            [
                'uuid' => Uuid::uuid4()->toString(),
                'title' => 'Uncategorized',
                'slug' => \Str::slug('Uncategorized')
            ],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'title' => 'Men',
                'slug' => \Str::slug('Men')
            ],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'title' => 'Women',
                'slug' => \Str::slug('Women')
            ],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'title' => 'Shoes',
                'slug' => \Str::slug('Shoes')
            ],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'title' => 'Kitchen',
                'slug' => \Str::slug('Kitchen')
            ],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'title' => 'Office',
                'slug' => \Str::slug('Office')
            ]
        ]);
    }
}
