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
            'slug' => 'nullable|alpha_dash|unique:products,slug',
            'short_description' => 'nullable',
            'tags' => 'nullable',
            'dimensions' => 'nullable',
            'dimensions.length' => 'nullable',
            'dimensions.width' => 'nullable',
            'dimensions.height' => 'nullable',
            'weight' => 'nullable',
            'sku' => 'nullable',
            'mid_code' => 'nullable',
            'price' => 'required|numeric',
            'regular_price' => 'required|numeric|gte:price',
            'stock_quantity' => 'nullable',
            'backorders' => 'nullable',
            'low_stock_amount' => 'nullable',
            'stock_status' => 'nullable',
            'description' => 'nullable',
            'status' => 'nullable',
            'published_at' => 'nullable',
            'categories' => 'nullable|array',
            'categories.*' => 'integer',
            'collections' => 'nullable|array',
            'collections.*' => 'integer',
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
