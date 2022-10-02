<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\Slider\StoreSliderRequest;
use App\Http\Requests\Project\BackEnd\Slider\UpdateSliderRequest;
use App\Models\Slider;
use App\Traits\ControllerTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    use ControllerTraits;

    public function index()
    {
        $sliders = Slider::orderBy('position')->get();

        $sendData = [
            'sliders' => $sliders
        ];

        return view('control.slider.index', $sendData);
    }

    public function create()
    {
        return view('control.slider.create');
    }

    public function store(StoreSliderRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            $position = Slider::orderBy('position', 'DESC')->latest()->first();
            $request['position'] = is_null($position) ? 1 : $position->position + 1;
            $request['photo'] = _imgUpload($request['photo'], 'slider');
            Slider::create($request);
            DB::commit();

            return _stsCheck('Slider Uğurla Ələvə Olundu !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Slider Ələvə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }
    public function show(Slider $slider)
    {
        $sendData =  ['slider' => $slider];
        return view('control.slider.show', $sendData);
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['photo'])) {
                $request['photo'] = _imgUpload($request['photo'], 'slider');
                _imgDelete($slider->photo);
            } else {
                unset($request['photo']);
            }
            $slider->update($request);
            DB::commit();

            return _stsCheck('Slider Uğurla Redaktə Olundu !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Slider Redaktə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }

    public function destroy(Slider $slider)
    {
        try {
            DB::beginTransaction();
            _imgDelete($slider->photo);
            $slider->delete();
            DB::commit();
            return _stsCheck('Slider Uğurla Silindi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Slider Silinən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function status(Slider $slider)
    {
        try {
            DB::beginTransaction();
            $this->change($slider);
            DB::commit();

            return _stsCheck('Status Uğurla Dəyişdirildi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Status Dəyişdirilən Zaman Xəta Baş Verdi !', false);
        }
    }


    public function sortable(Request $request, Slider $slider)
    {
        try {
            if ($request->ajax()) {
                foreach ($request->positions as $position) {
                    list($id, $newPosition) = $position;
                    $slider->find((int) $id)->update(['position' => intval($newPosition)]);
                }
            }
            return response()->json(['operation' => true, 'msg' => 'Slider Uğurla Sıralandı !']);
        } catch (\Throwable $th) {
            return response()->json(['operation' => false, 'msg' => 'Slider Sıralanan Zaman Xəta Baş Verdi !']);
        }
    }

}
