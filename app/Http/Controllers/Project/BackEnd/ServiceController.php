<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\Product\UploadImagesRequest;
use App\Http\Requests\Project\BackEnd\Service\StoreServiceRequest;
use App\Http\Requests\Project\BackEnd\Service\UpdateServiceRequest;
use App\Models\GalleryItem;
use App\Models\Service;
use App\Traits\ControllerTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    use ControllerTraits;
    public function index()
    {
        $services = Service::all();

        $sendData = [
            'services' => $services,
        ];

        return view('control.service.index', $sendData);
    }


    public function create()
    {
        return view('control.service.create');
    }


    public function store(StoreServiceRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['avatar'])) {
                $request['avatar'] = _imgUpload($request['avatar'], 'service');
            }
            $positon = Service::latest()->first();
            $request['positon'] = is_null($positon) ? 1 : $positon->position+1;
            $service = Service::create($request);
            $service->assingSeo($request);
            $service->assingGallery($request);
            DB::commit();

            return _stsCheck('Xidmət Uğurla Əlavə Olundu!');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            return _stsCheck('Xidmət Əlavə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }


    public function show(Service $service)
    {
        $sendData = [
            'service' => $service->load('seo'),
        ];
        return view('control.service.show', $sendData);
    }



    public function update(UpdateServiceRequest $request, Service $service)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['avatar'])) {
                $request['avatar'] = _imgUpload($request['avatar'], 'product');
                _imgDelete($service->avatar);
            } else {
                unset($request['avatar']);
            }
            $service->update($request);
            $service->assingSeo($request);
            DB::commit();

            return _stsCheck('Xidmət Uğurla Redaktə Olundu !');
        } catch (\Throwable $th) {
            return _stsCheck('Xidmət  Redaktə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }


    public function destroy(Service $service)
    {
        try {
            DB::beginTransaction();
            $service->seo()->delete();
            $service->gallery()->delete();
            $service->delete();
            DB::commit();
            return _stsCheck('Xidmət Uğurla Silindi !');
        } catch (\Throwable $th) {
            return _stsCheck('Xidmət  Silinən Zaman Xəta Baş Verdi !', false);
        }
    }



    public function gallery(Service $service)
    {
        $service = Service::with(['gallery' => function ($q) {
            $q->orderBy('position');
        }])->find($service->id);

        $sendData = [
            'service' => $service,
        ];

        return view('control.service.gallery', $sendData);
    }

    public function uploads(UploadImagesRequest $request, Service $service)
    {
        try {
            DB::beginTransaction();
            $service->assingGallery($request);
            DB::commit();
            return _stsCheck('Şəkillər Uğurla Yükləndi !');
        } catch (\Throwable $th) {
            return _stsCheck('Şəkillər Yüklənən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function deleteImage(Service $service, GalleryItem $image)
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

    public function status(Service $service)
    {
        try {
            DB::beginTransaction();
            $this->change($service);
            DB::commit();

            return _stsCheck('Status Uğurla Dəyişdirildi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Status Dəyişdirilən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function sortable(Request $request, Service $service)
    {
        try {
            if ($request->ajax()) {
                foreach ($request->positions as $position) {
                    list($id, $newPosition) = $position;
                    $service->gallery()->find((int) $id)->update(['position' => intval($newPosition)]);
                }
            }
            return response()->json(['operation' => true, 'msg' => 'Şəkillər Uğurla Sıralandı !']);
        } catch (\Throwable $th) {
            return response()->json(['operation' => false, 'msg' => 'Şəkillər Sıralanan Zaman Xəta Baş Verdi !']);
        }
    }
}
