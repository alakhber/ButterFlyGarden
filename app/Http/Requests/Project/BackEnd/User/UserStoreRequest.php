<?php

namespace App\Http\Requests\Project\BackEnd\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fullname'=>['required','min:3','max:100'],
            'username'=>['required','min:3','max:100','unique:users,username'],
            'email'=>['required','email:dns','min:3','max:100','unique:users,email'],
            'phone'=>['required','min:7','max:20'],
            'password'=>['required','min:8','max:100','confirmed'],
            'type'=>['required','in:Super-Admin,Admin,Moderator,Sales-Manager'],
            'avatar'=>['nullable','image','file'],
        ];
    }
}
