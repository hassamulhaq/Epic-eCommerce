<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        \DB::table('categories')->insert([
            [
                'name' => 'Uncategorized',
                'slug' => \Str::slug('Uncategorized')
            ],
            [
                'name' => 'Men',
                'slug' => \Str::slug('Men')
            ],
            [
                'name' => 'Women',
                'slug' => \Str::slug('Women')
            ],
            [
                'name' => 'Shoes',
                'slug' => \Str::slug('Shoes')
            ],
            [
                'name' => 'Kitchen',
                'slug' => \Str::slug('Kitchen')
            ],
            [
                'name' => 'Office',
                'slug' => \Str::slug('Office')
            ]
        ]);
    }
}
