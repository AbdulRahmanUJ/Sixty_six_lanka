<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Sender;
use App\Models\Package;
use App\Models\Deliverystatus;
use App\Models\Packagetype;
use App\Models\Paymentmethod;
use App\Models\Packingtype;
use App\Models\Shippingmode;
use App\Models\Order;
use App\Models\Sender_address;
use App\Models\State;
use Illuminate\Support\Facades\DB;

class SenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');

        $sender = Sender::select('*')
            ->where('admin_id', '=', auth()->id())->get();

        return view('dashboard.admin.sender.index')->with(
            [
                'senders'=> $sender,
                'countries'=> $countries,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        // dd($countryName);

        $this-> validate($request,
            [
                'name' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zip' => 'required',
                'phone' => 'required|numeric',
                // 'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
            ]
        );
        // return $request->input();
        $sender = new Sender;
        // $id=$sender->id;
        // $sender->name='SS'.(date('Ymd').$sender->id);
        $sender->name=$request->name;
        $sender->phone=$request->phone;
        $sender->admin_id=Auth()->id();
        $sender->save();

        $sender_address = new Sender_address();
        $sender_address->sender_id=$sender->id;
        $sender_address->address=$request->address;
        $sender_address->country_id=$request->country;
        $sender_address->country_name=$countryName;
        $sender_address->state_id=$request->state;
        $sender_address->state_name=$stateName;
        $sender_address->city_id=$request->city;
        $sender_address->city_name=$cityName;
        $sender_address->zip=$request->zip;
        $sender_address->save();

        $id = $sender->id;
        return redirect('/admin/sender/show/'.$id)->with('success', 'Sender Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sender = Sender::findOrFail($id);
        $sender_address = Sender_address::where('sender_id', '=', $id)->get();
        $package = Package::select('*')
                            ->where('admin_id', '=', auth()->id())
                            ->where('sender_id', '=', $id)
                            ->get();

        $deliverystatus = Deliverystatus::all();
        $packagetype = Packagetype::all();
        $packingtype = Packingtype::all();
        $paymentmethod = Paymentmethod::all();
        $shippingmode = Shippingmode::all();

        if (auth()->id() != $sender->admin_id) {
            return redirect('admin/sender')->with('error', 'You are not Owner of this Record');
        } else {
            return view('dashboard.admin.sender.show',
                [
                    "sender"=>$sender,
                    "packages"=>$package,
                    "deliverystatus"=>$deliverystatus,
                    "packingtype"=>$packingtype,
                    "packagetype"=>$packagetype,
                    "paymentmethod"=>$paymentmethod,
                    "shippingmode"=>$shippingmode,
                    "sender_address"=>$sender_address,
                ]
            );
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
        // $sender = sender::findOrFail($id);
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        $sender = Sender::where('admin_id', '=', auth()->id())->findOrFail($id);
        return view('dashboard.admin.sender.edit')->with(['sender'=>$sender, 'countries'=>$countries]);
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
        $sender = Sender::find($id);
        $sender->name=$request->name;
        $sender->phone=$request->phone;
        $sender->update();
        return redirect('/admin/sender/show/'.$id)->with('success', 'Sender Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sender = Sender::where('admin_id', '=', auth()->id())->findOrFail($id);
        if (auth()->id() != $sender->admin_id) {
            return redirect('admin/sender') -> with('error', 'You are not Owner of this Record');
        } else {
            $sender->delete();
            return redirect('/admin/sender') -> with('success', 'Sender Successfully Deleted');
        }
    }

    function fetch(Request $request)
    {
        if($request->get('query')){
            $query = $request->get('query');
            $data = DB::table('senders')
                ->where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row){
                $output .= '
                <li><a href="#">'.$row->country_name.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    function search(Request $request)
    {
        $query = $request->get('query');
          $filterResult = Sender::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    }
}
