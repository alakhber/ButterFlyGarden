<?php

namespace App\Http\Controllers\Project\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main(){
        return view('control.main');
    }
}
