<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use App\Models\Receiver;
use App\Models\Package;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Deliverystatus;
use App\Models\Receiver_address;
use DB;

class ReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        $receiver = Receiver::select('*')
            ->where('admin_id', '=', auth()->id())->get();

        return view('dashboard.admin.receiver/index')->with([ 'receivers'=> $receiver, 'countries'=> $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country=$request->input('country');
        $state=$request->input('state');
        $city=$request->input('city');
        $countryName = Country::where('id', $country)->value('country_name');
        $stateName = State::where('id', $state)->value('name');
        $cityName = City::where('id', $city)->value('name');

        $this-> validate($request,
            [
                'name' => 'required',
                'address' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'zip' => 'required',
                'phone' => 'required|numeric',
                // 'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
            ]
        );
        // return $request->input();
        $receiver = new Receiver;
        // $id=$receiver->id;
        // $receiver->name='SS'.(date('Ymd').$receiver->id);
        $receiver->name=$request->name;
        $receiver->phone=$request->phone;
        $receiver->admin_id=Auth()->id();
        $receiver->save();

        $receiver_address = new Receiver_address();
        $receiver_address->receiver_id=$receiver->id;
        $receiver_address->address=$request->address;
        $receiver_address->country_id=$request->country;
        $receiver_address->country_name=$countryName;
        $receiver_address->state_id=$request->state;
        $receiver_address->state_name=$stateName;
        $receiver_address->city_id=$request->city;
        $receiver_address->city_name=$cityName;
        $receiver_address->zip=$request->zip;
        $receiver_address->save();

        $id = $receiver->id;
        return redirect('/admin/receiver/show/'.$id)->with('success', 'Receiver Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receiver = Receiver::findOrFail($id);
        $receiver_address = Receiver_address::where('receiver_id', '=', $id)->get();
        $package = Package::where('admin_id', '=', auth()->id())
                            ->where('receiver_id', '=', $id)->get();
        if (auth()->id() != $receiver->admin_id) {
            return redirect('admin/receiver') -> with('error', 'You are not Owner of this Record');
        } else {
            return view('dashboard.admin.receiver.show',
                [
                    "receiver"=>$receiver,
                    "packages"=>$package,
                    "receiver_address"=>$receiver_address,
                ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        // $receiver = Receiver::findOrFail($id);
        $receiver = Receiver::where('admin_id', '=', auth()->id())->findOrFail($id);
        return view('dashboard.admin.receiver.edit', ['receiver'=>$receiver, 'countries'=>$countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this-> validate($request,
            [
                'name' => 'required',
                'phone' => 'required|numeric',
            ]
        );
        // return $request->input();
        $receiver = Receiver::find($id);
        $receiver->name=$request->name;
        $receiver->phone=$request->phone;
        $receiver->update();
        return redirect('/admin/receiver/show/'.$id)->with('success', 'Receiver Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receiver = Receiver::where('admin_id', '=', auth()->id())->findOrFail($id);
        if (auth()->id() != $receiver->admin_id) {
            return redirect('admin/receiver') -> with('error', 'You are not Owner of this Record');
        } else {
            $receiver->delete();
            return redirect('/admin/receiver') -> with('success', 'Receiver Successfully Deleted');
        }
    }
}
