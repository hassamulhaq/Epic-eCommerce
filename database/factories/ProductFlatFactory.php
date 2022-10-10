<?php

namespace Database\Factories;

use App\Helpers\Constant;
use App\Helpers\ProductHelper;
use App\Models\Product;
use App\Models\ProductFlat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProductFlatFactory extends Factory
{

    protected $model = ProductFlat::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();
        $slug = Str::slug($title);

        return [
            //'product_id' => $product->id,
            'title' => $title,
            'slug' => $slug,
            'short_description' => $this->faker->text(),
            'tags' => $this->faker->word(),
            'length' => $this->faker->randomNumber(),
            'width' => $this->faker->randomNumber(),
            'height' => $this->faker->randomNumber(),
            'weight' => $this->faker->randomNumber(),
            //'sku' => '0', // comes from parent_table defined in Product Factory
            'mid_code' => $this->faker->word(),
            'price' => $this->faker->randomDigit(),
            'regular_price' => $this->faker->randomDigit(),
            'stock_quantity' => $this->faker->numberBetween(0, 300),
            'backorders' => Arr::random(Constant::PRODUCT_BACKORDERS),
            'low_stock_amount' => $this->faker->word(),
            'stock_status' => Arr::random(ProductHelper::PRODUCT_STOCK_STATUS),
            'description' => $this->faker->text(),
            'featured' => Arr::random([0, 1]),
            'new' => Arr::random([0, 1]),
            'status' => Arr::random(ProductHelper::PRODUCT_STATUS),
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ];
    }
}
