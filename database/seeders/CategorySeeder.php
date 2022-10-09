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
                'title' => 'Uncategorized',
                'slug' => \Str::slug('Uncategorized')
            ],
            [
                'title' => 'Men',
                'slug' => \Str::slug('Men')
            ],
            [
                'title' => 'Women',
                'slug' => \Str::slug('Women')
            ],
            [
                'title' => 'Shoes',
                'slug' => \Str::slug('Shoes')
            ],
            [
                'title' => 'Kitchen',
                'slug' => \Str::slug('Kitchen')
            ],
            [
                'title' => 'Office',
                'slug' => \Str::slug('Office')
            ]
        ]);
    }
}
