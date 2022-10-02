<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\Personal\PersonalStoreRequest as PersonalPersonalStoreRequest;
use App\Http\Requests\Project\BackEnd\Personal\PersonalUpdateRequest;
use App\Models\Personal;
use App\Traits\ControllerTraits;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    use ControllerTraits;
    public function index()
    {
        $personals = Personal::all();

        $sendData = [
            'personals' => $personals,
        ];

        return view('control.personal.index', $sendData);
    }

   
    public function create()
    {
        return view('control.personal.create');
    }

   
    public function store(PersonalPersonalStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            $request['image'] = _imgUpload($request['image'], 'personal');
            Personal::create($request);
            DB::commit();

            return _stsCheck('Üzv  Uğurla Əlavə Olundu !');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            return _stsCheck('Üzv  Əlavə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }

   
    public function show(Personal $personal)
    {
        $sendData = [
            'personal' => $personal,
        ];
        return view('control.personal.show',$sendData);
    }

    
    public function update(PersonalUpdateRequest $request, Personal $personal)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['image'])) {
                $request['image'] = _imgUpload($request['image'], 'personal');
            }
            $personal->update($request);
            DB::commit();

            return _stsCheck('Üzv  Uğurla Redaktə Olundu !');
        } catch (\Throwable $th) {
            DB::rollback();
            return _stsCheck('Üzv  Redaktə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }

    
    public function destroy(Personal $personal)
    {
        try {
            DB::beginTransaction();
            _imgDelete($personal->avatar);
            $personal->delete();
            DB::commit();
            return _stsCheck('Üzv  Uğurla Silindi !');
        } catch (\Throwable $th) {
            DB::rollback();
            return _stsCheck('Üzv   Silinən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function status(Personal $personal)
    {
        try {
            DB::beginTransaction();
            $this->change($personal);
            DB::commit();

            return _stsCheck('Status Uğurla Dəyişdirildi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Status Dəyişdirilən Zaman Xəta Baş Verdi !', false);
        }
    }
}
