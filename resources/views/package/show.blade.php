@extends('layouts.app')
@section('title','Packages of '.$package->receiver->name)
@section('content')
    <section class="package_show">
        <div class="container">
            <a class="btn btn-primary float-right" href="{{ URL::previous() }}" role="button"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Go Back</a><br><br>
            <div class="col-md-12">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Receiver ID - {{$package->receiver_id}}</h6>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Receiver Name</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->receiver->name}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->receiver->address}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Country</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->receiver->country}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">State</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->receiver->state}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">City</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->receiver->city}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Zip</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->receiver->zip}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->receiver->phone}}
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Track Number</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->track_no}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Estimate Weight</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->est_weight}} Kg
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Type</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->type}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Item Name</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->item_name}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Number of Box</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->num_of_box}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Medium</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->medium}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">date</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$package->created_at->format('Y-m-d')}} {{-- ->diffForHumans() //this is show create ago time --}}
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row container justify-content-right">
                <a href="/package/edit/{{$package->id}}" class="btn icon pencil"><i class="fa fa-pencil" aria-hidden="true"> Edit</i></a>
                <a href="/package/preview/{{$package->id}}" class="btn icon print"><i class="fa fa-print" aria-hidden="true"> Preview</i></a>
                <form action="/package/delete/{{$package->id}}" class="col-6" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn icon trash" onclick="return confirm('Are you sure you want to delete {{$package->track_no}} Package of {{$package->receiver->name}}');"><i class="fa fa-trash" aria-hidden="true"> Delete</i></button>
                </form>
            </div>
        </div>
    </section>
@endsection