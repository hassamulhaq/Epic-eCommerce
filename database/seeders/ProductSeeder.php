<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductFlat;
use Database\Factories\ProductFlatFactory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {

        Product::factory()
            ->count(6)
            // create one productflat of each product
            ->hasProductFlat(1, function (array $attributes, Product $product) {
                return ['sku' => $product->sku];
            })
            ->create();

//        Product::factory()
//            ->count(6)
//            ->create()->each( function (Product $product) {
//                $product->productFlat()->save(ProductFlatFactory::class)
//                    ->make();
//            });

//        factory(App\ContactCompany::class, 10)->create()->each(function ($company) {
//            $company->contacts()->save(factory(App\Contact::class)->make());
//        });
    }
}
