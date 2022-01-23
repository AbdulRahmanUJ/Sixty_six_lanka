@extends('layouts.superadmin.app')
@section('title', 'Edit City')
@section('content')
@section('dashboard_title', 'Edit City '. $city->name )
<section class="superadmin_edit_city">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="card col-12">
                <div class="card-body">
                    <form action="/superadmin/city/update_city/{{ $city->id }}" class="row" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group col-4">
                            <label for="city">City Name</label>
                            <input type="text" name="city_name" value="{{ $city->name }}" class="form-control" required>
                            @if ($errors->has('city_name'))
                                <span class="text-danger">{{ $errors->first('city_name') }}</span> <br>
                            @endif
                        </div>
                        <div class="col-12">
                            <button type="reset" class="btn bg-danger text-white float-right ml-1">Cancel</button>
                            <button type="submit" class="btn bg-success text-white float-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
