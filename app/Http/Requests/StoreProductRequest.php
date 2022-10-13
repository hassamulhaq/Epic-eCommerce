<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class StoreProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:200',
            'slug' => 'nullable|alpha_dash|unique:product_flat,slug',
            'short_description' => 'nullable',
            'tags' => 'nullable',
            'dimensions' => 'nullable',
            'dimensions.length' => 'nullable|integer',
            'dimensions.width' => 'nullable|integer',
            'dimensions.height' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'sku' => 'required|string|max:200|alpha_dash|unique:products,sku|unique:product_flat,sku',
            'mid_code' => 'nullable|alpha_dash',
            'product_number' => 'nullable|alpha_dash',
            'price' => 'required|numeric',
            'regular_price' => 'nullable|gte:price',
            'cost' => 'nullable|numeric',
            'special_price' => 'nullable|numeric',
            'special_price_from' => 'nullable|date',
            'special_price_to' => 'nullable|date',
            'stock_quantity' => 'nullable',
            'backorders' => 'nullable',
            'low_stock_amount' => 'nullable',
            'stock_status' => 'nullable',
            'description' => 'nullable',
            'status' => 'nullable',
            'featured' => 'sometimes|nullable|int',
            'new' => 'sometimes|nullable|int',
            'sold_individual' => 'nullable|int',
            'published_at' => 'nullable',
            'categories' => 'nullable|array',
            'categories.*' => 'string|exists:categories,id',
            'collections' => 'nullable|array',
            'collections.*' => 'string|exists:collections,id',
            'attribute' => 'nullable|array',
            'attribute.value.*' => 'filled|string',
            'attribute.key.*' => 'filled|string',
            'thumbnail' => 'nullable',
            'gallery' => 'nullable',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function failedValidation(Validator $validator): void
    {
        $response = [
            'success' => false,
            'status' => 'error',
            'status_code' => 422,
            'type' => 'validation_error',
            'message' => 'Validation Error',
            'data' => $validator->errors()
        ];


        throw new HttpResponseException(response()->json($response, $response['status_code']));
    }
}
