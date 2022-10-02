<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\About\AboutUpdateRequest;
use App\Models\About;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function about()
    {
        $about = About::with('seo')->find(1);
        $sendData = ['about' => $about];
        return view('control.about.index', $sendData);
    }

    public function aboutUpdate(AboutUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            $contact = About::first();
            $contact->update($request);
            $contact->assingSeo($request);
            DB::commit();

            return _stsCheck('Haqqımızda Məlumatları Uğurla Yeniləndi !');
        } catch (Exception $th) {
            DB::rollback();
            return _stsCheck('Haqqımızda Məlumatları Yenilənən Zaman Xəta Baş Verdi !', false);
        }
    }
}
