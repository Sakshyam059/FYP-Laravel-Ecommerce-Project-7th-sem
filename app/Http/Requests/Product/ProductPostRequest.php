<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductPostRequest extends FormRequest
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
        $rule = Rule::unique('sizes', 'size_name');
        if ($this->method() !== 'POST') {
            $rule->ignore($this->product->id);
        }
        return [
            'name' => ['required','string','max:255',$rule],
            'short_description' => ['required','string'],
            'description' => ['required','string'],
            'category_id' => ['required','string'],
            'subcategory_id' => ['required'],
            'brand_id' => ['required'],
            'price' => ['required'],
            'discount_value' =>['required'],
            'discount_type' =>['nullable'],
            'tags' =>['nullable','string'],
            'trending'=>['nullable']
        ];
    }
}
