<?php

namespace App\Http\Requests\Project\BackEnd\Product;

use Illuminate\Foundation\Http\FormRequest;

class UploadImagesRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'gallery'=>['nullable'],
            'gallery.*'=>['file','image'],
        ];
    }
}
