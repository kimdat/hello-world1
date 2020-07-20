<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'id' => 'required',
//            'email' => 'required|email|unique:users',
            'name' => 'required|string|min:3|max:180',
            'price' => 'required|integer|min:1',
            'description' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg|max:10240'
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
            'id.required' => 'Product Id is required!',
            'name.required' => 'Product Name is required!',
            'name.min' => 'Product Name is minimum 3 characters',
            'name.max' => 'Product Name is maximum 180 characters',
            'price.required' => 'Price is required!',
            'price.integer'=>'Price must be integer!',
            
            'description.required' => 'Description is required!',
            'image.image' => 'The file upload must be image file',
            'image.mimes' => 'The extension of image are jpg, jpeg, png',
            'image.max' => 'The maximum size of image is 10Mb'
        ];
    }
}
