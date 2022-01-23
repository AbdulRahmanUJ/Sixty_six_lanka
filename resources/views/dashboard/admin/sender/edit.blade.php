@extends('layouts.admin.app')
@section('title', 'Admin | Sender')
@section('content')
@section('dashboard_title', 'Sender')
<section class="admin_edit_sender">
    <div class="card py-4 px-2">
        <form action="/admin/sender/{{ $sender->id }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{old('name') ?? $sender->name }}" class="form-control" id="name" placeholder="Name">
                    <span style="color:red">{{$errors->first('name')}}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" value="{{old('phone') ?? $sender->phone }}" class="form-control" id="phone" placeholder="Phone Number">
                    <span style="color:red">{{$errors->first('phone')}}</span>
                </div>
            </div>
            <div class="form-row px-1 float-right">
                <button type="submit" class="dec btn btn-primary btn-lg">Update</button> &nbsp;
                <button type="reset" class="dec btn btn-danger btn-lg">Cancel</button>
            </div>
        </form>
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
    </script>
@endsection
