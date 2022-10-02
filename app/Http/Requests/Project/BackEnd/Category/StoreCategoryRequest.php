<?php

namespace App\Http\Requests\Project\BackEnd\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'slug' => ['required', 'min:3', 'max:200', 'unique:categories,slug'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'avatar' => ['nullable', 'file', 'image'],
            'title' => ['nullable', 'min:5', 'max:225'],
            'keywords' => ['nullable', 'min:5', 'max:225'],
            'description' => ['nullable', 'min:5', 'max:225'],
            'metaimage' => ['nullable', 'file', 'image'],
        ];
    }
}
