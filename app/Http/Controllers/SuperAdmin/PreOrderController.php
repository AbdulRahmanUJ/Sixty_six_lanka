<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Deliverystatus;
use App\Models\Package;
use App\Models\Pre_order;
use App\Models\Pre_order_package;
use App\Models\User;
use App\Models\User_address;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pre_order_pending = Pre_order_package::where('status', 0)->get();
        $pre_order_approved = Pre_order_package::where('status', 1)->get();
        // $admin_user = DB::table('users')
        // ->where( "role", 'admin')
        // ->where( "status", 1)->get('id');
        // $admin_user = User::where('id', $admin);

        $pending = Deliverystatus::where('name', 'pending')->value('id');
        return view('dashboard.superadmin.preOrder.index',
            [
                'pre_order_pending' => $pre_order_pending,
                'pre_order_approved' => $pre_order_approved,
                'pending' => $pending,
            ]
        );
    }

    public function change_status(Request $request)
    {
        $preorder = Pre_order_package::find($request->pre_order_id);
        $preorder->status = $request->status;
        $preorder->update();
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
    // public function show($id)
    // {
    //     $pre_order_package = Pre_order_package::findOrFail($id);
    //     $pre_orders = Pre_order::select('*')
    //         ->where('pre_order_track_no', '=', $id)
    //         ->get();
    //         return view('dashboard.superadmin.preOrder.show',
    //             [
    //                 "pre_order_package" => $pre_order_package,
    //                 'pre_orders' => $pre_orders
    //             ]
    //         );
    // }

    public function show_pre_order($id)
    {
        $pre_order_package = Pre_order_package::findOrFail($id);
        $order_date = $pre_order_package->est_deli_date;
        if (Carbon::now()->lte($order_date)) {
            $today =0;
        }else{
            $today =1;
        }

        $admin = User::where('role', 'admin')->orWhere('role', 'super_admin')->where('status', '1')->get();
        // $admin_address = User_address::where('user_id', [$admin->id])->first();
        // dd($admin);
        $pre_orders_input = Pre_order::select('*')
                                ->where('pre_order_track_no', '=', $id)
                                ->get();
        $pre_orders = Pre_order::select('*')
                                ->where('pre_order_track_no', '=', $id)
                                ->get();
        $pre_order_count = Pre_order::select('*')
                                    ->where('pre_order_track_no', '=', $id)
                                    ->count();
            return view('dashboard.superadmin.preOrder.show_pre_order',
                [
                    "pre_order_package" => $pre_order_package,
                    'pre_orders' => $pre_orders,
                    'pre_orders_input' => $pre_orders_input,
                    'admin' => $admin,
                    'pre_order_count' => $pre_order_count,
                    'today' => $today,
                ]
            );
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
        $package = Pre_order_package::findOrFail($id);
        $order = Pre_order::where('pre_order_track_no', $id)->get('id');

        if(count($order)>0){
            $order->each->delete();
        }
        $package->delete();
        return redirect('/superadmin/preorder') -> with('success', 'Pre Order Package Successfully Deleted');
    }
}
