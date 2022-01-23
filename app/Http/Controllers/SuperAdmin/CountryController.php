<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\
     */
    public function index()
    {
        $country = Country::orderBy('country_name')->get();
        return view('dashboard.superadmin.country.index')->with('country', $country);
    }

    public function add_country(Request $request)
    {
        $country_id = Country::max('id')+1;
        $this-> validate($request,
            [
                'country_name' => 'required',
                'sort' => 'required',
                'phone_code' => 'required',
            ],
            [
                'country_name.required' => 'Country name is required',
                'sort.required' => 'Country Sort is required',
                'phone_code.required' => 'Country Phone Code is required',
            ]
        );
        $country = new Country;
        $country->country_name=$request->country_name;
        $country->sort=$request->sort;
        $country->phoneCode=$request->phone_code;
        $country->country_id=$country_id;
        $country->is_active=1;
        $country->save();
        return redirect()->back()->with('success', 'New Country Successfully Created');
    }

    public function add_state(Request $request, $id)
    {
        $this-> validate($request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'State name is required',
            ]
        );
        $state = new State;
        $state->name=$request->name;
        $state->country_id=$id;
        $state->save();
        return redirect()->back()->with('success', 'New State Successfully Created');
    }

    public function add_city(Request $request, $id)
    {
        $this-> validate($request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'City name is required',
            ]
        );
        $city = new City;
        $city->name=$request->name;
        $city->state_id=$id;
        $city->save();
        return redirect()->back()->with('success', 'New City Successfully Created');
    }

    public function change_status(Request $request)
    {
        if (Auth::user()->role != 'super_admin') {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
        $country = Country::find($request->country_id);
        $country->is_active = $request->is_active;
        $country->update();
        return response()->json(['success'=>'Country Status changed successfully.']);
        }
    }

    public function show_states($id)
    {
        $country = Country::findOrfail($id);
        $states = State::where('country_id','=',$id)->get();
        return view('dashboard.superadmin.country.show_states',
            [
                'country'=> $country,
                'states'=> $states,
            ]
        );
    }

    public function show_cities($id)
    {
        $state = State::findOrfail($id);
        $cities = City::where('state_id','=',$id)->get();
        return view('dashboard.superadmin.country.show_cities',
            [
                'state'=> $state,
                'cities'=> $cities,
            ]
        );
    }

    public function edit_country($id)
    {
        if (Auth::user()->role != 'super_admin') {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
        $country = Country::findOrFail($id);
        return view('dashboard.superadmin.country.edit_country',compact('country'));
        }
    }

    public function update_country(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $this-> validate($request,
            [
                'country_name' => 'required',
                'sort' => 'required',
                'phone_code' => 'required',
            ],
            [
                'country_name.required' => 'Country name is required',
                'sort.required' => 'Country Sort is required',
                'phone_code.required' => 'Country Phone Code is required',
            ]
        );
        $country->country_name=$request->country_name;
        $country->sort=$request->sort;
        $country->phoneCode=$request->phone_code;
        $country->update();
        return redirect('/superadmin/country')->with('success', 'Country Successfully Updated');
    }

    public function edit_state($id)
    {
        if (Auth::user()->role != 'super_admin') {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
        $state = State::findOrFail($id);
        return view('dashboard.superadmin.country.edit_state',compact('state'));
        }
    }

    public function update_state(Request $request, $id)
    {
        $state = State::findOrFail($id);
        $country = $state->country_id;
        $this-> validate($request,
            [
                'state_name' => 'required',
            ],

            [
                'state_name.required' => 'State name is required',
            ]
        );
        $state->name=$request->state_name;
        $state->update();
        return redirect('/superadmin/country/show/'.$country)->with('success', 'State Successfully Updated');
    }

    public function edit_city($id)
    {
        if (Auth::user()->role != 'super_admin') {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
        $city = City::findOrFail($id);
        return view('dashboard.superadmin.country.edit_city',compact('city'));
        }
    }

    public function update_city(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $state = $city->state_id;
        $this-> validate($request,
            [
                'city_name' => 'required',
            ],

            [
                'city_name.required' => 'City name is required',
            ]
        );
        $city->name=$request->city_name;
        $city->update();
        return redirect('/superadmin/state/show/'.$state)->with('success', 'City Successfully Updated');
    }

    public function delete_country($id)
    {
        if (Auth::user()->role != 'super_admin') {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
            $country = Country::findOrFail($id);
            $country->delete();
            return redirect('/superadmin/country')->with('success', 'Country Successfully Deleted');
        }
    }

    public function delete_state($id)
    {
        if (Auth::user()->role != 'super_admin') {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
            $state = State::findOrFail($id);
            $country_id = $state->country_id;
            $state->delete();
            return redirect('/superadmin/country/show/'.$country_id)->with('success', 'State Successfully Deleted');
        }

    }

    public function delete_city($id)
    {
        if (Auth::user()->role != 'super_admin') {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
            $city = City::findOrFail($id);
            $state_id = $city->state_id;
            $city->delete();
            return redirect('/superadmin/state/show/'.$state_id)->with('success', 'City Successfully Deleted');
        }

    }

    // for admin
    public function admin_index()
    {
        $country = Country::orderBy('country_name')->get();
        $active_country = Country::where('is_active', 1)->count();

        return view('dashboard.admin.country.index',
            [
                'country' => $country,
                'active_country' => $active_country,
            ]
        );
    }

    public function admin_add_state(Request $request, $id)
    {
        $this-> validate($request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'State name is required',
            ]
        );
        $state = new State;
        $state->name=$request->name;
        $state->country_id=$id;
        $state->save();
        return redirect()->back()->with('success', 'New State Successfully Created');
    }

    public function admin_add_city(Request $request, $id)
    {
        $this-> validate($request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'City name is required',
            ]
        );
        $city = new City;
        $city->name=$request->name;
        $city->state_id=$id;
        $city->save();
        return redirect()->back()->with('success', 'New City Successfully Created');
    }

    public function admin_show_states($id)
    {
        $country = Country::findOrfail($id);
        $states = State::where('country_id','=',$id)->get();
        return view('dashboard.admin.country.show_states',
            [
                'country'=> $country,
                'states'=> $states,
            ]
        );
    }

    public function admin_show_cities($id)
    {
        $state = State::findOrfail($id);
        $cities = City::where('state_id','=',$id)->get();
        return view('dashboard.admin.country.show_cities',
            [
                'state'=> $state,
                'cities'=> $cities,
            ]
        );
    }

    public function admin_edit_state($id)
    {
        if (Auth::user()->role != 'admin') {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
        $state = State::findOrFail($id);
        return view('dashboard.admin.country.edit_state',compact('state'));
        }
    }

    public function admin_update_state(Request $request, $id)
    {
        $state = State::findOrFail($id);
        $country = $state->country_id;
        $this-> validate($request,
            [
                'state_name' => 'required',
            ],

            [
                'state_name.required' => 'State name is required',
            ]
        );
        $state->name=$request->state_name;
        $state->update();
        return redirect('/admin/country/show/'.$country)->with('success', 'State Successfully Updated');
    }

    public function admin_edit_city($id)
    {
        if (Auth::user()->role != 'admin') {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
        $city = City::findOrFail($id);
        return view('dashboard.admin.country.edit_city',compact('city'));
        }
    }

    public function admin_update_city(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $state = $city->state_id;
        $this-> validate($request,
            [
                'city_name' => 'required',
            ],

            [
                'city_name.required' => 'City name is required',
            ]
        );
        $city->name=$request->city_name;
        $city->update();
        return redirect('/admin/state/show/'.$state)->with('success', 'City Successfully Updated');
    }

    public function admin_delete_state($id)
    {
        if (Auth::user()->role != 'admin') {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
            $state = State::findOrFail($id);
            $country_id = $state->country_id;
            $state->delete();
            return redirect('/admin/country/show/'.$country_id)->with('success', 'State Successfully Deleted');
        }

    }

    public function admin_delete_city($id)
    {
        if (Auth::user()->role != 'admin') {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
            $city = City::findOrFail($id);
            $state_id = $city->state_id;
            $city->delete();
            return redirect('/admin/state/show/'.$state_id)->with('success', 'City Successfully Deleted');
        }

    }
}
