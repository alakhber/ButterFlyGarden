<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\Category\StoreCategoryRequest;
use App\Http\Requests\Project\BackEnd\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ControllerTraits;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use ControllerTraits;
    public function index()
    {
        $categories = Category::with('parent')->where('id','!=',1)->get();
        $sendData = ['categories' => $categories];

        return view('control.category.index', $sendData);
    }


    public function create()
    {
        $categories = Category::all();

        $sendData = ['categories' => $categories];
        return view('control.category.create', $sendData);
    }


    public function store(StoreCategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['avatar'])) {
                $request['avatar'] = _imgUpload($request['avatar'], 'category');
            }
            $category = Category::create($request);
            $category->assingSeo($request);
            DB::commit();
            
            return _stsCheck('Kataloq Uğurla Əlavə Olundu !');
        } catch (Exception $th) {
            DB::rollback();
            dd($th->getMessage());
            _imgDelete($request['avatar']);

            return _stsCheck('Kataloq  Əlavə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }


    public function show(Category $category)
    {
        $exceptID = $category->getDescendants($category);
        $exceptID[] = $category->id;
        $categories = Category::whereNotIn('id',$exceptID)->get();
        
        $sendData = [
            'categories' => $categories,
            'category' => $category,
        ];
        return view('control.category.edit', $sendData);
    }



    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['avatar'])) {
                $request['avatar'] = _imgUpload($request['avatar'], 'category');
            }
            $category->update($request);
            $category->assingSeo($request);
            DB::commit();
            return _stsCheck('Kataloq Uğurla Redaktə Olundu !');
        } catch (Exception $th) {
            DB::rollBack();
            if (isset($request['avatar'])) {
                _imgDelete($request['avatar']);
            }
           
            return _stsCheck('Kataloq  Redaktə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }


    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();
            Category::whereCategoryId($category->id)->update(['category_id'=>$category->category_id]);
            Product::whereCategoryId($category->id)->update(['category_id'=>$category->category_id]);
            _imgDelete($category->avatar);
            $category->delete();
            DB::commit();
            return _stsCheck('Kataloq Uğurla Silindi !');
        } catch (Exception $th) {
            DB::rollBack();
            return _stsCheck('Kataloq  Silinən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function status(Category $category){
        try {
            DB::beginTransaction();
            $this->change($category);
            DB::commit();

            return _stsCheck('Status Uğurla Dəyişdirildi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Status Dəyişdirilən Zaman Xəta Baş Verdi !', false);
        }
    }
}
