@extends('layouts.app')
@section('title','Edit Package Type '.$packagetype->name)
@section('content')
<div class="container">
    <a class="btn btn-primary float-right" href="{{ URL::previous() }}" role="button"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Go Back</a><br><br>
    <h2>Edit Package Type <b>{{$packagetype->name}}</b></h2>
    <form action="/packagetype/{{$packagetype->id}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="name">Package Type Name</label>
            <input type="text" name="name" value="{{ old('$name') ?? $packagetype->name }}" class="form-control" id="name" placeholder="Name">
            <span style="color:red">{{$errors->first('name')}}</span>
          </div>
        </div>
        <hr>
        <div class="form-row">
            <button type="submit" class="dec btn btn-primary btn-lg col-md-4"onclick="return confirm('Are you sure you want to Update Receiver {{$packagetype->name}}?');">Update</button>
            <span class="px-1 py-1"></span>
            <button type="reset" class="dec btn btn-warning btn-lg col-md-3">Cancel</button>
        </div>
      </form>
</div>
@endsection