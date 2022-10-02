<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\Blog\StoreBlogRequest;
use App\Http\Requests\Project\BackEnd\Blog\UpdateBlogRequest;
use App\Http\Requests\Project\BackEnd\Product\UploadImagesRequest;
use App\Models\Blog;
use App\Models\GalleryItem;
use App\Traits\ControllerTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    use ControllerTraits;
    public function index()
    {
        $blogs = Blog::all();

        $sendData = [
            'blogs' => $blogs,
        ];

        return view('control.blog.index', $sendData);
    }


    public function create()
    {
        return view('control.blog.create');
    }


    public function store(StoreBlogRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['avatar'])) {
                $request['avatar'] = _imgUpload($request['avatar'], 'blog');
            }

            $blog = Blog::create($request);
            $blog->assingSeo($request);
            $blog->assingGallery($request);
            DB::commit();

            return _stsCheck('Blog Uğurla Əlavə Olundu!');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollBack();
            return _stsCheck('Blog Əlavə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }


    public function show(Blog $blog)
    {
        $sendData = [
            'blog' => $blog->load('seo'),
        ];
        return view('control.blog.show',$sendData);
    }


   
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['avatar'])) {
                $request['avatar'] = _imgUpload($request['avatar'], 'product');
                _imgDelete($blog->avatar);
            } else {
                unset($request['avatar']);
            }
            $blog->update($request);
            $blog->assingSeo($request);
            DB::commit();

            return _stsCheck('Blog Uğurla Redaktə Olundu !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Blog  Redaktə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }


    public function destroy(Blog $blog)
    {
        try {
            DB::beginTransaction();
            $blog->seo()->delete();
            $blog->gallery()->delete();
            $blog->delete();
            DB::commit();
            return _stsCheck('Blog Uğurla Silindi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Blog  Silinən Zaman Xəta Baş Verdi !', false);
        }
    }



    public function gallery(Blog $blog)
    {
        $blog = Blog::with(['gallery' => function ($q) {
            $q->orderBy('position');
        }])->find($blog->id);

        $sendData = [
            'blog' => $blog,
        ];

        return view('control.blog.gallery', $sendData);
    }

    public function uploads(UploadImagesRequest $request, Blog $blog)
    {
        try {
            DB::beginTransaction();
            $blog->assingGallery($request);
            DB::commit();
            return _stsCheck('Şəkillər Uğurla Yükləndi !');
        } catch (\Throwable $th) {
            return _stsCheck('Şəkillər Yüklənən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function deleteImage(Blog $blog, GalleryItem $image)
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

    public function status(Blog $blog)
    {
        try {
            DB::beginTransaction();
            $this->change($blog);
            DB::commit();

            return _stsCheck('Status Uğurla Dəyişdirildi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Status Dəyişdirilən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function sortable(Request $request, Blog $blog)
    {
        try {
            if ($request->ajax()) {
                foreach ($request->positions as $position) {
                    list($id, $newPosition) = $position;
                    $blog->gallery()->find((int) $id)->update(['position' => intval($newPosition)]);
                }
            }
            return response()->json(['operation' => true, 'msg' => 'Şəkillər Uğurla Sıralandı !']);
        } catch (\Throwable $th) {
            return response()->json(['operation' => false, 'msg' => 'Şəkillər Sıralanan Zaman Xəta Baş Verdi !']);
        }
    }
}
