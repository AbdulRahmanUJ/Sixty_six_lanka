<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sender;
use App\Models\Package;
use App\Models\Deliverystatus;
use App\Models\Packingtype;
use App\Models\Paymentmethod;
use App\Models\Shippingmode;
use App\Models\Receiver;
use App\Models\Order;
use App\Models\Packagetype;
use App\Models\Pre_order;
use App\Models\Pre_order_package;
use App\Models\Receiver_address;
use App\Models\Sender_address;
use App\Models\User;
use App\Models\User_address;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_packages = Package::select('*')->orderBy('created_at', 'desc')->get();
        $pending_id = Deliverystatus::where('name', 'pending')->value('id');
        $approved_id = Deliverystatus::where('name', 'approved')->value('id');
        $delivered_id = Deliverystatus::where('name', 'delivered')->value('id');
        $pending = Package::select('*')->where('delivery_status_id', $pending_id)->orderBy('created_at', 'desc')->get();
        $approved = Package::select('*')->where('delivery_status_id', $approved_id)->orderBy('created_at', 'desc')->get();
        $delivered = Package::select('*')->where('delivery_status_id', $delivered_id)->orderBy('created_at', 'desc')->get();
        $canceled = Package::select('*')->where('is_cancel', 1)->orderBy('created_at', 'desc')->get();

        return view('dashboard.superadmin.package.index',
            [
                'pending' => $pending,
                'approved' => $approved,
                'delivered' => $delivered,
                'canceled' => $canceled,
                'all_packages' => $all_packages
            ]
        );
    }

    // public function rdy_to_ship($id){
    //     $package = Package::findOrFail($id);
    //     $package->status='ready_to_ship';
    //     $package->update();
    //     return redirect('superadmin/package') -> with('success', 'package Status Changed Ready to Ship');
    // }

    // public function shipped($id){
    //     $package = Package::findOrFail($id);
    //     $package->status='shipped';
    //     $package->update();
    //     return redirect('superadmin/package') -> with('success', 'package Status Changed to Shipped');
    // }

    // public function arrived($id){
    //     $package = Package::findOrFail($id);
    //         $package->status='arrived';
    //         $package->update();
    //     return redirect('superadmin/package') -> with('success', 'package Status Changed to Arrived');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $receiver = Receiver::all();
        $deliverystatus = Deliverystatus::all();
        $packingtype = Packingtype::all();
        $paymentmethod = Paymentmethod::all();
        $shippingmode = Shippingmode::all();
        $sender = Sender::all();
        $packagetype = Packagetype::all();
        $discount = Cost::where('name', 'Discount')->value('cost');
        $tax = Cost::where('name', 'Tax')->value('cost');
        $shipping_insurance = Cost::where('name', 'Shipping_Insurance')->value('cost');
        $customs_tariffs = Cost::where('name', 'Customs_Tariffs')->value('cost');
        $re_expedition = Cost::where('name', 'Re_Expedition')->value('cost');
        $price_per_kg = Cost::where('name', 'Price_Per_Kg')->value('cost');
        return view('dashboard.superadmin.package.create',
            [   'receiver'=>$receiver,
                'sender'=>$sender,
                'packagetype'=>$packagetype,
                'deliverystatus'=>$deliverystatus,
                'packingtype'=>$packingtype,
                'paymentmethod'=>$paymentmethod,
                'shippingmode'=>$shippingmode,
                'discount'=>$discount,
                'tax'=>$tax,
                'shipping_insurance'=>$shipping_insurance,
                'customs_tariffs'=>$customs_tariffs,
                're_expedition'=>$re_expedition,
                'price_per_kg'=>$price_per_kg,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todayDate = date('m/d/Y');
        $this-> validate($request,
            [
                'receiver' => 'required',
                'receiver_address' => 'required',
                'sender' => 'required',
                'sender_address' => 'required',
                'packing_type' => 'required',
                'shipping_mode' => 'required',
                'est_deli_date' => 'required|date|after_or_equal:'.$todayDate,
                'payment_method' => 'required',
                'delivery_status' => 'required',
                'price_per_kg' => 'required',
                'sub_total' => 'required',
                'tax_rate' => 'required',
                'courier_fee' => 'required',
                'weight' => 'required',
                'length' => 'required',
                'width' => 'required',
                'height' => 'required',
                'packagetype' => 'required',
                'item_name' => 'required',
                'number_of_box' => 'required',
            ]
        );

        $package = new Package;
        $pack = Package::max('id')+1;
        $random = rand(10, 99);

        if($pack<10){
            $track_id='SS'.date('Ymd')."0000".$random.$pack;
        }
        elseif($pack>=10 && $pack<=99){
            $track_id='SS'.date('Ymd')."000".$random.$pack;
        }
        elseif($pack>=100 && $pack<=999){
            $track_id='SS'.date('Ymd')."00".$random.$pack;
        }
        elseif($pack>=1000 && $pack<=9999){
            $track_id='SS'.date('Ymd')."0".$random.$pack;
        }
        elseif($pack>=10000){
            $track_id='SS'.date('Ymd')."".$random.$pack;
        }
        $package->track_no=$track_id; //Track
        $package->receiver_id = $request->receiver; //Receiver
        $package->receiver_address_id = $request->receiver_address; //Receiver Address
        $package->sender_id=$request->sender; //Sender
        $package->sender_address_id=$request->sender_address; //Sender Address
        $package->total_kg_weight=$request->total_kg_weight; //Total Package Weight
        $package->shipping_mode_id=$request->shipping_mode; //Shipping mode
        $package->est_deli_date=$request->est_deli_date;  //Estimate Delivery Date
        $package->payment_method_id=$request->payment_method; //Payment Method
        $package->delivery_status_id=$request->delivery_status; //Delivery Status
        $package->price_per_kg=$request->price_per_kg; //Price per Kg
        $package->total_volumetric_weight=$request->total_volumetric_weight; //total_volumetric_weight
        $package->packing_type_id=$request->packing_type; //Packing Type
        $package->tax_rate=$request->tax_rate; //Tex Rate
        $package->shipping_insurance=$request->shipping_insurance; //shipping_insurance
        $package->customs_tariffs=$request->customs_tariffs; //customs_tariffs
        $package->re_expedition=$request->re_expedition; //re_expedition
        $package->discount=$request->discount; //Discount
        $package->sub_total=$request->sub_total; //Sub Total
        $package->courier_fee=$request->courier_fee; //Courier Fee
        $package->admin_id=Auth()->id(); //Admin ID
        $package->save(); //Save Package

        $admin_id=Auth()->id();
        $quantity=$request->number_of_box;
        $name=$request->item_name;
        $category=$request->packagetype;
        $weight=$request->weight;
        $length=$request->length;
        $width=$request->width;
        $height=$request->height;
        for ($i=0; $i < count($name); $i++) {
            $order = [
                'track_no' => $package->id,
                'admin_id' => $admin_id,
                'quantity' => $quantity[$i],
                'name' => $name[$i],
                'category' => $category[$i],
                'weight' => $weight[$i],
                'length' => $length[$i],
                'width' => $width[$i],
                'height' => $height[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            DB::table('orders')->insert($order);
        }
        return redirect('/superadmin/package')->with('success', 'package Successfully Created');
    }

    // store_pre_order
    public function store_pre_order(Request $request, $id)
    {
        $todayDate = date('m/d/Y');
        $this-> validate($request,
            [
                'admin' => 'required',
                'est_deli_date' => 'date|after_or_equal:'.$todayDate,
            ]
        );

        $pre_order_package = Pre_order_package::FindOrFail($id);
        $deliverystatus = Deliverystatus::where('name', 'Approved')->value('id');
        $receiver_id = $pre_order_package->receiver_id ;
        $receiver_address_id = $pre_order_package->receiver_address_id ;
        // $user_id = $pre_order_package->use
        $sender_id = $pre_order_package-> sender_id;
        $sender_address_id = $pre_order_package-> sender_address_id;
        $total_kg_weight = $pre_order_package-> total_kg_weight;
        $shipping_mode_id = $pre_order_package-> shipping_mode_id;
        if ($request->est_deli_date) {
            $est_deli_date = $request->est_deli_date;
        }else{
            $est_deli_date = $pre_order_package-> est_deli_date;
        }
        $payment_method_id = $pre_order_package-> payment_method_id;
        $price_per_kg = $pre_order_package-> price_per_kg;
        $pre_order_track_id = $pre_order_package->id;
        $total_volumetric_weight = $pre_order_package-> total_volumetric_weight;
        $packing_type_id = $pre_order_package-> packing_type_id;
        $tax_rate = $pre_order_package-> tax_rate;
        $shipping_insurance = $pre_order_package-> shipping_insurance;
        $customs_tariffs = $pre_order_package-> customs_tariffs;
        $re_expedition = $pre_order_package-> re_expedition;
        $discount = $pre_order_package-> discount;
        $sub_total = $pre_order_package-> courier_fee;
        $courier_fee = $pre_order_package-> courier_fee;
        $admin_id = $request-> admin;

        $pre_order_package->status=1;
        $pre_order_package->delivery_status_id=$deliverystatus;
        $pre_order_package->update();

        $package = new Package;
        $pack = Package::max('id')+1;
        $random = rand(10, 99);

        if($pack<10){
            $track_id='SS'.date('Ymd')."0000".$random.$pack;
        }
        elseif($pack>=10 && $pack<=99){
            $track_id='SS'.date('Ymd')."000".$random.$pack;
        }
        elseif($pack>=100 && $pack<=999){
            $track_id='SS'.date('Ymd')."00".$random.$pack;
        }
        elseif($pack>=1000 && $pack<=9999){
            $track_id='SS'.date('Ymd')."0".$random.$pack;
        }
        elseif($pack>=10000){
            $track_id='SS'.date('Ymd')."".$random.$pack;
        }
        $package->track_no=$track_id; //Track
        $package->receiver_id = $receiver_id; //Receiver
        $package->receiver_address_id = $receiver_address_id; //Receiver Address
        $package->sender_id = Null; //Sender
        $package->sender_address_id = Null; //Sender Address
        $package->pre_order_user=$sender_id; //Pre order user
        $package->pre_order_package_id=$pre_order_track_id; //Pre Order Track no
        $package->total_kg_weight=$total_kg_weight; //Total Package Weight
        $package->shipping_mode_id=$shipping_mode_id; //Shipping mode
        $package->est_deli_date=$est_deli_date;  //Estimate Delivery Date
        $package->payment_method_id=$payment_method_id; //Payment Method
        $package->delivery_status_id=$deliverystatus; //Delivery Status
        $package->price_per_kg=$price_per_kg; //Price per Kg
        $package->total_volumetric_weight=$total_volumetric_weight; //total_volumetric_weight
        $package->packing_type_id=$packing_type_id; //Packing Type
        $package->tax_rate=$tax_rate; //Tex Rate
        $package->shipping_insurance=$shipping_insurance; //shipping_insurance
        $package->customs_tariffs=$customs_tariffs; //customs_tariffs
        $package->re_expedition=$re_expedition; //re_expedition
        $package->discount=$discount; //Discount
        $package->sub_total=$sub_total; //Sub Total
        $package->courier_fee=$courier_fee; //Courier Fee
        $package->admin_id=$request->admin; //Admin ID
        $package->save(); //Save Package


        $admin_id=$admin_id;
        $quantity=$request->number_of_box;
        $name=$request->item_name;
        $category=$request->packagetype;
        $weight=$request->weight;
        $length=$request->length;
        $width=$request->width;
        $height=$request->height;
        for ($i=0; $i < count($name); $i++) {
            $order = [
                'track_no' => $package->id,
                'admin_id' => $admin_id,
                'quantity' => $quantity[$i],
                'name' => $name[$i],
                'category' => $category[$i],
                'weight' => $weight[$i],
                'length' => $length[$i],
                'width' => $width[$i],
                'height' => $height[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        DB::table('orders')->insert($order);
        }
        return redirect('/superadmin/preorder')->with('success', 'Pre Order Successfully Created in Package');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::findOrFail($id);
        $deliverystatus = Deliverystatus::all();
        $order = Order::select('*')
            ->where('track_no', '=', $id)
            ->get();
        $admin_id = User::where('id', $package->admin_id)->value('id');
        $admin = User::where('id', $admin_id)->get();
        $pre_order_user_id = Package::get('pre_order_user');
        $pre_order_user = User::find($pre_order_user_id);
        return view('dashboard.superadmin.package.show',
            [
                'package'=> $package,
                'order' => $order,
                'pre_order_user' => $pre_order_user,
                'deliverystatus' => $deliverystatus,
                'admin' => $admin,
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
        $package = Package::findOrFail($id);
        $order = Order::select('*')
            ->where('track_no', '=', $id)
            ->get();
        $ordercount = $order->count();
        $sender = Sender::all();
        $sender_addresses = Package::where('id', $id)->get('sender_address_id');
        $get_sender_address = Sender_address::find($sender_addresses);
        $receiver = Receiver::all();
        $receiver_addresses = Package::where('id', $id)->get('sender_address_id');
        $get_receiver_address = Receiver_address::find($receiver_addresses);
        $deliverystatus = Deliverystatus::all();
        $packingtype = Packingtype::all();
        $paymentmethod = Paymentmethod::all();
        $shippingmode = Shippingmode::all();
        $packagetype = Packagetype::all();
        $sender_address = Sender_address::all();

        return view('dashboard.superadmin.package.edit',
            [
                'package'=>$package,
                'order'=>$order,
                'ordercount'=>$ordercount,
                'receiver'=>$receiver,
                'deliverystatus'=>$deliverystatus,
                'packingtype'=>$packingtype,
                'paymentmethod'=>$paymentmethod,
                'shippingmode'=>$shippingmode,
                'sender'=>$sender,
                'packagetype'=>$packagetype,
                'sender_address'=>$sender_address,
                'get_sender_address'=>$get_sender_address,
                'get_receiver_address'=>$get_receiver_address,
            ]
        );
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
        $todayDate = date('m/d/Y');
        $this-> validate($request,
            [
                'receiver' => 'required',
                'receiver_address' => 'required',
                'sender' => ['required_with:sender', 'sometimes'],
                'sender_address' => ['required_with:sender_address', 'sometimes'],
                'packing_type' => 'required',
                'shipping_mode' => 'required',
                'est_deli_date' => 'required|date|after_or_equal:'.$todayDate,
                'payment_method' => 'required',
                'delivery_status' => 'required',
                'price_per_kg' => 'required',
                'estimate_weight' => 'required',
                'sub_total' => 'required',
                'tax_rate' => 'required',
                'courier_fee' => 'required',
                'weight' => 'required',
                'length' => 'required',
                'width' => 'required',
                'height' => 'required',
                'packagetype' => 'required',
                'item_name' => 'required',
                'number_of_box' => 'required',
                // 'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
            ]
        );

        $package = Package::find($id);

        $package->receiver_id = $request->receiver;
        $package->receiver_address_id = $request->receiver_address; //Receiver Address
        $package->sender_id=$request->sender;
        $package->sender_address_id=$request->sender_address; //Sender Address
        $package->total_kg_weight=$request->estimate_weight;
        $package->shipping_mode_id=$request->shipping_mode;
        $package->est_deli_date=$request->est_deli_date;
        $package->payment_method_id=$request->payment_method;
        $package->delivery_status_id=$request->delivery_status;
        $package->price_per_kg=$request->price_per_kg;
        $package->packing_type_id=$request->packing_type;
        $package->tax_rate=$request->tax_rate;
        $package->discount=$request->discount;
        $package->sub_total=$request->sub_total;
        $package->courier_fee=$request->courier_fee;
        // dd($request);
        $package->update();

        if(count($request->id)>0){
            foreach ($request->id as $item => $v) {
                $orderlist = array(
                    'quantity'=>$request->number_of_box[$item],
                    'name'=>$request->item_name[$item],
                    'category'=>$request->packagetype[$item],
                    'weight'=>$request->weight[$item],
                    'length'=>$request->length[$item],
                    'width'=>$request->width[$item],
                    'height'=>$request->height[$item]
                );
                $order=Order::where('id', $request->id[$item])->first();
                $order->update($orderlist);
            }
        }
        return redirect('/superadmin/package')->with('success', 'package Successfully Updated');

        // $id = $package->id;
        // return redirect('/superadmin/package/show/'.$id)->with('success','package Successfully Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $pre_order_package_id = Package::where('pre_order_package_id', $package->pre_order_package_id)->value('pre_order_package_id');

        if ($pre_order_package_id ==null) {

            $order = Order::where('track_no', $id)->get('id');
                if(count($order)>0){
                    $order->each->delete();
                }
            $package->delete();
            return redirect('/superadmin/package') -> with('success', 'package Successfully Deleted');

        } else {
            $order = Order::where('track_no', $id)->get('id');
            if(count($order)>0){
                $order->each->delete();
            }
            $package->delete();

            $pre_order_package = Pre_order_package::where('id', $pre_order_package_id)->get('id');
            $pre_order_package_id = Pre_order_package::where('id', $pre_order_package_id)->value('id');
            $pre_order = Pre_order::where('pre_order_track_no', $pre_order_package_id)->get();
            if(count($pre_order)>0){
                $pre_order->each->delete();

            }
            $pre_order_package->each->delete();
            return redirect('/superadmin/package') -> with('success', 'package Successfully Deleted');
        }
    }

    public function order_destroy($id){
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(
            [
            'success' => 'Record deleted successfully!'
            ]
        );
    }

    public function preview_package($id)
    {
        $package= Package::findOrFail($id);
        if (Auth::user()->role !='super_admin') {
            return redirect('/home') -> with('error', 'Un Authorized Access');
        } else {
            $admin = User::where('id', $package->admin_id)->get()->first();
            $admin_address = User_address::where('user_id', $admin->id)->get();
            $orders = Order::where('track_no', $package->id)->get();
            $pre_order_user = User::where('id', $package->pre_order_user)->get();
            // $sender = Sender::where('id', $package->sender_id)->get();
            // $sender_address = Sender_address::where('id', $package->sender_address_id)->get();
            $receiver = Receiver::where('id', $package->receiver_id)->get();
            $receiver_address = Receiver_address::where('id', $package->receiver_address_id)->get();

            return view('dashboard.admin.package.preview',
                [
                    'package' => $package,
                    'admin' => $admin,
                    'pre_order_user' => $pre_order_user,
                    'orders' => $orders,
                    'admin_address' => $admin_address,
                    'receiver' => $receiver,
                    'receiver_address' => $receiver_address,
                ]
            );
        }
    }

    public function update_status(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        $package->delivery_status_id= $request->deliverystatus;
        $package->update();
        return redirect('/superadmin/package/show/'.$id) -> with('success', 'package Status Successfully Changed');
    }

    public function pickup(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $this-> validate($request,
            [
                'name' => 'required',
                'image' => ['image','mimes:png,jpg,jpeg', 'max:5000'],
            ]
        );
        if (request()->hasFile('image')) {
            $file = $request['image'];
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('package/pickup/proof/', $filename);
        }else{
            $filename = ('Null');
        }
        $package->person_receives= $request->name;
        $package->is_pickup= 1;
        $package->image= $filename;
        $package->update();
        return redirect('/superadmin/package/show/'.$id) -> with('success', 'package Receiver Successfully Changed');
    }

    public function cancel_package(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $this-> validate($request,
            [
                'cancel' => 'required',
            ]
        );
        $cancelled = Deliverystatus::where('name', 'Cancelled')->value('id');
        $package->is_cancel= 1;
        $package->reason_cancel= $request->cancel;
        $package->delivery_status_id= $cancelled;
        $package->update();
        return redirect('/superadmin/package/show/'.$id) -> with('success', 'package Cancelled Successfully');
    }

    public function remove_cancel(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        if ($request->remove_cancel=='on') {
            $remove_cancel=1;
        } else {
            $remove_cancel=0;
        }

        $approved = Deliverystatus::where('name', 'Approved')->value('id');
        $package->is_cancel= $remove_cancel;
        $package->reason_cancel= null;
        $package->delivery_status_id= $approved;
        $package->update();
        return redirect('/superadmin/package/show/'.$id) -> with('success', 'package Successfully Approved');
    }

    // public function ready($id)
    // {
    //     $package = Package::findOrFail($id);
    //     $package->status='ready_to_ship';
    //     $package->update();
    //     return redirect('/superadmin/package') -> with('success', 'package Status Successfully Changed');
    // }
}
