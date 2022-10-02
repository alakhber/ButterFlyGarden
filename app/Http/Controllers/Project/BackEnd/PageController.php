<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\Page\StorePageRequest;
use App\Http\Requests\Project\BackEnd\Page\UpdatePageRequest;
use App\Models\Page;
use App\Traits\ControllerTraits;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    use ControllerTraits;
    public function index()
    {
        $pages = Page::all();

        $sendData = [
            'pages' => $pages,
        ];

        return view('control.pages.index', $sendData);
    }

   
    public function create()
    {
        return view('control.pages.create');
    }

   
    public function store(StorePageRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            $product = Page::create($request);
            $product->assingSeo($request);
            DB::commit();

            return _stsCheck('Səhifə Uğurla Əlavə Olundu !');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return _stsCheck('Səhifə Əlavə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }

   
    public function show(Page $page)
    {
        $page = $page->load('seo');

        $sendData = [
            'page' => $page,
        ];
        return view('control.pages.show',$sendData);
    }

    
    public function update(UpdatePageRequest $request, Page $page)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            $page->update($request);
            $page->assingSeo($request);
            DB::commit();

            return _stsCheck('Səhifə Uğurla Redaktə Olundu !');
        } catch (\Throwable $th) {
            DB::rollback();

            return _stsCheck('Səhifə Redaktə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }

    
    public function destroy(Page $page)
    {
        try {
            DB::beginTransaction();
            $page->seo()->delete();
            $page->delete();
            DB::commit();
            return _stsCheck('Səhifə Uğurla Silindi !');
        } catch (\Throwable $th) {
            DB::rollback();
            return _stsCheck('Səhifə  Silinən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function status(Page $page)
    {
        try {
            DB::beginTransaction();
            $this->change($page);
            DB::commit();

            return _stsCheck('Status Uğurla Dəyişdirildi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Status Dəyişdirilən Zaman Xəta Baş Verdi !', false);
        }
    }
}
