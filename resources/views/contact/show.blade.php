@extends('layouts.app')
@section('title','Email of '.$email->name)
@section('content')
    <div class="container">
        <h4>Sender Name: {{$email->name}}</h4>
        <h5>Phone: {{$email->phone}}</h5>
        <h5>E-Mail: {{$email->email}}</h5>
        <p>Message: {{$email->content}}</p>
    </div>
@endsection
