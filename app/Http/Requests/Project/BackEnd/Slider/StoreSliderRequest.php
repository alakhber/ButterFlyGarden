<?php

namespace App\Http\Requests\Project\BackEnd\Slider;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'photo' => ['required', 'file', 'image'],
            'content' => ['nullable'],
            'link' => ['nullable', 'min:3', 'max:225'],
            'butoon' => ['nullable', 'min:3', 'max:225'],
        ];
    }
}
