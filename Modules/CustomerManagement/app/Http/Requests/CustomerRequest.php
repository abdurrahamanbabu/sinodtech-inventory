<?php

namespace Modules\CustomerManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "name"=> "required|string",
            "email"=> [
                "required",
                "email",
                 Rule::unique('customers', 'email')->ignore($this->route('customer')),
            ],
            "mobile"=> [
                "required",
                "min:11",
                 Rule::unique('customers', 'mobile')->ignore($this->route('customer')),
            ],
        ];
    }

     public function attributes(): array
    {
        return [
            'name' => 'Customer Name',
            'email' => 'Email Address',
            'mobile' => 'Mobile Number'
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
