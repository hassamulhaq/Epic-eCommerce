<?php

namespace App\Http\Services;

use App\Events\ProductCreatedEvent;
use App\Helpers\Constant;
use App\Helpers\ProductHelper;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductFlat;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProductService
{

    protected array $response = [];

    /**
     * @throws \Throwable
     */
    #[ArrayShape(['status' => "string", 'status_code' => "int|mixed", 'success' => "string", 'error' => "string"])]
    public function store($request): array
    {
        $published_at = Carbon::now()->toDateTimeString();

        \DB::beginTransaction();

        try {
            $product = Product::create([
                'type' => $request['type'] ?? ProductHelper::PRODUCT_TYPE['simple'],
                'sku' => $request['sku'],
                'additional' => $request['additional'] ?? null
            ]);

            $productFlat = $product->productFlat()->create([
                'product_id' => $product->id,
                'title' => $request['title'],
                'slug' => $request['slug'],
                'short_description' => $request['short_description'],
                'tags' => $request['tags'],
                'length' => $request['dimensions']['length'],
                'width' => $request['dimensions']['width'],
                'height' => $request['dimensions']['height'],
                'weight' => $request['weight'],
                'sku' => $request['sku'],
                'mid_code' => $request['mid_code'],
                'product_number' => $request['product_number'],
                'price' => $request['price'],
                'regular_price' => $request['regular_price'],
                'cost' => $request['cost'],
                'special_price' => $request['special_price'],
                'special_price_from' => $request['special_price_from'],
                'special_price_to' => $request['special_price_to'],
                'stock_quantity' => $request['stock_quantity'],
                'backorders' => $request['backorders'],
                'low_stock_amount' => $request['low_stock_amount'],
                'stock_status' => $request['stock_status'],
                'description' => $request['description'],
                'featured' => $request['featured'] ?? ProductHelper::IS_FEATURED['default'],
                'new' => $request['new'] ?? ProductHelper::IS_NEW['default'],
                'sold_individual' => $request['sold_individual'] ?? ProductHelper::IS_SOLD_INDIVIDUAL['default'],
                'status' => $request['status'],
                'published_at' => $published_at
            ]);


            if (array_key_exists('categories', $request)) {
                $product->categories()->sync($request['categories']);
            }

            if (array_key_exists('collections', $request)) {
                $product->collections()->sync($request['collections']);
            }

            // save attributes
            if (array_key_exists('attribute', $request)) {
                $attributeArr = [];
                $count = count($request['attribute']['key']);
                for ($i = 0; $i < $count; $i++) {
                    $attributeArr[$i]['product_id'] = $product->id;
                    $attributeArr[$i]['attribute'] = $request['attribute']['key'][$i];
                    $attributeArr[$i]['value'] = $request['attribute']['value'][$i];
                }
                ProductAttribute::insert($attributeArr);
            }


            if (array_key_exists('thumbnail', $request)) {
                $productFlat->addMedia(storage_path(Constant::MEDIA_TMP_PATH . $request['thumbnail']))->toMediaCollection('thumbnail');
            }

            // move media
            if (array_key_exists('gallery', $request)) {
                foreach ($request['gallery'] as $file) {
                    $productFlat->addMedia(storage_path(Constant::MEDIA_TMP_PATH . $file))->toMediaCollection('gallery');
                }
            }

            // send mail notification
            \Event::dispatch(new ProductCreatedEvent($product));

            \DB::commit();
            $this->response = [
                'success' => true,
                'status_code' => ResponseAlias::HTTP_CREATED,
                'reload' => false,
                'message' => 'Task Completed!',
                'data' => []
            ];
        } catch (\Exception $e) {
            \DB::rollback();
            $this->response = [
                'success' => false,
                'status_code' => $e->getCode(),
                'reload' => false,
                'type' => 'try_catch exception',
                'message' => 'Something went wrong!',
                'data' => ['message' => $e->getMessage()]
            ];
        }

        return $this->response;
    }
}
