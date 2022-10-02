<?php

namespace App\Http\Requests\Project\BackEnd\About;

use Illuminate\Foundation\Http\FormRequest;

class AboutUpdateRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'aboutus' => ['required','min:3'],
            'about' => ['required','min:3'], 
            'title' => ['nullable', 'min:5', 'max:225'],
            'keywords' => ['nullable', 'min:5', 'max:225'],
            'description' => ['nullable', 'min:5', 'max:225'],
            'metaimage' => ['nullable', 'file', 'image'],
        ];
    }
}
