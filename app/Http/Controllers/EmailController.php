<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email= Email::orderBy('created_at', 'desc')->paginate(5)->onEachSide(1);
        return view('contact.index',['emails'=>$email]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::id();
        return view('contact.contact',["user"=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send_mail(Request $request) {
        $this-> validate($request,[
            'name' => 'required',
            'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
            'subject' => 'required',
            'email' => 'required|email|email:rfc,dns',
            'content' => 'required',
        ]);

        Email::create($request->all());

        \Mail::send('contact.email-template', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'content' => $request->get('content'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('boomrahman12@gmail.com', 'Abdul Rahman')->subject($request->get('subject'));
        });

        return redirect('/contact')->with('success', 'Thanks for contacting us.');
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
