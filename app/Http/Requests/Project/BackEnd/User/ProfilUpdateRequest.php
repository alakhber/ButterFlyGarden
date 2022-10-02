<?php

namespace App\Http\Requests\Project\BackEnd\User;

use Illuminate\Foundation\Http\FormRequest;

class ProfilUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fullname'=>['required','min:3','max:100'],
            'username'=>['required','min:3','max:100','unique:users,username,'.$this->user->id],
            'email'=>['required','email:dns','min:3','max:100','unique:users,email,'.$this->user->id],
            'phone'=>['required','min:7','max:20'],
            'password'=>['nullable','min:8','max:100','confirmed'],
            'avatar'=>['nullable','image','file'],
        ];
    }
}
