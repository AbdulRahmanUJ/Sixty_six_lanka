@extends('layouts.superadmin.app')
@section('title', 'States List of '.$country->country_name)
@section('content')
@section('dashboard_title', 'States list of '. $country->country_name)
<section class="superadmin_state_list">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="col-md-12">
                <div class="card-body col-md-7 float-left">
                    <label for="">Name: <b>{{ $country->country_name }}</b> </label> <br>
                    <label for="">Sort: <b>{{ $country->sort }}</b> </label> <br>
                    <label for="">Phone Code: <b>{{ $country->phoneCode }}</b> </label>
                </div>
                <div class="card-body col-md-5 float-right">
                    <form action="/superadmin/state/{{ $country->id }}" method="POST">
                        @csrf
                        <label for="state">Add New State for <b>{{ $country->country_name }}</b></label>
                        <input type="text" name="name" class="form-control mb-2" placeholder="Name of State" required>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span> <br>
                        @endif
                        <button type="reset" class="btn bg-danger text-white float-right ml-1">Cancel</button>
                        <button type="submit" class="btn bg-success text-white float-right">Submit</button>
                    </form>
                </div>
            </div>
            <div class="card-body col-md-12">
                <div class="table-responsive">
                        @if (count($states)>0)
                        <table class="table table-hover">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($states as $state)
                                <tr>
                                    <td>
                                        <a href="/superadmin/state/show/{{$state->id}}" title="View country {{$state->name}}">
                                            {{ $state->name }}
                                        </a>
                                    </td>
                                    <td class="d-flex justify-content-sm-center">
                                        <a href="/superadmin/state/edit_state/{{$state->id}}" title="Edit state {{$state->name}}"><i class="text-success" data-feather="edit"></i></a>
                                        <form action="/superadmin/state/delete/{{$state->id}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" title="Delete state {{$state->name}}" class="border-0 bg-transparent p-0" onclick="return confirm('Are you sure you want to delete state {{$state->name}}');"><i class="text-danger" data-feather="trash-2"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <h3>No states Available</h3>
                        @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
