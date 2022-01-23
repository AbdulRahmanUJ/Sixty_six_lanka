@extends('layouts.superadmin.app')
@section('title', 'Edit Country')
@section('content')
@section('dashboard_title', 'Edit Country '. $country->country_name )
<section class="superadmin_edit_country">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="card col-12">
                <div class="card-body">
                    <form action="/superadmin/country/update_country/{{ $country->id }}" class="row" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group col-4">
                            <label for="state">Country Name</label>
                            <input type="text" name="country_name" value="{{ $country->country_name }}" class="form-control" placeholder="Ex: United States" required>
                            @if ($errors->has('country_name'))
                                <span class="text-danger">{{ $errors->first('country_name') }}</span> <br>
                            @endif
                        </div>

                        <div class="form-group col-4">
                            <label for="state">Country Sort</label>
                            <input type="text" name="sort" value="{{ $country->sort }}" class="form-control" placeholder="Ex: US" required>
                            @if ($errors->has('sort'))
                                <span class="text-danger">{{ $errors->first('sort') }}</span> <br>
                            @endif
                        </div>

                        <div class="form-group col-4">
                            <label for="state">Phone Code</label>
                            <input type="text" name="phone_code" value="{{ $country->phoneCode }}"  class="form-control" placeholder="Ex: +1" required>
                            @if ($errors->has('phone_code'))
                                <span class="text-danger">{{ $errors->first('phone_code') }}</span> <br>
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
