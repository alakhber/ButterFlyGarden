<?php

namespace App\Http\Requests\Project\BackEnd\Category;

use App\Rules\Category\ChachChildCategory;
use App\Rules\Category\FirstCategoryCheck;
use Illuminate\Foundation\Http\FormRequest;


class UpdateCategoryRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:100', new FirstCategoryCheck($this->category->id)],
            'slug' => ['required', 'min:3', 'max:200', 'unique:categories,slug,' . $this->category->id],
            'category_id' => ['required', 'integer', 'exists:categories,id', new ChachChildCategory($this->category)],
            'avatar' => ['nullable', 'file', 'image'],
            'title' => ['nullable', 'min:5', 'max:225'],
            'keywords' => ['nullable', 'min:5', 'max:225'],
            'description' => ['nullable', 'min:5', 'max:225'],
            'description' => ['nullable', 'min:5', 'max:225'],
            'metaimage' => ['nullable', 'file', 'image'],
        ];
    }
}
