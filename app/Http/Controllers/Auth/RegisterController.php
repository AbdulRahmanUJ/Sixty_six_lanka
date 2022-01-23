<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\WelcomeEmailNotification;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User_address;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $countries = Country::where('is_active', '=', '1')->pluck('country_name', 'id');
        return view('auth.register')->with(['countries'=> $countries]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,
            [
                'name' => ['required', 'string', 'max:255'],
                'street'=>['string'],
                'city'=>['required','string'],
                'state'=>['required','string'],
                'country'=>['required','string'],
                'post_code'=>['required','string'],
                'phone'=>['required','string'],
                'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2000'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (request()->hasFile('image')) {
            $file = $data['image'];
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('users/profile/', $filename);
        }else{
            $filename = ('user.png');
        }

        $user = User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'image' => $filename,
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
            ]
        );
        $user_address = [
            'user_id' => $user->id,
            'address' => $data['street'],
            'city_id' => $data['city'],
            'state_id' => $data['state'],
            'country_id' => $data['country'],
            'zip' => $data['post_code'],
            'created_at'=> Carbon::now()->toDateTimeString(),
            'updated_at'=> Carbon::now()->toDateTimeString(),
        ];
        DB::table('user_addresses')->insert($user_address);

        $user->notify(new WelcomeEmailNotification());

        return $user;
    }
}
