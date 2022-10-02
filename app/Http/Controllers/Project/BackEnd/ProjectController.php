<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\Product\UploadImagesRequest;
use App\Http\Requests\Project\BackEnd\Project\StoreProjectRequest;
use App\Http\Requests\Project\BackEnd\Project\UpdateProjectRequest;
use App\Models\GalleryItem;
use App\Models\Project;
use App\Traits\ControllerTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    use ControllerTraits;
    public function index()
    {
        $projects = Project::all();

        $sendData = [
            'projects' => $projects,
        ];

        return view('control.project.index', $sendData);
    }


    public function create()
    {
        return view('control.project.create');
    }


    public function store(StoreProjectRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['avatar'])) {
                $request['avatar'] = _imgUpload($request['avatar'], 'project');
            }

            $project = Project::create($request);
            $project->assingSeo($request);
            $project->assingGallery($request);
            DB::commit();

            return _stsCheck('Lahiyə Uğurla Əlavə Olundu!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Lahiyə Əlavə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }


    public function show(Project $project)
    {
        $sendData = [
            'project' => $project->load('seo'),
        ];
        return view('control.project.show', $sendData);
    }



    public function update(UpdateProjectRequest $request, Project $project)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['avatar'])) {
                $request['avatar'] = _imgUpload($request['avatar'], 'product');
                _imgDelete($project->avatar);
            } else {
                unset($request['avatar']);
            }
            $project->update($request);
            $project->assingSeo($request);
            DB::commit();

            return _stsCheck('Lahiyə Uğurla Redaktə Olundu !');
        } catch (\Throwable $th) {
            return _stsCheck('Lahiyə  Redaktə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }


    public function destroy(Project $project)
    {
        try {
            DB::beginTransaction();
            $project->seo()->delete();
            $project->gallery()->delete();
            $project->delete();
            DB::commit();
            return _stsCheck('Lahiyə Uğurla Silindi !');
        } catch (\Throwable $th) {
            return _stsCheck('Lahiyə  Silinən Zaman Xəta Baş Verdi !', false);
        }
    }



    public function gallery(Project $project)
    {
        $project = Project::with(['gallery' => function ($q) {
            $q->orderBy('position');
        }])->find($project->id);

        $sendData = [
            'project' => $project,
        ];

        return view('control.project.gallery', $sendData);
    }

    public function uploads(UploadImagesRequest $request, Project $project)
    {
        try {
            DB::beginTransaction();
            $project->assingGallery($request);
            DB::commit();
            return _stsCheck('Şəkillər Uğurla Yükləndi !');
        } catch (\Throwable $th) {
            return _stsCheck('Şəkillər Yüklənən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function deleteImage(Project $project, GalleryItem $image)
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

    public function status(Project $project)
    {
        try {
            DB::beginTransaction();
            $this->change($project);
            DB::commit();

            return _stsCheck('Status Uğurla Dəyişdirildi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Status Dəyişdirilən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function sortable(Request $request, Project $project)
    {
        try {
            if ($request->ajax()) {
                foreach ($request->positions as $position) {
                    list($id, $newPosition) = $position;
                    $project->gallery()->find((int) $id)->update(['position' => intval($newPosition)]);
                }
            }
            return response()->json(['operation' => true, 'msg' => 'Şəkillər Uğurla Sıralandı !']);
        } catch (\Throwable $th) {
            return response()->json(['operation' => false, 'msg' => 'Şəkillər Sıralanan Zaman Xəta Baş Verdi !']);
        }
    }
}
