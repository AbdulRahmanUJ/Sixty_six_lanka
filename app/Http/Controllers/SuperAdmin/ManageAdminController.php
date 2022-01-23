<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use App\Models\User_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageAdminController extends Controller
{
    public function create_admin()
    {
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('dashboard.superadmin.manage_admin.create', ['countries'=>$countries]);

    }

    public function list_admin()
    {
        $admins= User::all()->where('role', 'admin');
        return view('dashboard.superadmin.manage_admin.index', ['admins'=>$admins]);

    }

    public function store_admin(Request $request)
    {
        if ($request->is_active=='on') {
            $is_active=1;
        } else {
            $is_active=0;
        }

        $this-> validate($request,
            [
                'name' => 'required',
                'street' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'post_code' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
                'phone' => 'required|numeric',
            ]
        );
        // return $request->input();
        $admin = new User();
        $admin->name=$request->name;
        $admin->phone=$request->phone;
        $admin->role='admin';
        $admin->status=$is_active;
        $admin->email=$request->email;
        $admin->password=Hash::make($request->password);
        $admin->save();

        $adminaddress = new User_address();
        $adminaddress->user_id = $admin->id;
        $adminaddress->address=$request->street;
        $adminaddress->country_id=$request->country;
        $adminaddress->state_id=$request->state;
        $adminaddress->city_id=$request->city;
        $adminaddress->zip=$request->post_code;
        $adminaddress->save();

        return redirect('/superadmin')->with('success', 'Admin Successfully Created');
    }

    public function show($id)
    {
        $user = User::findorFail($id);
        $userAddress = User_address::where('user_id', $user->id)->first();
        $userAddresses = User_address::where('user_id', $user->id)->get();

        return view('dashboard.superadmin.manage_admin.admin_show',
            [
                'user' => $user,
                'userAddress' => $userAddress,
                'userAddresses' => $userAddresses,
            ]
        );

    }

    public function change_status(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->update();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
