<?php

namespace App\Http\Requests\Project\BackEnd\Contact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => ['required','min:3','max:200'],
            'email' => ['required','min:3','email:dns'], 
            'whatsapp'=>['required','min:10','max:20'], 
            'telegram'=>['required','min:10','max:20'], 
            'linkedin'=>['required','active_url'], 
            'twitter'=>['required','active_url'], 
            'instagram'=>['required','active_url'], 
            'facebook'=>['required','active_url'],
            'title' => ['nullable', 'min:5', 'max:225'],
            'keywords' => ['nullable', 'min:5', 'max:225'],
            'description' => ['nullable', 'min:5', 'max:225'],
            'metaimage' => ['nullable', 'file', 'image'],
        ];
    }
}
