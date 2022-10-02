<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\Product\StoreProductRequest;
use App\Http\Requests\Project\BackEnd\Product\UpdateProductRequest;
use App\Http\Requests\Project\BackEnd\Product\UploadImagesRequest;
use App\Models\Category;
use App\Models\GalleryItem;
use App\Models\Product;
use App\Traits\ControllerTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use ControllerTraits;
    public function index()
    {
        $products = Product::all();

        $sendData = [
            'products' => $products,
        ];

        return view('control.product.index', $sendData);
    }

    public function create()
    {
        $categories = Category::where('id', '!=', 1)->with('parent')->get();

        $sendData = [
            'categories' => $categories
        ];
        return view('control.product.create', $sendData);
    }

    public function store(StoreProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            $request['avatar'] = _imgUpload($request['avatar'], 'product');
            $product = Product::create($request);
            $product->assingSeo($request);
            $product->assingDetail($request);
            $product->assingGallery($request);
            DB::commit();

            return _stsCheck('Məhsul Uğurla Əlavə Olundu !');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            return _stsCheck('Məhsul Uğurla Əlavə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }

    public function show(Product $product)
    {
        $categories = Category::where('id', '!=', 1)->with('parent')->get();

        $sendData = [
            'categories' => $categories,
            'product' => $product->load('detail')->load('seo'),
        ];
        return view('control.product.show', $sendData);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['avatar'])) {
                $request['avatar'] = _imgUpload($request['avatar'], 'product');
                _imgDelete($product->avatar);
            } else {
                unset($request['avatar']);
            }
            $product->update($request);
            $product->assingSeo($request);
            $product->assingDetail($request);
            DB::commit();

            return _stsCheck('Məhsul Uğurla Redaktə Olundu !');
        } catch (\Throwable $th) {
            return _stsCheck('Məhsul  Redaktə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }

    public function destroy(Product $product)
    {
        try {
            DB::beginTransaction();
            $product->seo()->delete();
            $product->gallery()->delete();
            $product->detail()->delete();
            $product->delete();
            DB::commit();
            return _stsCheck('Məhsul Uğurla Silindi !');
        } catch (\Throwable $th) {
            return _stsCheck('Məhsul  Silinən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function gallery(Product $product)
    {
        $product = Product::with(['gallery' => function ($q) {
            $q->orderBy('position');
        }])->find($product->id);
        $sendData = [
            'product' => $product,
        ];

        return view('control.product.gallery', $sendData);
    }

    public function uploads(UploadImagesRequest $request, Product $product)
    {
        try {
            DB::beginTransaction();
            $product->assingGallery($request);
            DB::commit();
            return _stsCheck('Şəkillər Uğurla Yükləndi !');
        } catch (\Throwable $th) {
            return _stsCheck('Şəkillər Yüklənən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function deleteImage(Product $product, GalleryItem $image)
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

    public function status(Product $product)
    {
        try {
            DB::beginTransaction();
            $this->change($product);
            DB::commit();

            return _stsCheck('Status Uğurla Dəyişdirildi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Status Dəyişdirilən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function sortable(Request $request, Product $product)
    {
        try {
            if ($request->ajax()) {
                foreach ($request->positions as $position) {
                    list($id, $newPosition) = $position;
                    $product->gallery()->find((int) $id)->update(['position' => intval($newPosition)]);
                }
            }
            return response()->json(['operation' => true, 'msg' => 'Şəkillər Uğurla Sıralandı !']);
        } catch (\Throwable $th) {
            return response()->json(['operation' => false, 'msg' => 'Şəkillər Sıralanan Zaman Xəta Baş Verdi !']);
        }
    }
}
