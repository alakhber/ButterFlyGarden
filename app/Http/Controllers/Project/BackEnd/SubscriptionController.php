<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\StoreSubscriptionRequest;
use App\Http\Requests\Project\BackEnd\UpdateSubscriptionRequest;
use App\Models\Subscription;
use App\Traits\ControllerTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{

    use ControllerTraits;
    public function index()
    {
        $subscriptions = Subscription::all();

        $sendData = [
            'subscriptions' => $subscriptions
        ];

        return view('control.subscription.index', $sendData);
    }


    public function create()
    {
        return view('control.subscription.create');
    }


    public function store(StoreSubscriptionRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            Subscription::create($request);
            DB::commit();

            return _stsCheck('İzləyici Uğurla Əlavə Olundu !');
        } catch (\Throwable $th) {
            return _stsCheck('İzləyici Əlavə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }


    public function show(Subscription $subscription)
    {
        $sendData = [
            'subscription' => $subscription
        ];
        return view('control.subscription.show', $sendData);
    }


    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            $subscription->update($request);

            DB::commit();

            return _stsCheck('İzləyici Uğurla Redaktə Olundu !');
        } catch (\Throwable $th) {
            return _stsCheck('İzləyici Redaktə Olunan Zaman Xəta Baş Verdi !', false);
        }
    }


    public function destroy(Subscription $subscription)
    {
        try {
            DB::beginTransaction();
            $subscription->delete();
            DB::commit();

            return _stsCheck('İzləyici Uğurla Silindi !');
        } catch (\Throwable $th) {
            return _stsCheck('İzləyici Silinən Zaman Xəta Baş Verdi !', false);
        }
    }

    public function status(Subscription $subscription)
    {
        try {
            DB::beginTransaction();
            $this->change($subscription);
            DB::commit();
            return _stsCheck('Status Uğurla Dəyişdirildi !');
        } catch (\Throwable $th) {
            DB::rollBack();
            return _stsCheck('Status Dəyişdirilən Zaman Xəta Baş Verdi !', false);
        }
    }
}
