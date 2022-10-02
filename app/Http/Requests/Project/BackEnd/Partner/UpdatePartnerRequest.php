<?php

namespace App\Http\Requests\Project\BackEnd\Partner;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartnerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>['required','min:3','max:225'],
            'avatar'=>['nullable','file','image'],
        ];
    }
}
