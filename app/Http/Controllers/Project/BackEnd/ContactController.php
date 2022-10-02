<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\BackEnd\Contact\UpdateContactRequest;
use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function contact()
    {
        $contact = Contact::with('seo')->find(1);
        $sendData = ['contact' => $contact];
        return view('control.contact.index', $sendData);
    }

    public function contactUpdate(UpdateContactRequest $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->validated();
            $contact = Contact::first();
            $contact->update($request);
            $contact->assingSeo($request);
            DB::commit();

            return _stsCheck('Əlaqə Məlumatları Uğurla Yeniləndi !');
        } catch (Exception $th) {
            DB::rollback();

            return _stsCheck('Əlaqə Məlumatları Yenilənən Zaman Xəta Baş Verdi !', false);
        }
    }
}
