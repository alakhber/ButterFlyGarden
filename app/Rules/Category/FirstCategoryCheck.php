<?php

namespace App\Rules\Category;

use Illuminate\Contracts\Validation\Rule;

class FirstCategoryCheck implements Rule
{
    private $category;
    public function __construct($id)
    {
        $this->category = $id;
    }

    public function passes($attribute, $value)
    {
        if ($this->category != 1) {
            return true;
        }
    }

    public function message()
    {
        return 'Kataloq Dəyişdirilə Bilməz !';
    }
}
