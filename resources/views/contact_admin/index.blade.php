@extends('layouts.app')
@section('title','E-mails Lists')
@section('content')
    <div class="container">
        <div class="table">
            <table class="table">
                <tr class="text-center bg-info text-white font-weight-bold text-uppercase">
                    <td>Name</td>
                    <td>phone</td>
                    <td>E-mail</td>
                    <td>Message</td>
{{--                    <td>Action</td>--}}
                </tr>
                @if (count($emails)>0)
                    @foreach ($emails as $email)
                        <tr class="text-center bg-light">
                            <td><a href="/contact/show/{{$email->id}}">{{$email->name}}</a></td>
                            <td>{{$email['phone']}}</td>
                            <td><a href="mailto:{{$email['email']}}">{{$email['email']}}</a></td>
                            <td>{{$email['content']}}</td>
{{--                            <td class="float-right d-flex flex-row">--}}
{{--                                <a href="/contact/show/{{$email->id}}"><i class="fa icon eye fa-eye" aria-hidden="true"></i></a>--}}
                                {{-- <form action="/package/delete/{{$package->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="icon" onclick="return confirm('Are you sure you want to delete {{$package->track_no}} Package of {{$package->receiver->name}}');"> <i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form> --}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                @else
                    <h2 style="color: gray" class="col-12 text-center">E-mails Not Found</h2>
                @endif
            </table>
        </div>
        <div class="row justify-content-center align-center">
            {{$emails->links('pagination::bootstrap-4')}}
        </div>
    </div>
@endsection
