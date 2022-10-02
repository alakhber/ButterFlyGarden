<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\Partner\StorePartnerRequest;
use App\Http\Requests\Project\BackEnd\Partner\UpdatePartnerRequest;
use App\Models\Partner;
use App\Traits\ControllerTraits;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    use ControllerTraits;
    public function index()
    {
        $partners = Partner::all();

        $sendData = [
            'partners'=>$partners
        ];

        return view('control.partner.index', $sendData);
    }

    
    public function create()
    {
        return view('control.partner.create');
    }

    
    public function store(StorePartnerRequest $request)
    {
        try {
            DB::beginTransaction();

            $request = $request->validated();
            $request['avatar'] = _imgUpload($request['avatar'], 'partner');
            $request['position'] = Partner::orderBy('position','DESC')->first()->position+1;
            Partner::create($request);
            
            DB::commit();

            return _stsCheck('Partner Uğurla Əlavə Olundu !');
        } catch (\Throwable $th) {
            return _stsCheck('Partner Əlavə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }

    
    public function show(Partner $partner)
    {
        $sendData = [
            'partner'=>$partner
        ];
        return view('control.partner.show', $sendData);
    }

   
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['avatar'])) {
                $request['avatar'] = _imgUpload($request['avatar'], 'partner');
                _imgDelete($partner->avatar);
            } else {
                unset($request['avatar']);
            }
            $partner->update($request);
           
            DB::commit();

            return _stsCheck('Partner Uğurla Redaktə Olundu !');
        } catch (\Throwable $th) {
            return _stsCheck('Partner Redaktə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }

    
    public function destroy(Partner $partner)
    {
        try {
            DB::beginTransaction();
            $partner->delete();
            DB::commit();

            return _stsCheck('Partner Uğurla Silindi !');
        } catch (\Throwable $th) {
            return _stsCheck('Partner  Silinən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function status(Partner $partner)
    {
        try {
            DB::beginTransaction();
            $this->change($partner);
            DB::commit();
            return _stsCheck('Status Uğurla Dəyişdirildi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Status Dəyişdirilən Zaman Xəta Baş Verdi !', false);
        }
    }
}
