<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'avatar', 'content','status'];

    public function seo()
    {
        return $this->morphOne(SeoItem::class, 'taggable');
    }
    public function gallery()
    {
        return $this->morphMany(GalleryItem::class, 'taggable');
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
            $request['metaimage'] = _imgUpload($request['metaimage'], 'seo/project');
            _imgDelete(optional($this->seo())->metaimage);
        }

        if (count($this->seo()->get()) > 0) {
            $this->seo()->update($request);
        } else {
            $this->seo()->create($request);
        }
    }

    public function assingGallery($request)
    {
        if (isset($request['gallery'])) {
            collect($request['gallery'])->map(function ($image) {
                $this->gallery()->create(['image' => _imgUpload($image, 'gallery/project')]);
                return $image;
            });
        }
    }
}
