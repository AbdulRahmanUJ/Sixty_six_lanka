@extends('layouts.superadmin.app')
@section('title', 'Edit State')
@section('content')
@section('dashboard_title', 'Edit State '. $state->name )
<section class="superadmin_edit_state">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="card col-12">
                <div class="card-body">
                    <form action="/superadmin/state/update_state/{{ $state->id }}" class="row" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group col-4">
                            <label for="state">State Name</label>
                            <input type="text" name="state_name" value="{{ $state->name }}" class="form-control" placeholder="Ex: United States" required>
                            @if ($errors->has('state_name'))
                                <span class="text-danger">{{ $errors->first('state_name') }}</span> <br>
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
