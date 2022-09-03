<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    public function run()
    {
        \DB::table('collections')->insert([
            [
                'id' => 1,
                'name' => 'Uncategorized',
                'slug' => \Str::slug('Uncategorized')
            ],
            [
                'id' => 2,
                'name' => 'Men',
                'slug' => \Str::slug('Men')
            ],
            [
                'id' => 3,
                'name' => 'Women',
                'slug' => \Str::slug('Women')
            ],
            [
                'id' => 4,
                'name' => 'Shoes',
                'slug' => \Str::slug('Shoes')
            ]
        ]);
    }
}
