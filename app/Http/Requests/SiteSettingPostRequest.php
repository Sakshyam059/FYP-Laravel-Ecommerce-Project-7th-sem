<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingPostRequest extends FormRequest
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
        return [
            'name' =>[ 'required'],
            'email' =>[ 'required'],
            'address' =>[ 'required'],
            'phone' =>[ 'required'],
            'description' =>[ 'required'],
            'favicon' => ['nullable'],
            'logo' => ['nullable'],
            'working_hrs' =>[ 'required'],
            'copyrights' =>[ 'required'],
            'fb_link' =>[ 'required'],
            'insta_link' =>[ 'required'],
            'twitter_link' =>[ 'required'],
        ];
    }
}
