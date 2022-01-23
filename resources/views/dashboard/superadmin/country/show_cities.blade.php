@extends('layouts.superadmin.app')
@section('title', 'Cities list of '.$state->name)
@section('content')
@section('dashboard_title', 'Cities list of '.$state->name)
<section class="superadmin_state">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="col-md-12">
                <div class="card-body col-md-5 float-right">
                    <form action="/superadmin/city/{{ $state->id  }}" method="POST">
                        @csrf
                        <label for="state">Add New City for <b>{{ $state->name }}</b></label>
                        <input type="text" name="name" class="form-control mb-2" placeholder="Name of City" required>
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
                        @if (count($cities)>0)
                        <table class="table table-hover">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <td>
                                        {{ $city->name }}
                                    </td>
                                    <td class="d-flex justify-content-sm-center">
                                        <a href="/superadmin/city/edit_city/{{$city->id}}" title="Edit city {{$city->name}}"><i class="text-success" data-feather="edit"></i></a>
                                        <form action="/superadmin/city/delete/{{$city->id}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" title="Delete city {{$city->name}}" class="border-0 bg-transparent p-0" onclick="return confirm('Are you sure you want to delete city {{$city->name}}');"><i class="text-danger" data-feather="trash-2"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <h3>No cities Available</h3>
                        @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
