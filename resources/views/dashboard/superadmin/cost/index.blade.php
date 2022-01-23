@extends('layouts.superadmin.app')
@section('title', 'Cost List')
@section('content')
@section('dashboard_title', 'Cost List')
<section class="superadmin_list_cost">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class=" float-right rounded bg-light mb-3">
                            <label for="" class="pt-3 pl-3 "><b>Add New Cost</b></label>
                            <form action="/superadmin/cost" method="POST" class="col-md-12 mb-5 mt-2">
                                @csrf
                                <label for="state">Name
                                    <input type="text" name="name" class="form-control" placeholder="Tax" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span> <br>
                                    @endif
                                </label>
                                <label for="state">Cost
                                    <input type="text" name="cost" class="form-control" placeholder="10.00" required>
                                    @if ($errors->has('cost'))
                                        <span class="text-danger">{{ $errors->first('cost') }}</span> <br>
                                    @endif
                                </label>
                                <div class="col-12">
                                    <button type="reset" class="btn bg-danger text-white float-right ml-1">Cancel</button>
                                    <button type="submit" class="btn bg-success text-white float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            @if (count($cost)>0)
                            <table class="table mb-0  table-hover">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Cost</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cost as $cost)
                                    <form action="/superadmin/cost/{{$cost->id}}" method="POST">
                                        @method('patch')
                                        @csrf
                                        <tr>
                                            <td>
                                                {{ $cost->name }}
                                            </td>
                                            <td class="col-md-3">
                                                <input type="text" name="new_cost" class="form-control" value="{{ $cost->cost }}">
                                            </td>
                                            <td class="d-flex justify-content-sm-center">
                                                    <button type="submit" title="Update Cost {{$cost->name}}" class="border-0 bg-transparent p-0"><i class="text-primary" data-feather="edit"></i></button>
                                            </td>
                                        </tr>
                                    </form>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <h3>No cost Available</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
