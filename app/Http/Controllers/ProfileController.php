<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use App\Models\User_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Constraint\Count;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        return view('profile.index',["user"=>$user]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id != Auth::user()->id) {
            return redirect('/')->with('error', 'Un Authorized Access');
        } else {
            $user = User::where('id', $id)->firstOrFail();
            return view('profile/show', ["user"=>$user]);
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
        if (Auth::id() != $id) {
            return redirect('/home')->with('error', 'Un Authorized Access');
        } else {
            $user = User::find($id);
            $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
            $user_address = User_address::where('user_id', Auth::user()->id)->get();
            $user_address_count = Count($user_address);

            return view('profile.edit',
            [
                'user'=>$user,
                'countries'=>$countries,
                'user_address'=>$user_address,
                'user_address_count'=>$user_address_count,
            ]);
        }
    }

    public function add_address($id)
    {
        if (Auth::id() != $id) {
            return redirect('/home')->with('error', 'Un Authorized Access');
        } else {
            $user = User::find($id);
            $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
            $user_address = User_address::where('user_id', Auth::user()->id)->get();

            return view('profile.add_address',
            [
                'user'=>$user,
                'countries'=>$countries,
                'user_address'=>$user_address,
            ]);
        }
    }
    public function store_address(Request $request, $id)
    {
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
        $user_address = new User_address();
        $user_address->user_id=$id;
        $user_address->address=$request->address;
        $user_address->country_id=$request->country;
        $user_address->state_id=$request->state;
        $user_address->city_id=$request->city;
        $user_address->zip=$request->zip;
        $user_address->save();
        return redirect('/home') -> with('success', 'User Address Successfully Added');
    }

    public function edit_address($id)
    {
        $user_address = User_address::FindOrFail($id);
        if (Auth::id() != $user_address->user_id) {
            return redirect('/home')->with('error', 'Un Authorized Access');
        } else {
            $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');

            return view('profile.edit_address',
            [
                'countries'=>$countries,
                'user_address'=>$user_address,
            ]);
        }
    }

    public function update_address(Request $request, $id){
        $user_address = User_address::FindOrFail($id);
        if (Auth::user()->id != $user_address->user_id) {
            return redirect('/home')->with('error', 'Un Authorized Access');
        } else {
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

        return redirect('/home')->with('success', 'Address Successfully Updated');
        }
    }

    public function delete_address($id){
        $user_address = User_address::find($id);
        $user = User_address::where('user_id', $user_address->user_id)->value('id');
        $user_address_count = User_address::where('user_id', $user)->count();
        if ($user_address_count>1) {
            $user_address->delete();
            return redirect()->back()->with('success', 'user Address Successfully Deleted');
        } else {
            return redirect()->back()->with('error', 'Cannot Delete this Address');
        }
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
        $this-> validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'phone'=>['required','string'],
        ]);
        // return $request->input();
        $user = User::find($id);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->update();
        return redirect('user/edit/'.$id) -> with('success', 'User Profile Successfully Updated');
    }

    public function update_profile_image(Request $request, $id){

        if (Auth::user()->id != $id) {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
            $this-> validate($request,[
                'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2000']
            ]);

            $user = User::find($id);

            if (request()->hasFile('image')) {

                $destination = 'users/profile/'.$user->image;
                if ($destination!=='users/profile/user.png') {
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                }
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('users/profile/', $filename);
                $user->image = $filename;
            }else{
                $filename = ('user.png');
            }
            $user->update();
            return redirect()->back()->with('success','Profile Image Successfully Updated');
        }
    }

    public function delete_profile_image($id){

        if (Auth::user()->id != $id) {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
            $user = User::find($id);
            $destination = 'users/profile/'.$user->image;
            if ($destination!=='users/profile/user.png') {
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }else{
                return redirect()->back()->with('error', 'You Do not have a profile Picture');
            }
            $user->image = 'user.png';
            $user->update();
            return redirect()->back()->with('success', 'Profile Image Successfully deleted');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/') -> with('success', 'User Profile Successfully Deleted');
    }
}
