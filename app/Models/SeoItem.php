<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoItem extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','keywords','metaimage'];

    public function taggable(){
        return $this->morphTo();
    }
}
