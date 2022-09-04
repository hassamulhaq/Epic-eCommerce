<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\ArrayShape;
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
            Product::updateOrCreate([
                'id' => $request->input('id')
            ], [
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'short_description' => $request->input('short_description'),
                'category' => $request->input('category'),
                'tags' => $request->input('tags'),
                'length' => $request->input('dimensions.length'),
                'width' => $request->input('dimensions.width'),
                'height' => $request->input('dimensions.height'),
                'weight' => $request->input('weight'),
                'sku' => $request->input('sku'),
                'mid_code' => $request->input('mid_code'),
                'price' => $request->input('price'),
                'regular_price' => $request->input('regular_price'),
                'stock_quantity' => $request->input('stock_quantity'),
                'backorders' => $request->input('backorders'),
                'low_stock_amount' => $request->input('low_stock_amount'),
                'stock_status' => $request->input('stock_status'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ]);
            \DB::commit();
            $this->response = [
                'status' => 'success',
                'status_code' => ResponseAlias::HTTP_CREATED,
                'message' => 'Task Succeed!'
            ];
        } catch (\Exception $e) {
            \DB::rollback();
            $this->response = [
                'status' => 'error',
                'status_code' => $e->getCode(),
                'message' => $e->getMessage()
            ];
        }

        return $this->response;
    }
}
