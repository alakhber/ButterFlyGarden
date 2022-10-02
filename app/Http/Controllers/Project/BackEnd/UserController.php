<?php

namespace App\Http\Controllers\Project\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\User\ProfilUpdateRequest;
use App\Http\Requests\Project\BackEnd\User\UserStoreRequest;
use App\Http\Requests\Project\BackEnd\User\UserUpdateRequest;
use App\Models\User;
use App\Traits\ControllerTraits;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ControllerTraits;

    public function profil(){
        $user = auth()->user();
        $sendData  = [
            'user'=>$user
        ];
        return view('control.user.profil',$sendData);
    }
    public function updateProfil(ProfilUpdateRequest $request,User $user){
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['password'])) {
                $request['password'] = Hash::make($request['password']);
            } else {
                unset($request['password']);
            }
            if (isset($request['avatar'])) {
                $request['avatar'] = _imgUpload($request['avatar'], 'user');
                _imgDelete($user->avatar);
            }
            $user->update($request);
            DB::commit();
            return _stsCheck('Profil Uğurla Redaktə Olundu !');
        } catch (Exception $th) {
            DB::rollBack();
            _imgDelete($request['avatar']);
            return _stsCheck('Profil Redaktə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }

    public function index()
    {
        $users = User::all();
        
        $sendData = ['users' => $users];
        return view('control.user.index', $sendData);
    }

    public function create()
    {
        return view('control.user.create');
    }

    public function store(UserStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            $request['avatar'] = _imgUpload($request['avatar'], 'user');
            User::create($request);
            DB::commit();
            return _stsCheck('İstifadəçi Uğurla Əlavə Olundu !');
        } catch (Exception $th) {
            DB::rollBack();
            _imgDelete($request['avatar']);
            return _stsCheck('Istifadəçi Uğurla Əlavə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }

    public function show(User $user)
    {
        $sendData = ['user' => $user];
        return view('control.user.edit', $sendData);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            if (isset($request['password'])) {
                $request['password'] = Hash::make($request['password']);
            } else {
                unset($request['password']);
            }
            if (isset($request['avatar'])) {
                $request['avatar'] = _imgUpload($request['avatar'], 'user');
                _imgDelete($user->avatar);
            }
            $user->update($request);
            DB::commit();
            return _stsCheck('İstifadəçi Uğurla Redaktə Olundu !');
        } catch (Exception $th) {
            DB::rollBack();
            _imgDelete($request['avatar']);
            return _stsCheck('Istifadəçi Redaktə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }

    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();
            _imgDelete($user->avatar);
            $user->delete();
            DB::commit();
            return _stsCheck('İstifadəçi Uğurla Silindi!');
        } catch (Exception $th) {
            DB::rollBack();
            return _stsCheck('Istifadəçi Silinən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function status(User $user)
    {
        try {
            DB::beginTransaction();
            $this->change($user);
            DB::commit();

            return _stsCheck('Status Uğurla Dəyişdirildi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Status Dəyişdirilən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function type(Request $request, User $user){
        try {
            $request = $request->all();
            DB::beginTransaction();
            $this->change($user,__FUNCTION__,$request[__FUNCTION__]);
            DB::commit();

            return _stsCheck('İstifadəçi Vəzifəsi Uğurla Dəyişdirildi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('İstifadəçi Vəzifəsi Dəyişdirilən Zaman Xəta Baş Verdi !', false);
        }
    }
}
