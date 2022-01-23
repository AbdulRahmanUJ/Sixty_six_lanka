<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Receiver;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
    public function index(){
        $package= Package::all()->count();
        $receiver= Receiver::all()->count();

        // dd('hello');
        return view('welcome')->with(['receivers'=> $receiver, 'packages'=> $package]);
    }

    public function tracking(){
        return view('tracking');
    }
}
