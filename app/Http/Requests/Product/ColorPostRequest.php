<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ColorPostRequest extends FormRequest
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
        $rule = Rule::unique('colors', 'color_name');
        if ($this->method() !== 'POST') {
            $rule->ignore($this->color->id);
        }
        return [
            'color_name' =>['required', 'string', 'max:255', $rule],
            'status'=>['boolean']
        ];
    }
}
