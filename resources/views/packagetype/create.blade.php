@extends('layouts.app')
@section('title','Create Package Type')
@section('content')
<div class="container">
    <a class="btn btn-primary float-right" href="{{ URL::previous() }}" role="button"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Go Back</a><br><br>
    <h1>Package Type</h1>
    <br>
    <form action="/packagetype" method="POST">
      @csrf
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Name">
            <span style="color:red">{{$errors->first('name')}}</span>
          </div>
        </div>
        <hr>
        <div class="form-row">
            <button type="submit" class="dec btn btn-primary btn-lg col-md-4">Submit</button>
            <span class="px-1 py-1"></span>
            <button type="reset" class="dec btn btn-warning btn-lg col-md-3">Cancel</button>
        </div>
      </form>
</div>
@endsection