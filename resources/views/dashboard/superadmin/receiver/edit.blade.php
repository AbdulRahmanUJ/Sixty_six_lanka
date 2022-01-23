@extends('layouts.superadmin.app')
@section('title', 'Super Admin | Receivers')
@section('content')
@section('dashboard_title', 'Receivers')
<section class="superadmin_edit_receiver">
    <div class="card py-4 px-2">
        <form action="/superadmin/receiver/{{ $receiver->id }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-7">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{old('name') ?? $receiver->name }}" class="form-control" id="name" placeholder="Name">
                    <span style="color:red">{{$errors->first('name')}}</span>
                </div>
                <div class="form-group col-md-5">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" value="{{old('phone') ?? $receiver->phone }}" class="form-control" id="phone" placeholder="Phone Number">
                    <span style="color:red">{{$errors->first('phone')}}</span>
                </div>
            </div>
                <hr>
                <div class="flex text-right">
                    <button type="submit" class="dec btn btn-primary btn-lg col-md-4">Update</button>
                    <button type="reset" class="dec btn btn-danger btn-lg col-md-3">Cancel</button>
                </div>
        </form>
    </div>
</section>
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
                        }
                    });
                }else {
                        $('select[name="city"]').empty();
                }
            });
            });
    </script>
@endsection
