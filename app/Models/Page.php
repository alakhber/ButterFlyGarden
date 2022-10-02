<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'content', 'status'];

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
            $request['metaimage'] = _imgUpload($request['metaimage'], 'seo/pages');
            _imgDelete(optional($this->seo())->metaimage);
        }

        if (count($this->seo()->get()) > 0) {
            $this->seo()->update($request);
        } else {
            $this->seo()->create($request);
        }
    }
}
