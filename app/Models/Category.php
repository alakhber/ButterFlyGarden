<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private array $descendants = [];

    protected $fillable = ['category_id', 'name', 'avatar', 'slug', 'status'];

    public function parent()
    {
        return $this->belongsTo($this, 'category_id');
    }
    public function child()
    {
        return $this->hasMany($this, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function seo()
    {
        return $this->morphOne(SeoItem::class, 'taggable');
    }

    public function assingSeo($request)
    {
        $fillable = ['title', 'description', 'keywords', 'metaimage'];
        foreach ($request as $key => $value) {
            if (!in_array($key, $fillable)) {
                unset($request[$key]);
            }
        }
        if (isset($request['metaimage'])) {
            $request['metaimage'] = _imgUpload($request['metaimage'], 'seo/category');
            _imgDelete(optional($this->seo())->metaimage);
        }

        if (count($this->seo()->get()) > 0) {
            $this->seo()->update($request);
        } else {
            $this->seo()->create($request);
        }
    }


    public function subcategories()
    {
        return $this->hasMany($this, 'category_id');
    }

    public function children()
    {
        return $this->subcategories()->with('children');
    }

    public function hasChildren()
    {
        return (bool) $this->children->count();
    }

    public function findDescendants(Category $category)
    {
        if ($this->id != $category->id) {
            $this->descendants[] = $category->id;
        }

        if ($category->hasChildren()) {
            foreach ($category->children as $child) {
                $this->findDescendants($child);
            }
        }
    }

    public function getDescendants(Category $category)
    {
        $this->findDescendants($category);
        return $this->descendants;
    }
}
