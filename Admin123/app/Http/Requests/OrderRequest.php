<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [    
           
//            'email' => 'required|email|unique:users',
            'product_id' => 'exists:products,id'
           
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
//            'email.required' => 'Email is required!',
            'product_id.exists' => 'Product Id isn\'t exist!',
            
        ];
    }
}
