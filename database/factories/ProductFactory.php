<?php

namespace Database\Factories;

use App\Helpers\Constant;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'uuid' => Str::uuid()->toString(),
            'title' => $title,
            'slug' => Str::slug($title),
            'short_description' => $this->faker->text(),
            //'category_id' => $this->faker->numberBetween(1, 5),
            'tags' => $this->faker->word(),
            'length' => $this->faker->randomNumber(),
            'width' => $this->faker->randomNumber(),
            'height' => $this->faker->randomNumber(),
            'weight' => $this->faker->randomNumber(),
            'sku' => 'sku_' . uniqid(),
            'mid_code' => $this->faker->word(),
            'price' => $this->faker->randomDigit(),
            'regular_price' => $this->faker->randomDigit(),
            'stock_quantity' => $this->faker->numberBetween(0, 300),
            'backorders' => Arr::random(Constant::PRODUCT_BACKORDERS),
            'low_stock_amount' => $this->faker->word(),
            'stock_status' => Arr::random(Constant::PRODUCT_STOCK_STATUS),
            'description' => $this->faker->text(),
            'featured' => Arr::random([0, 1]),
            'status' => Arr::random(Constant::PRODUCT_STATUS),
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => null,
        ];
    }
}
