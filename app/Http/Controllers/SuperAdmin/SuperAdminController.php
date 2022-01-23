<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Order;
use App\Models\Package;
use App\Models\Pre_order_package;
use App\Models\Receiver;
use App\Models\Sender;
use App\Models\User;
use App\Models\User_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function home(){

        $receiver = Receiver::select('*')->count();
        $sender = Sender::select('*')->count();
        $admins = User::select('*')->where('role', 'admin')->count();
        $users = User::select('*')->where('role', 'user')->count();
        $package = Package::select('*')->count();
        $order = Order::select('*')->count();
        $pre_order_package = Pre_order_package::select('*')->where('status', 0)->count();

        $total_kg = Package::select('*')
            ->sum('total_kg_weight');

        $total_fee = Package::select('*')
            ->sum('courier_fee');

        $arrived = Package::select('*')
            ->where('is_pickup', '=', '1')
            ->count();

        $not_arrived = Package::select('*')
            ->where('is_pickup', '=', '0')
            ->count();

        return view('dashboard.superadmin.home')->with(
            [   'receivers'=> $receiver,
                'senders'=> $sender,
                'admins'=> $admins,
                'users'=> $users,
                'packages'=> $package,
                'orders'=> $order,
                'pre_order_package'=> $pre_order_package,
                'not_arriveds'=> $not_arrived,
                'total_kgs'=> $total_kg,
                'total_fees'=> $total_fee,
                'arriveds'=> $arrived,
            ]
        );
        // dd($confirmed);
    }

    public function setting(){
        $superadmin = Auth::user();
        $superadmin_address = User_address::where('user_id', $superadmin->id)->get();
        return view('dashboard.superadmin.setting')->with(
            [
                'superadmin'=> $superadmin,
                'superadmin_address'=> $superadmin_address
            ]
        );
        // dd($superadmin);
    }

    public function update_profile(Request $request, $id){
        $this-> validate($request,[
            'name' => 'required',
            'phone' => 'required|numeric',
        ]);
        // return $request->input();
        $superadmin = User::find($id);
        $superadmin->name=$request->name;
        $superadmin->phone=$request->phone;
        $superadmin->update();
        return redirect('/home') -> with('success', 'superadmin Profile Successfully Updated');
    }

    public function edit_address($id){

        $superadmin_address = User_address::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('dashboard.superadmin.edit_address')->with(
            [
                'superadmin_address'=>$superadmin_address,
                'countries'=>$countries,
            ]
        );
    }

    public function update_address(Request $request, $id){
        $this-> validate($request,[
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',
        ]);
        // return $request->input();
        $superadmin_address = User_address::find($id);
        $superadmin_address->address=$request->address;
        $superadmin_address->city_id=$request->city;
        $superadmin_address->state_id=$request->state;
        $superadmin_address->country_id=$request->country;
        $superadmin_address->zip=$request->zip;
        $superadmin_address->update();
        return redirect('/superadmin/setting') -> with('success', 'superadmin Address Successfully Updated');
    }
}
