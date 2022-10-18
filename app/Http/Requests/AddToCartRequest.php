<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_uuid' => 'required|uuid|exists:product_flat,uuid',
            'quantity' => 'required|integer|min:1'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
