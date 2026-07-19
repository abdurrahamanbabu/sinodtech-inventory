<?php

namespace Modules\ProductManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
           'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'sku' => [
                'required',
                'string',
                'max:100',
                Rule::unique('products', 'sku')->ignore($this->route('product')),
            ],
            'stock' => ['required', 'integer', 'min:0'],
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Product Name',
            'description' => 'Product Description',
            'price' => 'Product Price',
            'sku' => 'Product SKU',
            'stock' => 'Product Stock',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Product name is required.',
            'name.string' => 'Product name must be a string.',
            'name.max' => 'Product name must not exceed 255 characters.',
            'description.string' => 'Product description must be a string.',
            'price.required' => 'Product price is required.',
            'price.numeric' => 'Product price must be a number.',
            'price.min' => 'Product price must be at least 0.',
            'sku.required' => 'Product SKU is required.',
            'sku.string' => 'Product SKU must be a string.',
            'sku.max' => 'Product SKU must not exceed 100 characters.',
            'sku.unique' => 'This Product SKU is already in use.',
            'stock.required' => 'Product stock is required.',
            'stock.integer' => 'Product stock must be an integer.',
            'stock.min' => 'Product stock must be at least 0.',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
