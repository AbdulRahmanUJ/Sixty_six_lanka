@extends('layouts.app')
@section('title', 'Edit Receiver Address')
@section('content')
@section('dashboard_title', 'Edit Receiver Address')
<section class="edit_receiver_address container">
    <div class="card">
        <div class="card-body">
            <form action="/receiver_address/{{ $receiver_address->id }}" name="receiver_form" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{old('address')}} {{ $receiver_address->address }}" class="form-control" id="inputAddress" placeholder="Address" required>
                        <span style="color:red">{{$errors->first('address')}}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="country">Country</label>
                        <select name="country" id="country" value="{{old('country')}}" class="form-control" required>
                            <option value="{{ $receiver_address->country_id }}">{{ $receiver_address->country_name }}</option>
                            @foreach($countries as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <span style="color:red">{{$errors->first('country')}}</span>
                    </div>
                    <div class="form-group col-md-4 state hide">
                        <label for="state">State / Atoll</label>
                        <select class="form-control" name="state" value="{{old('state')}}" id="state" required>
                            <option value="{{ $receiver_address->state_id }}">{{ $receiver_address->state_name }}</option>
                            </select>
                        <span style="color:red">{{$errors->first('state')}}</span>
                    </div>
                    <div class="form-group col-md-2 city hide">
                        <label for="city">City</label>
                        <select class="form-control" name="city" value="{{old('city')}}" id="city" required>
                            <option value="{{ $receiver_address->city_id }}">{{ $receiver_address->city_name }}</option>
                            </select>
                        <span style="color:red">{{$errors->first('city')}}</span>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip Number</label>
                        <input type="text" name="zip" value="{{old('zip')}} {{ $receiver_address->zip }}" class="form-control" id="inputZip" placeholder="150600" required>
                        <span style="color:red">{{$errors->first('zip')}}</span>
                    </div>
                </div>
                <div class="flex text-right">
                    <button type="submit" class="dec btn btn-primary btn-lg col-md-2">Update</button>
                    <button type="reset" class="dec btn btn-danger btn-lg col-md-2" onClick="refreshPage()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="country"]').on('change',function(){
            var country_id= $(this).val();
            if (country_id) {
                $.ajax({
                    url: "{{url('getState/')}}/"+country_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                    // console.log(data);
                        $('select[name="state"]').empty();
                        $.each(data,function(key,value){
                            $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');
                        });
                        $(".state").removeClass('hide');
                        $('select[name="city"]').empty();
                    }
                });
            }else {
                    $('select[name="state"]').empty();
            }
        });
            $('select[name="state"]').on('change',function(){
            var state_id= $(this).val();
            if (state_id) {
                    $.ajax({
                    url: "{{url('getCity/')}}/"+state_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        // console.log(data);
                        $('select[name="city"]').empty();
                        $.each(data,function(key,value){
                            $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');
                        });
                        $(".city").removeClass('hide');
                    }
                });
            }else {
                    $('select[name="city"]').empty();
            }
        });
    });

    function refreshPage(){
        window.location.reload();
    }

</script>


@endsection
