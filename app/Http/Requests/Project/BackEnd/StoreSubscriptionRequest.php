<?php

namespace App\Http\Requests\Project\BackEnd;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'email'=>['required','unique:subscriptions,email','email:dns','min:3','max:100'],
        ];
    }
}
