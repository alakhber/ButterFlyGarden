<?php

namespace App\Rules\Category;

use Illuminate\Contracts\Validation\Rule;

class CheckParentRule implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        
    }

    public function message()
    {
        return 'The validation error message.';
    }
}
