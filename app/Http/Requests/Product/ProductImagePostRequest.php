<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductImagePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $image='required';
        if ($this->method() !== 'POST') {
            if($this->product->allImage->isNotEmpty() ){
                $image='nullable';
            }
        }
        return [
            'image' => [$image],
            'image.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ];
    }
}
