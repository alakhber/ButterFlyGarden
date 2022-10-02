<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\Setting\UpdateSettingRequest;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting->with('seo')->first();
    }

    public function index()
    {
        $setting = $this->setting;
        $sendData = [
            'setting' => $setting,
        ];
        return view('control.setting.index', $sendData);
    }


    public function update(UpdateSettingRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['main_logo'])) {
                $request['main_logo'] = _imgUpload($request['main_logo'], 'site', 'logo');
            }
            if (isset($request['footer_logo'])) {
                $request['footer_logo'] = _imgUpload($request['footer_logo'], 'site', 'footer-logo');
            }
            $this->setting->update($request);
            $this->setting->assingSeo($request);
            DB::commit();

            return _stsCheck('Əlaqə Məlumatları Uğurla Yeniləndi !');
        } catch (Exception $th) {
            DB::rollback();
            return _stsCheck('Əlaqə Məlumatları Yenilənən Zaman Xəta Baş Verdi !', false);
        }
    }
}
