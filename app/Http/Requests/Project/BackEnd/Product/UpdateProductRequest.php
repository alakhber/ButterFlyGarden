<?php

namespace App\Http\Requests\Project\BackEnd\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name' => ['required', 'min:3', 'max:225'],
            'instok' => ['required', 'integer', 'in:0,1'],
            'slug' => ['required', 'min:3', 'unique:products,slug,' . $this->product->id],
            'barcode' => ['nullable', 'min:3', 'max:220'],
            'madeby' => ['nullable', 'min:3', 'max:220'],
            'stok' => ['nullable', 'integer', 'min:3', 'max:220'],
            'weight' => ['nullable', 'integer', ],
            'content'=>['nullable'],
            'height' => ['nullable', 'integer', ],
            'diameter' => ['nullable', 'integer', ],
            'volume' => ['nullable', 'integer', ],
            'title' => ['nullable', 'min:3', 'max:220'],
            'keywords' => ['nullable', 'min:3', 'max:220'],
            'description' => ['nullable', 'min:3', 'max:220'],
            'metaimage' => ['nullable', 'file', 'image'],
            'avatar' => ['nullable', 'file', 'image'],
        ];
    }
}
