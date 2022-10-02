<?php

namespace App\Http\Requests\Project\BackEnd\Image;

use Illuminate\Foundation\Http\FormRequest;

class StoreImagesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image'=>['required'],
            'image.*'=>['required','file','image'],
        ];
    }
}
