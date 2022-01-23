<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Package;
use App\Models\Receiver;
use App\Models\Sender;
use App\Models\Admin;
use App\Models\Country;
use App\Models\User;
use App\Models\User_address;

class HomeController extends Controller
{
    public function home(){

        $receiver = Receiver::where('admin_id', '=', auth()->id())->get()->count();
        $sender = Sender::where('admin_id', '=', auth()->id())->get()->count();
        $package = Package::where('admin_id', '=', auth()->id())->get()->count();
        $order = Order::where('admin_id', '=', auth()->id())->get()->count();


        $total_kg = Package::select('*')
            ->where('admin_id', '=', auth()->id())
            ->sum('total_kg_weight');

        $total_fee = Package::select('*')
            ->where('admin_id', '=', auth()->id())
            ->sum('courier_fee');

        $arrived = Package::select('*')
            ->where('admin_id', '=', auth()->id())
            ->where('is_pickup', '=', '1')
            ->get()->count();

        $not_arrived = Package::select('*')
            ->where('admin_id', '=', auth()->id())
            ->where('is_pickup', '=', '0')
            ->count();

        return view('dashboard.admin.home')->with(
            [   'receivers'=> $receiver,
                'senders'=> $sender,
                'packages'=> $package,
                'orders'=> $order,
                'not_arriveds'=> $not_arrived,
                'total_kgs'=> $total_kg,
                'total_fees'=> $total_fee,
                'arriveds'=> $arrived,
            ]
        );
        // dd($confirmed);
    }
    public function profile(){

        $admin = Auth::user();
        return view('dashboard.admin.profile')->with(
            [
                'admins'=> $admin,
            ]
        );
        // dd($admin);
    }
    public function update_profile(Request $request, $id){
        $this-> validate($request,[
            'name' => 'required',
            'phone' => 'required|numeric',
        ]);
        // return $request->input();
        $admin = User::find($id);
        $admin->name=$request->name;
        $admin->phone=$request->phone;
        $admin->update();
        return redirect('/home') -> with('success', 'Admin Profile Successfully Updated');
    }

    public function edit_address($id){

        $admin_address = User_address::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('dashboard.admin.edit_address')->with(
            [
                'admin_address'=>$admin_address,
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
        $admin_address = User_address::find($id);
        $admin_address->address=$request->address;
        $admin_address->city_id=$request->city;
        $admin_address->state_id=$request->state;
        $admin_address->country_id=$request->country;
        $admin_address->zip=$request->zip;
        $admin_address->update();
        return redirect('/admin/setting') -> with('success', 'Admin Address Successfully Updated');
    }

    public function setting(){
        $admin = Auth::user();
        $admin_address = User_address::where('user_id', $admin->id)->get();
        return view('dashboard.admin.setting')->with(
            [
                'admin'=> $admin,
                'admin_address'=> $admin_address
            ]
        );
        // dd($admin);
    }

    public function change_password(Request $request, $id)
    {

        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'conform_password' => 'required|same:new_password',
        ]);

    $hashedPassword = Auth::user()->password;

    if (\Hash::check($request->current_password, $hashedPassword )) {

        if (!\Hash::check($request->new_password, $hashedPassword)) {
            $users =User::find(Auth::user()->id);
            $users->password = bcrypt($request->new_password);
            User::where( 'id', Auth::user()->id)->update( array( 'password' =>  $users->password));

            return redirect()->back()->with('success', 'password updated successfully!');
        }
        else{
                return redirect()->back()->with('error', 'new password can not be the old password!');
            }
    }
    else{
            return redirect()->back()->with('error', 'old password does not matched!');
        }
    }
}
