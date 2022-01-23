@extends('layouts.app')

@section('content')
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }

    input[type=number] {
        -moz-appearance:textfield; /* Firefox */
    }
</style>

<div class="container">
    <div class="main-body">
            <div class="col-sm-12">
              <div class="row gutters-sm">
                <div class="col-sm-12 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">Pre Order Package</h4>
                            <div class="form">
                                <form action="/pre_order_package/{{ $pre_order_package->id }}" name="pre_order_package" id="cart" method="POST">
                                    @method('PATCh')
                                    @csrf
                                    <div class="card py-3 px-2">
                                        <div class="mb-2">
                                            <h4><i data-feather="send" class="text-success"></i> Sender Details</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="sender">Sender Name</label>
                                                <select class="mdb-select md-form form-control" id="sender" name="sender" value="{{old('sender')}}">
                                                        <option  value="{{$pre_order_package->sender->id}}">{{$pre_order_package->sender->name}}</option>
                                                </select>
                                                <span style="color:red">{{$errors->first('sender')}}</span>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-group row sender_address">
                                            <div class="col-11">
                                                <label for="sender_address">Sender Address</label>
                                                <select class="form-control" name="sender_address" value="{{old('sender_address')}}" id="sender_address">
                                                    <option value="{{ $pre_order_package->sender_address->id }}" class="disabled">Address: {{ $pre_order_package->sender_address->address }} | City: {{ $pre_order_package->sender_address->city->name }} | State: {{ $pre_order_package->sender_address->state->name }} | Country: {{ $pre_order_package->sender_address->country->country_name }} | Zip: {{ $pre_order_package->sender_address->zip }}</option>
                                                    @foreach ($get_sender_address as $get_sender_address)
                                                        <option value="{{ $get_sender_address->id }}">Address: {{ $get_sender_address->address }} | City: {{ $get_sender_address->city->name }} | State: {{ $get_sender_address->state->name }} | Country: {{ $get_sender_address->country->country_name }} | Zip: {{ $pre_order_package->sender_address->zip }}</option>
                                                    @endforeach
                                                </select>
                                            <span style="color:red">{{$errors->first('get_sender_address')}}</span>
                                            </div>
                                            <div class="col-1 mt-4 pt-3">
                                                <a href="/sender_address/add/{{$sender->id}}" style="font-size: 18px; font-weight:700" class="bg-success rounded py-1 px-4 text-dark">+</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card py-3 px-2">
                                        <div class="mb-2">
                                            <h4><i data-feather="user" class="text-Danger"></i> Receiver Details</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-11">
                                                <label for="receiver">Receiver Name</label>
                                                <select class="mdb-select md-form form-control" id="receiver" name="receiver" value="{{old('receiver')}}">
                                                    <option value="{{ $pre_order_package->receiver->id }}" class="disabled">{{ $pre_order_package->receiver->name }} | {{ $pre_order_package->receiver->phone }}</option>
                                                    @foreach ($receiver as $receiver)
                                                        <option  value="{{$receiver->id}}">{{$receiver->name}} | {{$receiver->phone}}</option>
                                                    @endforeach
                                                </select>
                                                <span style="color:red">{{$errors->first('receiver')}}</span>
                                                <br>
                                            </div>
                                            <div class="col-1 mt-4 pt-3">
                                                <a href="/receiver" style="font-size: 18px; font-weight:700" class="bg-success rounded py-1 px-4 text-dark">+</a>
                                            </div>
                                        </div>
                                        <div class="form-group row receiver_address">
                                            <div class="col-12">
                                                <label for="receiver_address">receiver Address</label>
                                                <select class="form-control" name="receiver_address" value="{{old('receiver_address')}}" id="receiver_address">
                                                    <option value="{{ $pre_order_package->receiver_address_id }}" class="disabled">Address: {{ $pre_order_package->receiver_address->address }} | City: {{ $pre_order_package->receiver_address->city->name }} | State: {{ $pre_order_package->receiver_address->state->name }} | Country: {{ $pre_order_package->receiver_address->country->country_name }} | Zip: {{ $pre_order_package->receiver_address->zip }}</option>
                                                </select>
                                            <span style="color:red">{{$errors->first('receiver_address')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card py-3 px-2">
                                        <div class="mb-2">
                                            <h4><i data-feather="shopping-bag" class="text-primary"></i> Shipping Details</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 pb-3">
                                                <label for="packing_type" >Packing Type</label>
                                                <select class="mdb-select md-form form-control" id="packing_type" name="packing_type" value="{{old('packing_type')}}" >
                                                    <option  value="{{$pre_order_package->packingtype->id}}">{{$pre_order_package->packingtype->name}}</option>
                                                    @foreach ($packingtype as $packingtype)
                                                        <option value="{{ $packingtype->id }}">{{ $packingtype->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span style="color:red">{{$errors->first('packing_type')}}</span>
                                            </div>
                                            <div class="col-md-3 pb-3">
                                                <label for="shipping_mode" >Shipping Mode</label>
                                                <select class="mdb-select md-form form-control" id="shipping_mode" name="shipping_mode" value="{{old('shipping_mode')}}" >
                                                    <option value="{{$pre_order_package->shippingmode->id}}">{{$pre_order_package->shippingmode->name}}</option>
                                                    @foreach ($shippingmode as $shippingmode)
                                                        <option value="{{ $shippingmode->id }}">{{ $shippingmode->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span style="color:red">{{$errors->first('shipping_mode')}}</span>
                                            </div>
                                            <div class="col-md-3 pb-3">
                                                <label for="est_deli_date" >Estimated Delivery Date</label>
                                                <input type="date" class="md-form form-control" name="est_deli_date" min="{{ now()->toDateString('Y-m-d') }}" id="est_deli_date" value="{{old('est_deli_date') ?? $pre_order_package->est_deli_date}}">
                                                <span style="color:red">{{$errors->first('est_deli_date')}}</span>
                                            </div>
                                            <div class="col-md-3 pb-3">
                                                <label for="payment_method" >Payment Method</label>
                                                <select class="mdb-select md-form form-control" id="payment_method" name="payment_method" value="{{old('payment_method')}}" >
                                                    <option  value="{{$pre_order_package->payment_method->id}}">{{$pre_order_package->payment_method->name}}</option>
                                                    @foreach ($paymentmethod as $paymentmethod)
                                                        <option value="{{ $paymentmethod->id }}">{{ $paymentmethod->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span style="color:red">{{$errors->first('payment_method')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card py-3 px-2">
                                        <div class="mb-2">
                                            <h4><i data-feather="package" class="text-warning"></i> Pre Order Package Details</h4>
                                            {{-- <a href="javascript:void(0)" class="btn float-right bg-success text-white addRow"><i data-feather="plus"></i> Add Boxes or Packages </a> --}}
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table mb-0  table-hover" name="cart">
                                                <thead class="bg-primary text-light">
                                                    <tr>
                                                        <th scope="col" class="col-1">Quantity</th>
                                                        <th scope="col" class="col-3">Name</th>
                                                        <th scope="col" class="col-4">Category</th>
                                                        <th scope="col" class="col-1">Weight</th>
                                                        <th scope="col" class="col-1">Length</th>
                                                        <th scope="col" class="col-1">Width</th>
                                                        <th scope="col" class="col-1">Height</th>
                                                        <th scope="col" class="text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="package">
                                                    @foreach ($order as $order)
                                                        <tr>
                                                            <td style="display: none"><input type="hidden" name="id[]" id="id" value="{{old('id[]', $order->id)}}" class="form-control"></td>
                                                            <td><input type="number" name="number_of_box[]" id="number_of_box" value="{{old('number_of_box[]', $order->quantity)}}" min="1" class="form-control" required>
                                                                <span style="color:red">{{$errors->first('number_of_box')}}</span>
                                                            </td>
                                                            <td><input type="text" name="item_name[]" id="item_name" value="{{old('item_name[]', $order->name)}}" class="form-control" placeholder="Name" required>
                                                                <span style="color:red">{{$errors->first('item_name')}}</span>
                                                            </td>
                                                            <td>
                                                                <select class="mdb-select md-form form-control" id="packagetype" name="packagetype[]" required>
                                                                    <option value="{{old('packagetype[]', $order->packagetype->id)}}">{{ $order->packagetype->name }}</option>
                                                                        @foreach($packagetype as $key => $value)
                                                                            <option value="{{$key+1}}">{{$value->name}}</option>
                                                                        @endforeach
                                                                </select>
                                                                <span style="color:red">{{$errors->first('packagetype')}}</span>
                                                            </td>
                                                            <td><input type="number" name="weight[]" id="weight" value="{{old('weight[]', $order->weight)}}" class="form-control" placeholder="Kg" title="Weight (Kg)" required>
                                                                <span style="color:red">{{$errors->first('weight')}}</span>
                                                            </td>
                                                            <td><input type="number" name="length[]" id="length" value="{{old('length[]', $order->length)}}" class="form-control" placeholder="cm" title="length (cm)" required>
                                                                <span style="color:red">{{$errors->first('length')}}</span>
                                                            </td>
                                                            <td><input type="number" name="width[]" id="width" value="{{old('width[]', $order->width)}}" class="form-control" placeholder="cm" title="width (cm)" required>
                                                                <span style="color:red">{{$errors->first('width')}}</span>
                                                            </td>
                                                            <td><input type="number" name="height[]" id="height" value="{{old('height[]', $order->height)}}" class="form-control" placeholder="cm" title="height (cm)" required>
                                                                <span style="color:red">{{$errors->first('height')}}</span>
                                                            </td>
                                                            @if ($ordercount > 1)
                                                            <td><a title="Delete Order {{ $order->name }}" id='deleteOrder' data-id="{{ $order->id }}" class='btn bg-danger text-white deleteOrder'><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="price_per_kg" class="col-12">Price Kg:
                                                    <input type="number" name="price_per_kg" class="form-control" value='{{old('price_per_kg') ?? $pre_order_package->price_per_kg}}' readonly>
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="" class="col-12">Total Weight Kg:
                                                    <input type="number" name="total_kg_weight" class="form-control" value='{{old('total_kg_weight') ?? $pre_order_package->total_kg_weight}}'>
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="" class="col-12">Total Volumetric Weight Kg:
                                                    <input type="number" name="total_volumetric_weight" class="form-control" value='{{old('total_volumetric_weight') ?? $pre_order_package->total_volumetric_weight}}'>
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="" class="col-12">Calculate Weight Kg:
                                                    <input type="number" name="calculate_weight" class="form-control" value='{{old('calculate_weight') ?? $pre_order_package->calculate_weight}}'>
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="">
                                            <div class="float-right">
                                                <label for="">Courier Fee
                                                    <input type="number" name="courier_fee" class="form-control" value='0'>
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row col-12">
                                            <button type="submit" class="dec btn btn-primary btn-lg col-md-4 m-1">Submit</button>
                                            <button type="reset" class="dec btn btn-warning btn-lg col-md-3 m-1">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="receiver"]').on('change',function(){
            var receiver_id= $(this).val();
            if (receiver_id) {
                $.ajax({
                    url: "{{url('getReceiverAddress/')}}/"+receiver_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                    // console.log(data);
                        $('select[name="receiver_address"]').empty();
                        $.each(data,function(key,value){
                            $('select[name="receiver_address"]').append('<option value="'+key+'">'+value+'</option>');
                        });
                        $(".receiver_address").removeClass('hide');
                    }
                });
            }else {
                    $('select[name="receiver_address"]').empty();
            }
        });
    });
</script>

{{-- <script>
    $('.addRow').on('click', function(e){
        var tr = "<tr class='line_items'>"+
                    "<td><input type='number' name='number_of_box[]' id='number_of_box' value='1' min='1' class='form-control' required>"+
                        "<span style='color:red'>{{$errors->first('number_of_box')}}</span>"+
                    "</td>"+
                    "<td><input type='text' name='item_name[]' id='item_name' class='form-control' placeholder='Name' required>"+
                        "<span style='color:red'>{{$errors->first('item_name')}}</span>"+
                    "</td>"+
                    "<td>"+
                        "<select class='mdb-select md-form form-control' id='packagetype' name='packagetype[]'>"+
                            "<option value=''>Category</option>"+
                            "<option  value='1'>Accessory (no-battery)</option>"+
                            "<option  value='2'>Accessory (with battery)</option>"+
                            "<option  value='3'>Audio Video</option>"+
                            "<option  value='4'>Bags & Luggages</option>"+
                            "<option  value='5'>Books & Collectibles</option>"+
                            "<option  value='6'>Cameras</option>"+
                            "<option  value='7'>Computers & Laptops</option>"+
                            "<option  value='8'>Documents</option>"+
                            "<option  value='9'>Dry Food & Supplements</option>"+
                            "<option  value='10'>Fashion</option>"+
                            "<option  value='11'>Gaming</option>"+
                            "<option  value='12'>Health & Beauty</option>"+
                            "<option  value='13'>Home Appliances</option>"+
                            "<option  value='14'>Home Decor</option>"+
                            "<option  value='15'>Jewelry</option>"+
                            "<option  value='16'>Mobile Phones</option>"+
                            "<option  value='17'>Pet Accessory</option>"+
                            "<option  value='18'>Sauce</option>"+
                            "<option  value='19'>Sport & Leisure</option>"+
                            "<option  value='20'>Tablets</option>"+
                            "<option  value='21'>Toys</option>"+
                            "<option  value='22'>Watches</option>"+
                        "</select>"+
                        "<span style='color:red'>{{$errors->first('packagetype')}}</span>"+
                    "</td>"+
                    "<td><input type='number' name='weight[]' id='weight' class='form-control' min='0' placeholder='Kg' title='Weight (Kg)' required>"+
                        "<span style='color:red'>{{$errors->first('weight')}}</span>"+
                    "</td>"+
                    "<td><input type='number' name='length[]' id='length' class='form-control' min='0' placeholder='cm' title='length (cm)' required>"+
                        "<span style='color:red'>{{$errors->first('length')}}</span>"+
                    "</td>"+
                    "<td><input type='number' name='width[]' id='width' class='form-control' min='0' placeholder='cm' title='width (cm)' required>"+
                        "<span style='color:red'>{{$errors->first('width')}}</span>"+
                    "</td>"+
                    "<td><input type='number' name='height[]' id='height' class='form-control' min='0' placeholder='cm' title='height (cm)' required>"+
                        "<span style='color:red'>{{$errors->first('height')}}</span>"+
                    "</td>"+
                    "<td><a href='javascript:void(0)' id='deleteRow' class='btn bg-danger text-white deleteRow'> - </a></td required>"+
                "</tr>"
            $('tbody.package').append(tr);
    });
    $('tbody.package').on('click', '#deleteRow', function(){
        $(this).closest('tr').remove();
    });
</script> --}}

<script>
    $(".deleteOrder").click(function(){
        var r = confirm('Are You Sure to Delete This Order');
        var form = $('form');
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        var $tr = $(this).closest('tr');
        if (r == true) {
            $.ajax({
                url: "/pre_order/delete/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (){
                    //on success, hide  element user wants to delete.
                    $tr.find('td').fadeOut(1000,function(){
                            $tr.remove();
                        });
                        location.reload();
                }
            });
        }
    });
</script>
@endsection
