<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Pre_order;
use App\Models\Pre_order_package;
use App\Models\Role;
use App\Models\State;
use App\Models\User_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sender_id = Auth::user()->id;
        $role = Role::where('id', Auth::user()->role);
        $pre_order_package = Pre_order_package::select("*")->where('sender_id', $sender_id)->get();
        $pending_package = Pre_order_package::select("*")
            ->where('sender_id', $sender_id)
            ->where('status', '0')->get();
        $userAddress = User_address::where('user_id', Auth::user()->id)->first();
        $approved_package = Pre_order_package::select("*")
            ->where('sender_id', $sender_id)
            ->where('status', '1')->get();
        return view('home',
            [
                'role'=> $role,
                'pre_order_package'=> $pre_order_package,
                'pending_package' => $pending_package,
                'approved_package' => $approved_package,
                'userAddress' => $userAddress,
            ]
        );
    }
}
