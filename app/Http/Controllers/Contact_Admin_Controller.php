<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Pre_order_package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Contact_Admin_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $email= Email::orderBy('created_at', 'desc')->paginate(5)->onEachSide(1);
        // return view('contact.index',['emails'=>$email]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pre_order_package = Pre_order_package::findOrFail($id);
        if (Auth::user()->id != $pre_order_package->sender_id) {
            return redirect('/home') -> with('error', 'You are not Owner of this Record');
        } else {
            $pre_order_package_id = Pre_order_package::where('id', $id)->value('id');
            $package = Package::select('*')->where('pre_order_package_id', $pre_order_package_id)->get()->first();
            $admin_id = Package::where('pre_order_package_id', $id)->value('Admin_id');
            $admin_email = User::where('id', $admin_id)->value('email');
            return view('contact_admin.contact',
                [
                    "package" => $package,
                    "admin_email" => $admin_email,
                ]
            );
        }

        // $user = Auth::id();
        // return view('contact.contact',["user"=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send_mail(Request $request, $id) {
        $package = Package::findOrFail($id);

        if (Auth::user()->id != $package->pre_order_user) {
            return redirect('/home') -> with('error', 'You are not Owner of this Record');

        } else {
            $this-> validate($request,[
                'track_no' => 'required',
                'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
                'email' => 'required|email|email:rfc,dns',
                'content' => 'required',
            ]);

            \Mail::send('contact_admin.email-template', array(
                'track_no' => $request->get('track_no'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'content' => $request->get('content'),
                'admin_email' => $request->get('admin_email'),
            ), function($message) use ($request){
                $message->from($request->email);
                $message->to($request->admin_email)->subject($request->get('track_no'));
            });

            return redirect('/home')->with('success', 'Thanks for contacting us.');
        }
    }

    // public function store(Request $request)
    // {
    //     $this-> validate($request,[
    //         'name' => 'required',
    //         'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
    //         'email' => 'required',
    //         'message' => 'required',
    //     ]);
    //     $email = new Email();
    //     $email->name = $request->name;
    //     $email->phone= $request->phone;
    //     $email->email=$request->email;
    //     $email->message=$request->message;
    //     $email->save();

    //     return redirect('/contact/send');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = Email::find($id)->first();
        return view('contact/show', ["email"=>$email]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
