<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandPostRequest extends FormRequest
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
        $rule = Rule::unique('brands', 'brand_name');
        if ($this->method() !== 'POST') {
            $rule->ignore($this->brand->id);
        }
        return [
            'brand_name' =>['required', 'string', 'max:255', $rule],
            'status'=>['boolean']
        ];
    }
}
