<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Receiver;
use App\Models\Receiver_address;
use App\Models\Sender;
use App\Models\Sender_address;
use App\Models\State;
use App\Models\User;
use App\Models\User_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class Sender_Receiver_AddressController extends Controller
{
    public function senderAddress($id){
	    $sender_address= DB::table('sender_addresses')
        ->select("id", DB::raw("CONCAT(' Address: ', address, ' | ', ' City: ', city_name, ' | ', ' State: ', state_name, ' | ', 'Country: ', Country_name, ' | ', ' Zip: ', zip) as sender_address"))
        ->where("sender_id", $id)
        ->pluck("sender_address", "id");
		return json_encode($sender_address);
	}

	public function receiverAddress($id){
		$receiver_address= DB::table('receiver_addresses')
        ->select("id", DB::raw("CONCAT(' Address: ', address, ' | ', ' City: ', city_name, ' | ', ' State: ', state_name, ' | ', 'Country: ', Country_name, ' | ', ' Zip: ', zip) as receiver_address"))
        ->where("receiver_id", $id)
        ->pluck("receiver_address", "id");
		return json_encode($receiver_address);
	}
    public function add_senderAddress($id){
        $sender = Sender::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('dashboard.superadmin.sender.add_address')->with(
            [
                'sender'=>$sender,
                'countries'=>$countries,
            ]
        );
	}

    public function store_senderAddress(Request $request, $id){

        $this-> validate($request,
            [
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zip' => 'required',
                // 'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
            ]
        );

        $country=$request->input('country');
        $state=$request->input('state');
        $city=$request->input('city');
        $countryName = Country::where('id', $country)->value('country_name');
        $stateName = State::where('id', $state)->value('name');
        $cityName = City::where('id', $city)->value('name');

        $sender_address = new Sender_address();
        $sender_address->sender_id=$id;
        $sender_address->address=$request->address;
        $sender_address->country_id=$request->country;
        $sender_address->country_name=$countryName;
        $sender_address->state_id=$request->state;
        $sender_address->state_name=$stateName;
        $sender_address->city_id=$request->city;
        $sender_address->city_name=$cityName;
        $sender_address->zip=$request->zip;
        $sender_address->save();

        return redirect('/superadmin/sender/show/'.$id)->with('success', 'Sender Successfully Created');
    }

    public function add_receiverAddress($id){
        $receiver = Receiver::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('dashboard.superadmin.receiver.add_address')->with(
            [
                'receiver'=>$receiver,
                'countries'=>$countries,
            ]
        );
	}

    public function store_receiverAddress(Request $request, $id){

        $this-> validate($request,
            [
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zip' => 'required',
                // 'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
            ]
        );

        $country=$request->input('country');
        $state=$request->input('state');
        $city=$request->input('city');
        $countryName = Country::where('id', $country)->value('country_name');
        $stateName = State::where('id', $state)->value('name');
        $cityName = City::where('id', $city)->value('name');

        $receiver_address = new Receiver_address();
        $receiver_address->receiver_id=$id;
        $receiver_address->address=$request->address;
        $receiver_address->country_id=$request->country;
        $receiver_address->country_name=$countryName;
        $receiver_address->state_id=$request->state;
        $receiver_address->state_name=$stateName;
        $receiver_address->city_id=$request->city;
        $receiver_address->city_name=$cityName;
        $receiver_address->zip=$request->zip;
        $receiver_address->save();

        return redirect('/superadmin/receiver/show/'.$id)->with('success', 'Sender Successfully Created');
    }

    public function edit_senderAddress($id){
        $sender_address = Sender_address::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('dashboard.superadmin.sender.edit_address')->with(
            [
                'sender_address'=>$sender_address,
                'countries'=>$countries,
            ]
        );
	}

    public function edit_receiverAddress($id){
        $receiver_address = Receiver_address::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('dashboard.superadmin.receiver.edit_address')->with(
            [
                'receiver_address'=>$receiver_address,
                'countries'=>$countries,
            ]
        );
	}

    public function update_senderAddress(Request $request, $id){

        $sender = Sender_address::where('id',$id)->value('sender_id');
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

        $sender_address = Sender_address::find($id);
        $sender_address->address=$request->address;
        $sender_address->country_id=$request->country;
        $sender_address->country_name=$countryName;
        $sender_address->state_id=$request->state;
        $sender_address->state_name=$stateName;
        $sender_address->city_id=$request->city;
        $sender_address->city_name=$cityName;
        $sender_address->zip=$request->zip;
        $sender_address->update();

       return redirect('/superadmin/sender/show/'.$sender)->with('success', 'Sender Address Successfully Updated');

    }

    public function update_receiverAddress(Request $request, $id){

        $receiver = Receiver_address::where('id',$id)->value('receiver_id');
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

        $receiver_address = Receiver_address::find($id);
        $receiver_address->address=$request->address;
        $receiver_address->country_id=$request->country;
        $receiver_address->country_name=$countryName;
        $receiver_address->state_id=$request->state;
        $receiver_address->state_name=$stateName;
        $receiver_address->city_id=$request->city;
        $receiver_address->city_name=$cityName;
        $receiver_address->zip=$request->zip;
        $receiver_address->update();

       return redirect('/superadmin/receiver/show/'.$receiver)->with('success', 'Sender Address Successfully Updated');

    }

    public function delete_sender_address($id){
        $sender_address = Sender_address::find($id);
        $sender_address->delete();

        return redirect()->back()->with('success', 'Sender Address Successfully Deleted');
    }

    public function delete_receiver_address($id){
        $receiver_address = Receiver_address::find($id);
        $receiver_address->delete();

        return redirect()->back()->with('success', 'Receiver Address Successfully Deleted');
    }

    // for admin
    public function admin_add_senderAddress($id){
        $sender = Sender::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('dashboard.admin.sender.add_address')->with(
            [
                'sender'=>$sender,
                'countries'=>$countries,
            ]
        );
	}

    public function admin_store_senderAddress(Request $request, $id){

        $this-> validate($request,
            [
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zip' => 'required',
                // 'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
            ]
        );

        $country=$request->input('country');
        $state=$request->input('state');
        $city=$request->input('city');
        $countryName = Country::where('id', $country)->value('country_name');
        $stateName = State::where('id', $state)->value('name');
        $cityName = City::where('id', $city)->value('name');

        $sender_address = new Sender_address();
        $sender_address->sender_id=$id;
        $sender_address->address=$request->address;
        $sender_address->country_id=$request->country;
        $sender_address->country_name=$countryName;
        $sender_address->state_id=$request->state;
        $sender_address->state_name=$stateName;
        $sender_address->city_id=$request->city;
        $sender_address->city_name=$cityName;
        $sender_address->zip=$request->zip;
        $sender_address->save();

        return redirect('/admin/sender/show/'.$id)->with('success', 'Sender Successfully Created');
    }

    public function admin_add_receiverAddress($id){
        $receiver = Receiver::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('dashboard.admin.receiver.add_address')->with(
            [
                'receiver'=>$receiver,
                'countries'=>$countries,
            ]
        );
	}

    public function admin_store_receiverAddress(Request $request, $id){

        $this-> validate($request,
            [
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zip' => 'required',
                // 'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
            ]
        );

        $country=$request->input('country');
        $state=$request->input('state');
        $city=$request->input('city');
        $countryName = Country::where('id', $country)->value('country_name');
        $stateName = State::where('id', $state)->value('name');
        $cityName = City::where('id', $city)->value('name');

        $receiver_address = new Receiver_address();
        $receiver_address->receiver_id=$id;
        $receiver_address->address=$request->address;
        $receiver_address->country_id=$request->country;
        $receiver_address->country_name=$countryName;
        $receiver_address->state_id=$request->state;
        $receiver_address->state_name=$stateName;
        $receiver_address->city_id=$request->city;
        $receiver_address->city_name=$cityName;
        $receiver_address->zip=$request->zip;
        $receiver_address->save();

        return redirect('/admin/receiver/show/'.$id)->with('success', 'Sender Successfully Created');
    }

    public function admin_edit_senderAddress($id){
        $sender_address = Sender_address::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('dashboard.admin.sender.edit_address')->with(
            [
                'sender_address'=>$sender_address,
                'countries'=>$countries,
            ]
        );
	}

    public function admin_edit_receiverAddress($id){
        $receiver_address = Receiver_address::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('dashboard.admin.receiver.edit_address')->with(
            [
                'receiver_address'=>$receiver_address,
                'countries'=>$countries,
            ]
        );
	}

    public function admin_update_senderAddress(Request $request, $id){

        $sender = Sender_address::where('id',$id)->value('sender_id');
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

        $sender_address = Sender_address::find($id);
        $sender_address->address=$request->address;
        $sender_address->country_id=$request->country;
        $sender_address->country_name=$countryName;
        $sender_address->state_id=$request->state;
        $sender_address->state_name=$stateName;
        $sender_address->city_id=$request->city;
        $sender_address->city_name=$cityName;
        $sender_address->zip=$request->zip;
        $sender_address->update();

       return redirect('/admin/sender/show/'.$sender)->with('success', 'Sender Address Successfully Updated');

    }

    public function admin_update_receiverAddress(Request $request, $id){

        $receiver = Receiver_address::where('id',$id)->value('receiver_id');
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

        $receiver_address = Receiver_address::find($id);
        $receiver_address->address=$request->address;
        $receiver_address->country_id=$request->country;
        $receiver_address->country_name=$countryName;
        $receiver_address->state_id=$request->state;
        $receiver_address->state_name=$stateName;
        $receiver_address->city_id=$request->city;
        $receiver_address->city_name=$cityName;
        $receiver_address->zip=$request->zip;
        $receiver_address->update();

       return redirect('/admin/receiver/show/'.$receiver)->with('success', 'Sender Address Successfully Updated');

    }

    public function admin_delete_sender_address($id){
        $sender_address = Sender_address::find($id);
        $sender_address->delete();

        return redirect()->back()->with('success', 'Sender Address Successfully Deleted');
    }

    public function admin_delete_receiver_address($id){
        $receiver_address = Receiver_address::find($id);
        $receiver_address->delete();

        return redirect()->back()->with('success', 'Receiver Address Successfully Deleted');
    }

    // for Reg User
    public function user_add_senderAddress($id){
        $sender = User::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('sender.add_address')->with(
            [
                'sender'=>$sender,
                'countries'=>$countries,
            ]
        );
	}

    public function user_store_senderAddress(Request $request, $id){

        $this-> validate($request,
            [
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zip' => 'required',
                // 'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
            ]
        );

        $country=$request->input('country');
        $state=$request->input('state');
        $city=$request->input('city');

        $sender_address = new User_address();
        $sender_address->user_id=$id;
        $sender_address->address=$request->address;
        $sender_address->country_id=$request->country;
        $sender_address->state_id=$request->state;
        $sender_address->city_id=$request->city;
        $sender_address->zip=$request->zip;
        $sender_address->save();

        return redirect('/sender/show/'.$id)->with('success', 'Sender Successfully Created');
    }

    public function user_add_receiverAddress($id){
        $receiver = Receiver::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('receiver.add_address')->with(
            [
                'receiver'=>$receiver,
                'countries'=>$countries,
            ]
        );
	}

    public function user_store_receiverAddress(Request $request, $id){

        $this-> validate($request,
            [
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zip' => 'required',
                // 'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
            ]
        );

        $country=$request->input('country');
        $state=$request->input('state');
        $city=$request->input('city');
        $countryName = Country::where('id', $country)->value('country_name');
        $stateName = State::where('id', $state)->value('name');
        $cityName = City::where('id', $city)->value('name');

        $receiver_address = new Receiver_address();
        $receiver_address->receiver_id=$id;
        $receiver_address->address=$request->address;
        $receiver_address->country_id=$request->country;
        $receiver_address->country_name=$countryName;
        $receiver_address->state_id=$request->state;
        $receiver_address->state_name=$stateName;
        $receiver_address->city_id=$request->city;
        $receiver_address->city_name=$cityName;
        $receiver_address->zip=$request->zip;
        $receiver_address->save();

        return redirect('/receiver/show/'.$id)->with('success', 'Sender Successfully Created');
    }

    public function user_edit_senderAddress($id){
        $sender_address = User_address::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('sender.edit_address')->with(
            [
                'sender_address'=>$sender_address,
                'countries'=>$countries,
            ]
        );
	}

    public function user_edit_receiverAddress($id){
        $receiver_address = Receiver_address::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('receiver.edit_address')->with(
            [
                'receiver_address'=>$receiver_address,
                'countries'=>$countries,
            ]
        );
	}

    public function user_update_senderAddress(Request $request, $id){

        $sender = User_address::where('id',$id)->value('user_id');
        $country=$request->input('country');
        $state=$request->input('state');
        $city=$request->input('city');

        $this-> validate($request,
            [
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zip' => 'required',
            ]
        );

        $sender_address = User_address::find($id);
        $sender_address->address=$request->address;
        $sender_address->country_id=$request->country;
        $sender_address->state_id=$request->state;
        $sender_address->city_id=$request->city;
        $sender_address->zip=$request->zip;
        $sender_address->update();

       return redirect('/user/edit/'.$id)->with('success', 'Address Successfully Updated');

    }

    public function user_update_receiverAddress(Request $request, $id){

        $receiver = Receiver_address::where('id',$id)->value('receiver_id');
        $country = $request->input('country');
        $state = $request->input('state');
        $city = $request->input('city');
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

        $receiver_address = Receiver_address::find($id);
        $receiver_address->address=$request->address;
        $receiver_address->country_id=$request->country;
        $receiver_address->country_name=$countryName;
        $receiver_address->state_id=$request->state;
        $receiver_address->state_name=$stateName;
        $receiver_address->city_id=$request->city;
        $receiver_address->city_name=$cityName;
        $receiver_address->zip=$request->zip;
        $receiver_address->update();

       return redirect('/receiver/show/'.$receiver)->with('success', 'Sender Address Successfully Updated');

    }

    public function user_delete_sender_address($id){
        $sender_address = User_address::find($id);
        $sender_address->delete();

        return redirect()->back()->with('success', 'Sender Address Successfully Deleted');
    }

    public function user_delete_receiver_address($id){
        $receiver_address = Receiver_address::find($id);
        $receiver_address->delete();

        return redirect()->back()->with('success', 'Receiver Address Successfully Deleted');
    }
}
