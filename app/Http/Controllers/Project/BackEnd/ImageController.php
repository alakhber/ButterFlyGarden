<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\Image\StoreImagesRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{

    public function index()
    {
        $images = Image::all();

        return view('control.gallery.index', compact('images'));
    }

    public function store(StoreImagesRequest $request)
    {
        try {
            DB::beginTransaction();
            $request =  $request->validated();
            collect($request['image'])->map(function ($image) {
                Image::create(['image' => _imgUpload($image, 'images')]);
            });
            DB::commit();

            return _stsCheck('Uğurla Yükləndi!');
        } catch (\Throwable $th) {
            DB::rollback();
            return _stsCheck('Yükləmə Uğursuz Oldu !', false);
        }
    }

    public function destroy(Image $image)
    {
        try {
            DB::beginTransaction();
            _imgDelete($image->image);
            $image->delete();
            DB::commit();

            return _stsCheck('Şəkil Uğurla Silindi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Şəkil Silinən Zaman Xəta Baş Verdi !', false);
        }
    }
}
