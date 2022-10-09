<?php

namespace App\Http\Services;

use App\Helpers\Constant;
use App\Models\Product;
use App\Models\ProductAttribute;
use Carbon\Carbon;
use Illuminate\Http\Response;
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
        \DB::beginTransaction();
        try {
            $product = Product::create(
                [
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
                    'price' => $request['price'],
                    'regular_price' => $request['regular_price'],
                    'stock_quantity' => $request['stock_quantity'],
                    'backorders' => $request['backorders'],
                    'low_stock_amount' => $request['low_stock_amount'],
                    'stock_status' => $request['stock_status'],
                    'description' => $request['description'],
                    'status' => $request['status'],
                    'published_at' => Carbon::now()->toDateTimeString()
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
                $product->addMedia(storage_path(Constant::MEDIA_TMP_PATH . $request['thumbnail']))->toMediaCollection('thumbnail');
            }

            // move media
            if (array_key_exists('gallery', $request)) {
                foreach ($request['gallery'] as $file) {
                    $product->addMedia(storage_path(Constant::MEDIA_TMP_PATH . $file))->toMediaCollection('gallery');
                }
            }

            \DB::commit();
            $this->response = [
                'success' => true,
                'status' => 'success',
                'status_code' => ResponseAlias::HTTP_CREATED,
                'message' => 'Task Completed!',
                'data' => []
            ];
        } catch (\Exception $e) {
            \DB::rollback();
            $this->response = [
                'success' => false,
                'status' => 'error',
                'status_code' => $e->getCode(),
                'type' => 'try_catch exception',
                'message' => 'Something went wrong!',
                'data' => ['message' => $e->getMessage()]
            ];
        }

        return $this->response;
    }
}
