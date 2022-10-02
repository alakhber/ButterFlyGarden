<?php

namespace App\Http\Requests\Project\BackEnd\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => is_null($this->slug) ? _slug($this->name) :  _slug($this->slug),
        ]);
    }
    
    public function rules()
    {
        return [
            'name'=>['required','min:3','max:225'],
            'slug'=>['required','min:3','unique:blogs,slug,'.$this->blog->id],
            'content'=>['nullable'],
            'title'=>['nullable','min:3','max:220'],
            'keywords'=>['nullable','min:3','max:220'],
            'description'=>['nullable','min:3','max:220'],
            'metaimage' => ['nullable', 'file', 'image'],
            'avatar'=>['nullable','file','image'],
            'gallery'=>['nullable'],
            'gallery.*'=>['file','image'],
        ];
    }
}
