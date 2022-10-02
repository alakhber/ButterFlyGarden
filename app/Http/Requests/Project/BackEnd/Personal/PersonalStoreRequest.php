<?php

namespace App\Http\Requests\Project\BackEnd\Personal;

use Illuminate\Foundation\Http\FormRequest;

class PersonalStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'fullname' =>['required','min:3','max:255'],
            'position' =>['required','min:3','max:255'],
            'linkedin' =>['required','min:3','max:255'],
            'facebook' =>['required','min:3','max:255'],
            'twitter' =>['required','min:3','max:255'],
            'image' =>['nullable','file','image'],
        ];
    }
}
