<?php

namespace App\Http\Requests\Project\FrontEnd\Subscription;

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
            'email'=>['required','min:3','max:100','email:dns'],
        ];
    }
}
