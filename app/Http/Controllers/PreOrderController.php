<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Deliverystatus;
use App\Models\Package;
use App\Models\Packagetype;
use App\Models\Packingtype;
use App\Models\Paymentmethod;
use App\Models\Pre_order;
use App\Models\Pre_order_package;
use App\Models\Receiver;
use App\Models\Receiver_address;
use App\Models\Sender;
use App\Models\Shippingmode;
use App\Models\User;
use App\Models\User_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Echo_;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class PreOrderController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $receiver = Receiver::where('admin_id', Auth::user()->id)->get();
        $deliverystatus = Deliverystatus::all();
        $packingtype = Packingtype::all();
        $paymentmethod = Paymentmethod::all();
        $shippingmode = Shippingmode::all();
        $sender = Auth::user();
        $sender_address = User_address::where('user_id', $sender->id)->get();
        $packagetype = Packagetype::all();
        $price_per_kg = Cost::where('name', 'Price_Per_Kg')->value('cost');

        return view('preOrder.create', compact(
            'receiver',
            'deliverystatus',
            'packingtype',
            'paymentmethod',
            'shippingmode',
            'sender',
            'packagetype',
            'sender_address',
            'price_per_kg',
        ));
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
                'price_per_kg' => 'required',
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

        $package = new Pre_order_package();
        $pack = Pre_order_package::withTrashed()->count()+1;
        $random = rand(10, 99);
        // $total = $row + $max_id;

        if($pack<10){
            $track_id='SSPO'.date('Ymd')."0000".$random.$pack;
        }
        elseif($pack>=10 && $pack<=99){
            $track_id='SSPO'.date('Ymd')."000".$random.$pack;
        }
        elseif($pack>=100 && $pack<=999){
            $track_id='SSPO'.date('Ymd')."00".$random.$pack;
        }
        elseif($pack>=1000 && $pack<=9999){
            $track_id='SSPO'.date('Ymd')."0".$random.$pack;
        }
        elseif($pack>=10000){
            $track_id='SSPO'.date('Ymd')."".$random.$pack;
        }
        $delivery_status = Deliverystatus::where('name', 'Pending')->value('id');

        $discount = Cost::where('name', 'Discount')->value('cost');
        $tax = Cost::where('name', 'Tax')->value('cost');

        $package->pre_order_track_no=$track_id; //Track
        $package->receiver_id = $request->receiver; //Receiver
        $package->receiver_address_id = $request->receiver_address; //Receiver Address
        $package->sender_id=Auth::user()->id; //Sender
        $package->sender_address_id=$request->sender_address; //Sender Address
        $package->total_kg_weight=$request->total_kg_weight; //Total Package Weight
        $package->calculate_weight=$request->calculate_weight;
        $package->price_per_kg=$request->price_per_kg; //price_per_kg
        $package->discount=$discount;//$request->discount; //discount
        $package->tax_rate=$tax;//$request->tax_rate; //tax_rate
        $package->shipping_mode_id=$request->shipping_mode; //Shipping mode
        $package->est_deli_date=$request->est_deli_date;  //Estimate Delivery Date
        $package->payment_method_id=$request->payment_method; //Payment Method
        $package->delivery_status_id= $delivery_status; //Delivery Status
        $package->total_volumetric_weight=$request->total_volumetric_weight; //total_volumetric_weight
        $package->packing_type_id=$request->packing_type; //Packing Type
        $package->courier_fee=$request->courier_fee; //Courier Fee
        $package->save(); //Save Package

        $quantity=$request->number_of_box;
        $name=$request->item_name;
        $category=$request->packagetype;
        $weight=$request->weight;
        $length=$request->length;
        $width=$request->width;
        $height=$request->height;
        for ($i=0; $i < count($name); $i++) {
            $order = [
                'pre_order_track_no' => $package->id,
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
            DB::table('pre_orders')->insert($order);
        }
        return redirect('/home')->with('success', 'Pre Order Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pre_order_package = Pre_order_package::findOrFail($id);
        if (auth()->id() != $pre_order_package->sender->id) {
            return redirect('/home') -> with('error', 'You are not Owner of this Record');
        } else {
            $pre_orders = Pre_order::select('*')
            ->where('pre_order_track_no', '=', $id)
            ->get();
            return view('preOrder.show',
                [
                    "pre_order_package" => $pre_order_package,
                    'pre_orders' => $pre_orders,
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
        $pre_order_package = Pre_order_package::findOrFail($id);
        if (Auth::user()->id != $pre_order_package->sender_id) {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
            $order = Pre_order::select('*')
                ->where('pre_order_track_no', '=', $id)
                ->get();
            $ordercount = $order->count();
            $sender = Auth::user();
            $sender_addresses = Pre_order_package::where('id', $id)->get('sender_address_id');
            $get_sender_address = User_address::find($sender_addresses);
            $receiver = Receiver::all();
            $receiver_addresses = Pre_order_package::where('id', $id)->get('receiver_address_id');
            $get_receiver_address = Receiver_address::find($receiver_addresses);
            $deliverystatus = Deliverystatus::all();
            $packingtype = Packingtype::all();
            $paymentmethod = Paymentmethod::all();
            $shippingmode = Shippingmode::all();
            $packagetype = Packagetype::all();

            return view('preOrder.edit',
                [
                    'pre_order_package'=>$pre_order_package,
                    'order'=>$order,
                    'ordercount'=>$ordercount,
                    'receiver'=>$receiver,
                    'deliverystatus'=>$deliverystatus,
                    'packingtype'=>$packingtype,
                    'paymentmethod'=>$paymentmethod,
                    'shippingmode'=>$shippingmode,
                    'sender'=>$sender,
                    'packagetype'=>$packagetype,
                    'get_sender_address'=>$get_sender_address,
                    'get_receiver_address'=>$get_receiver_address,
                ]
            );
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
        $pre_order_package = Pre_order_package::find($id);

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
                'price_per_kg' => 'required',
                'total_volumetric_weight' => 'required',
                'total_kg_weight' => 'required',
                'calculate_weight' => 'required',
                // 'tax_rate' => 'required',
                // 'discount' => 'required',
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
        $discount = Cost::where('name', 'Discount')->value('cost');
        $tax = Cost::where('name', 'Tax')->value('cost');

        $pre_order_package->receiver_id = $request->receiver;
        $pre_order_package->receiver_address_id = $request->receiver_address; //Receiver Address
        $pre_order_package->sender_id=$request->sender;
        $pre_order_package->sender_address_id=$request->sender_address; //Sender Address
        $pre_order_package->total_kg_weight=$request->total_kg_weight;
        $pre_order_package->total_volumetric_weight=$request->total_volumetric_weight;
        $pre_order_package->shipping_mode_id=$request->shipping_mode;
        $pre_order_package->est_deli_date=$request->est_deli_date;
        $pre_order_package->payment_method_id=$request->payment_method;
        $pre_order_package->price_per_kg=$request->price_per_kg;
        $pre_order_package->packing_type_id=$request->packing_type;
        $pre_order_package->tax_rate=$tax;
        $pre_order_package->discount=$discount;
        $pre_order_package->calculate_weight=$request->calculate_weight;
        $pre_order_package->courier_fee=$request->courier_fee;
        $pre_order_package->update();

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
                $order=Pre_order::where('id', $request->id[$item])->first();
                $order->update($orderlist);
            }
        }
        return redirect('/home')->with('success', 'Pre Ordee Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function order_destroy($id){
        $order = Pre_order::findOrFail($id);
        if (Auth::user()->id != $order->pre_order_package->sender_id) {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
            $order->delete();
            return response()->json(
                [
                'success' => 'Record deleted successfully!'
                ]
            );
        }
    }

    public function destroy($id)
    {
        $pre_order_package = Pre_order_package::findOrFail($id);
        if (Auth::user()->id != $pre_order_package->sender->id) {
            return redirect()->back()->with('error', 'Un Authorized Access');
        } else {
            $pre_order_package->delete();
            return redirect('/home') -> with('success', 'Pre Order Package Successfully Deleted');
        }

    }
}
