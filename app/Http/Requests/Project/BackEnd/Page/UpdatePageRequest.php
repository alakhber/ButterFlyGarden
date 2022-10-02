<?php

namespace App\Http\Requests\Project\BackEnd\Page;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:100'],
            'slug' => ['required', 'min:3', 'max:200', 'unique:pages,slug,'.$this->page->id],
            'content' => ['required'],
            'title' => ['nullable', 'min:5', 'max:225'],
            'keywords' => ['nullable', 'min:5', 'max:225'],
            'description' => ['nullable', 'min:5', 'max:225'],
            'metaimage' => ['nullable', 'file', 'image'],
        ];
    }
}
