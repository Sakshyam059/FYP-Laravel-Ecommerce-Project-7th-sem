<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubcategoryPostRequest extends FormRequest
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
        $rule = Rule::unique('subcategories')->where(function ($query) {
            $query
            ->where('subcategory_name', $this->subcategory_name)
            ->where('category_id', $this->category_id)
            ;
        });
        if ($this->method() !== 'POST') {
            $rule->ignore($this->subcategory->id);
        }
        return [
            'subcategory_name' => ['required', 'string', 'max:150', $rule],
            'category_id' => ['required'],
            'description'=>['nullable','string'],
            'status' => ['boolean']
        ];
    }
    
}
