<?php

namespace App\Rules\Category;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class ChachChildCategory implements Rule
{
    private $category ;
    public function __construct($category)
    {
        $this->category = $category;
    }

   
    public function passes($attribute, $value)
    {
        $category = Category::findOrFail($value);
        $exceptID = $this->category->getDescendants($this->category);
        
        if(!in_array($value,$exceptID) || $category->id != $this->category->id){
            return true;
        }
    }

   
    public function message()
    {
        return 'The validation error message.';
    }
}
