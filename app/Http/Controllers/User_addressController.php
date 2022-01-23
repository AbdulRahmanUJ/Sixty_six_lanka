<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class User_addressController extends Controller
{
    public function userAddress($id){
	    $sender_address= DB::table('user_addresses')
        ->select("id", DB::raw("CONCAT(' Address: ', address, ' | ', ' City: ', city_name, ' | ', ' State: ', state_name, ' | ', 'Country: ', Country_name, ' | ', ' Zip: ', zip) as user_address"))
        ->where("user_id", $id)
        ->pluck("user_address", "id");
		return json_encode($sender_address);
	}

    public function edit_userAddress($id){
        $user_address = User_address::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('dashboard.superadmin.user.edit_address')->with(
            [
                'user_address'=>$user_address,
                'countries'=>$countries,
            ]
        );
	}

    public function update_userAddress(Request $request, $id){

        $user = User_address::where('id',$id)->value('user_id');
        $country=$request->input('country');
        $state=$request->input('state');
        $city=$request->input('city');
        $countryName = Country::where('id', $country)->value('country_name');
        $stateName = State::where('id', $state)->value('name');
        $cityName = City::where('id', $city)->value('name');

        $this-> validate($request,
            [
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zip' => 'required',
            ]
        );

        $user_address = User_address::find($id);
        $user_address->address=$request->address;
        $user_address->country_id=$request->country;
        $user_address->country_name=$countryName;
        $user_address->state_id=$request->state;
        $user_address->state_name=$stateName;
        $user_address->city_id=$request->city;
        $user_address->city_name=$cityName;
        $user_address->zip=$request->zip;
        $user_address->update();

       return redirect('/superadmin/user/show/'.$user)->with('success', 'user Address Successfully Updated');

    }

    public function delete_user_address($id){
        $user_address = User_address::find($id);
        $user_address->delete();

        return redirect()->back()->with('success', 'user Address Successfully Deleted');
    }
}
