@extends('layouts.superadmin.app')
@section('title', 'Super Admin | Create Package')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>


<style>
    .medium label:hover{
        cursor: pointer;
    }
    thead tr th{
        font-size: 12px;
        text-align: center;
        justify-content: center;
    }
    .price tbody tr td{
        margin: auto 0px;
        padding: 5px;
        border: none;
        text-align: center;
        margin: auto;
    }
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
@section('content')
@section('dashboard_title', 'Create New Package')
<section class="superadmin_package_create">
    <form action="/superadmin/package" name="package" id="cart" method="POST">
        @csrf
        <div class="card py-3 px-2">
            <div class="mb-2">
                <h4><i data-feather="send" class="text-success"></i> Sender Details</h4>
            </div>
            <div class="row">
                <div class="col-11">
                    <label for="sender">Sender Name</label>
                    <select class="mdb-select md-form form-control" id="sender" name="sender" value="{{old('sender')}}">
                        <option  value="">Select Sender</option>
                        @foreach ($sender as $sender)
                            <option  value="{{$sender->id}}">{{$sender->name}} | {{$sender->phone}}</option>
                        @endforeach
                    </select>
                    <span style="color:red">{{$errors->first('sender')}}</span>
                    <br>
                </div>
                <div class="col-1 mt-3 pt-3">
                    <a href="/superadmin/sender" style="font-size: 18px; font-weight:700" class="bg-success rounded py-1 px-4 text-dark">+</a>
                </div>
            </div>
            <div class="form-group row sender_address">
                <div class="col-12">
                    <label for="sender_address">Sender Address</label>
                    <select class="form-control" name="sender_address" value="{{old('sender_address')}}" id="sender_address">
                        <option value="" class="disabled">Select Sender Address</option>
                    </select>
                <span style="color:red">{{$errors->first('sender_address')}}</span>
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
                        <option  value="">Select receiver</option>
                        @foreach ($receiver as $receiver)
                            <option  value="{{$receiver->id}}">{{$receiver->name}} | {{$receiver->phone}}</option>
                        @endforeach
                    </select>
                    <span style="color:red">{{$errors->first('receiver')}}</span>
                    <br>
                </div>
                <div class="col-1 mt-3 pt-3">
                    <a href="/superadmin/receiver" style="font-size: 18px; font-weight:700" class="bg-success rounded py-1 px-4 text-dark">+</a>
                </div>
            </div>
            <div class="form-group row receiver_address">
                <div class="col-12">
                    <label for="receiver_address">receiver Address</label>
                    <select class="form-control" name="receiver_address" value="{{old('receiver_address')}}" id="receiver_address">
                        <option value="" class="disabled">Select receiver Address</option>
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
                <div class="col-md-4 pb-3">
                    <label for="packing_type" >Packing Type</label>
                    <select class="mdb-select md-form form-control" id="packing_type" name="packing_type" value="{{old('packing_type')}}" >
                        <option  value="">Select Packing Type</option>
                        @foreach ($packingtype as $packingtype)
                            <option value="{{ $packingtype->id }}">{{ $packingtype->name }}</option>
                        @endforeach
                    </select>
                    <span style="color:red">{{$errors->first('packing_type')}}</span>
                </div>
                <div class="col-md-4 pb-3">
                    <label for="shipping_mode" >Shipping Mode</label>
                    <select class="mdb-select md-form form-control" id="shipping_mode" name="shipping_mode" value="{{old('shipping_mode')}}" >
                        <option  value="">Select Shipping Mode</option>
                        @foreach ($shippingmode as $shippingmode)
                            <option value="{{ $shippingmode->id }}">{{ $shippingmode->name }}</option>
                        @endforeach
                    </select>
                    <span style="color:red">{{$errors->first('shipping_mode')}}</span>
                </div>
                <div class="col-md-4 pb-3">
                    <label for="est_deli_date" >Estimated Delivery Date</label>
                    <input type="date" class="md-form form-control" name="est_deli_date" min="{{ now()->toDateString('Y-m-d') }}" id="est_deli_date" value="{{old('est_deli_date')}}">
                    <span style="color:red">{{$errors->first('est_deli_date')}}</span>
                </div>
                <div class="col-md-4 pb-3">
                    <label for="payment_method" >Payment Method</label>
                    <select class="mdb-select md-form form-control" id="payment_method" name="payment_method" value="{{old('payment_method')}}" >
                        <option  value="">Select Payment Method</option>
                        @foreach ($paymentmethod as $paymentmethod)
                            <option value="{{ $paymentmethod->id }}">{{ $paymentmethod->name }}</option>
                        @endforeach
                    </select>
                    <span style="color:red">{{$errors->first('payment_method')}}</span>
                </div>
                <div class="col-md-4 pb-3">
                    <label for="delivery_status" >Delivery Status</label>
                    <select class="mdb-select md-form form-control" id="delivery_status" name="delivery_status" value="{{old('delivery_status')}}" >
                        <option  value="">Select Delivery Status</option>
                        @foreach ($deliverystatus as $deliverystatus)
                            <option value="{{ $deliverystatus->id }}">{{ $deliverystatus->name }}</option>
                        @endforeach
                    </select>
                    <span style="color:red">{{$errors->first('delivery_status')}}</span>
                </div>
            </div>
        </div>
        <div class="card py-3 px-2">
            <div class="mb-2">
                <h4><i data-feather="package" class="text-warning"></i> Package Details</h4>
                <a href="javascript:void(0)" class="btn float-right bg-success text-white addRow"><i data-feather="plus"></i> Add Boxes or Packages </a>
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
                        <tr class="line_items">
                            <td><input type="number" name="number_of_box[]" id="number_of_box" value="1" min="1" class="form-control" required>
                                <span style="color:red">{{$errors->first('number_of_box')}}</span>
                            </td>
                            <td><input type="text" name="item_name[]" id="item_name" class="form-control" placeholder="Name" required>
                                <span style="color:red">{{$errors->first('item_name')}}</span>
                            </td>
                            <td>
                                <select class="mdb-select md-form form-control" id="packagetype" name="packagetype[]" required>
                                    <option value="">Category</option>
                                    @foreach ($packagetype as $packagetype)
                                        <option  value="{{$packagetype->id}}">{{$packagetype->name}}</option>
                                    @endforeach
                                </select>
                                <span style="color:red">{{$errors->first('packagetype')}}</span>
                            </td>
                            <td><input type="number" name="weight[]" id="weight" class="form-control" min='0' placeholder="Kg" title="Weight (Kg)" required>
                                <span style="color:red">{{$errors->first('weight')}}</span>
                            </td>
                            <td><input type="number" name="length[]" id="length" class="form-control" min='0' placeholder="cm" title="length (cm)" required>
                                <span style="color:red">{{$errors->first('length')}}</span>
                            </td>
                            <td><input type="number" name="width[]" id="width" class="form-control" min='0' placeholder="cm" title="width (cm)" required>
                                <span style="color:red">{{$errors->first('width')}}</span>
                            </td>
                            <td><input type="number" name="height[]" id="height" class="form-control" min='0' placeholder="cm" title="height (cm)" required>
                                <span style="color:red">{{$errors->first('height')}}</span>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table mb-0 price" name="package">
                    <tbody>
                        <tr name="line_items" style="border-bottom: 1px solid #c9c9c9">
                            <td class=""></td>
                            <td class="">Sub Total</td>
                            <td class="col-3"><input type="number" name="sub_total" class="form-control text-right col-5 float-right" jAutoCalc="{weight} * {price_per_kg}" value='' required></td>
                        </tr>
                        <tr class="line_items">
                            <td class="float-left"><label for="price_per_kg">Price Kg:</label></td>
                            <td class="float-left"><input type="number" name="price_per_kg" class="form-control" value='{{ $price_per_kg }}' readonly></td>
                            <td class="float-right"><label for="discount">Discount %</label></td>
                            <td class=""><input type="number" name="discount" min="0" max="100" class="form-control text-right" value='{{ $discount }}' readonly></td>
                            <td class="text-right"><input type="number" name="" class="form-control float-right text-right col-5" value='0'></td>
                        </tr>
                        <tr class="line_items">
                            <td class="float-left"><label for="">Total Weight Kg:</label></td>
                            <td class="float-left"><input type="number" name="total_kg_weight" class="form-control" value='{{old('total_kg_weight')}}'></td>
                            <td class="float-right"><label for="tax_rate">Tax %</label></td>
                            <td class=""><input type="number" name="tax_rate" min="0" max="100" class="form-control text-right" value='{{ $tax }}' readonly></td>
                            <td class="text-right"><input type="number" name=""  class="form-control float-right text-right col-5" value='0'></td>
                        </tr>
                        <tr class="line_items">
                            <td class="float-left"><label for="">Total Volumetric Weight Kg:</label></td>
                            <td class="float-left"><input type="number" name="total_volumetric_weight" class="form-control" value='{{old('total_volumetric_weight')}}'></td>
                            <td class="float-right"><label for="re_expedition">Re Expedition</label></td>
                            <td class=""><input type="number" name="re_expedition" min="0" max="100" class="form-control text-right" value='{{ $re_expedition }}' readonly></td>
                            <td class="text-right"><input type="number" name=""  class="form-control float-right text-right col-5" value='0'></td>
                        </tr>
                        <tr class="line_items">
                            <td class="float-left"><label for="">Calculate Weight Kg:</label></td>
                            <td class="float-left"><input type="number" name="calculate_weight" class="form-control" value='{{old('calculate_weight')}}'></td>
                            <td class="float-right"><label for="shipping_insurance">Shipping Insurance</label></td>
                            <td class=""><input type="number" name="shipping_insurance" min="0" max="100" class="form-control text-right" value='{{ $shipping_insurance }}' readonly></td>
                            <td class="text-right"><input type="number" name=""  class="form-control float-right text-right col-5" value='0'></td>
                        </tr>
                        <tr class="line_items">
                            <td class="float-left"></td>
                            <td class="float-left"></td>
                            <td class="float-right"><label for="customs_tariffs">Customs Tariffs</label></td>
                            <td class=""><input type="number" name="customs_tariffs" min="0" max="100" class="form-control text-right" value='{{ $customs_tariffs }}' readonly></td>
                            <td class="text-right"><input type="number" name=""  class="form-control float-right text-right col-5" value='0'></td>
                        </tr>
                        <tr class="line_items" style="border-top: 1px solid #c9c9c9">
                            <td class=""></td>
                            <td class="float-right pt-3">Courier Fee</td>
                            <td class=""><input type="number" name="courier_fee" class="form-control float-right text-right col-5" value='0'></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row col-12">
                <button type="submit" class="dec btn btn-primary btn-lg col-md-4 m-1">Submit</button>
                <button type="reset" class="dec btn btn-warning btn-lg col-md-3 m-1">Cancel</button>
            </div>
        </div>
    </form>
</section>

<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="sender"]').on('change',function(){
            var sender_id= $(this).val();
            if (sender_id) {
                $.ajax({
                    url: "{{url('getSenderAddress/')}}/"+sender_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                    // console.log(data);
                        $('select[name="sender_address"]').empty();
                        $.each(data,function(key,value){
                            $('select[name="sender_address"]').append('<option value="'+key+'">'+value+'</option>');
                        });
                        $(".sender_address").removeClass('hide');
                    }
                });
            }else {
                    $('select[name="sender_address"]').empty();
            }
        });
    });
</script>

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

<script>
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
</script>
<script>
    function autoCalcSetup(){
        $('form[name=package]').jAutoCalc('destroy');
        $('form[name=package] tr[name=sub_total]').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero:true});
        $('form[name=package]').jAutoCalc({decimalPlaces: 2});
    }
</script>

<script>
$(document).ready(function(){

 $('#country_name').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#countryList').fadeIn();
                    $('#countryList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){
        $('#country_name').val($(this).text());
        $('#countryList').fadeOut();
    });

});
</script>
@endsection
