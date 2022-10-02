<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'barcode', 'madeby', 'avatar', 'slug', 'stok', 'status', 'instock','content'];

    public function detail()
    {
        return $this->hasOne(ProductSizeDetail::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

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
            $request['metaimage'] = _imgUpload($request['metaimage'], 'seo/product');
            _imgDelete(optional($this->seo())->metaimage);
        }

        if (count($this->seo()->get()) > 0) {
            $this->seo()->update($request);
        } else {
            $this->seo()->create($request);
        }
    }

    public function assingDetail($request)
    {
        $fillable = ['weight', 'height', 'diameter', 'volume'];
        foreach ($request as $key => $value) {
            if (!in_array($key, $fillable)) {
                unset($request[$key]);
            }
        }
        if (count($this->detail()->get()) > 0) {
            $this->detail()->update($request);
        } else {
            $this->detail()->create($request);
        }
    }

    public function assingGallery($request)
    {
        if (isset($request['gallery'])) {
            foreach ($request['gallery'] as $image) {
                $this->gallery()->create(['image' => _imgUpload($image, 'gallery/product')]);
            }
        }
    }
}
