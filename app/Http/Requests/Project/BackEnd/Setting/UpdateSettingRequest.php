<?php

namespace App\Http\Requests\Project\BackEnd\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [

            'main_title' => ['required', 'min:3', 'max:225'],
            'title' => ['nullable', 'min:5', 'max:225'],
            'keywords' => ['nullable', 'min:5', 'max:225'],
            'description' => ['nullable', 'min:5', 'max:225'],
            'metaimage' => ['nullable', 'file', 'image'],
            'main_logo' => ['nullable', 'file', 'image'],
            'footer_logo' => ['nullable', 'file', 'image'],
        ];
    }
}
