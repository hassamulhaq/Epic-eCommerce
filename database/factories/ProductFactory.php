<?php

namespace Database\Factories;

use App\Helpers\ProductHelper;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'type' => ProductHelper::PRODUCT_TYPE['simple'],
            'sku' => 'sku_' . uniqid(),
            'created_at' => Carbon::now(),
            'updated_at' => null
        ];
    }
}
