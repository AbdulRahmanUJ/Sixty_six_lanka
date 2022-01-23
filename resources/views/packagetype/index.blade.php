@extends('layouts.app')
@section('title','Package Type Lists')
@section('content')
<div class="container">
    <a href="/packagetype/create" class="btn btnres float-right" role="button">New Package Type &nbsp; <i class="fa fa-plus" aria-hidden="true"></i></a><br><br>

    <div class="table">
        <table class="table">
            <thead>
                <tr class="text-center bg-info text-white font-weight-bold text-uppercase">
                    <td class="text-center">Name</td>
                    <td class="text-left">Action</td>
                </tr>
            </thead>
            @if (count($packagetypes)>0) 
                @foreach ($packagetypes as $packagetype)
                    <tr class="bg-light text-center">
                        <td><a href="packagetype/show/{{$packagetype->id}}">{{$packagetype->name}}</a></td>
                        <td class="float-center d-flex flex-row">
                            <a href="packagetype/show/{{$packagetype->id}}" title="View Package Type {{$packagetype->name}}"><i class="fa icon eye fa-eye" aria-hidden="true"></i></a>
                            <a href="packagetype/edit/{{$packagetype->id}}" title="Edit Package Type {{$packagetype->name}}"><i class="fa icon pencil fa-pencil" aria-hidden="true"></i></a>
                            <form action="packagetype/delete/{{$packagetype->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" title="Delete Package Type {{$packagetype->name}}" class="icon"onclick="return confirm('Are you sure you want to delete Package Type {{$packagetype->name}}');"> <i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <h2 style="color: gray" class="col-12 text-center">Package Type Not Found</h2> 
            @endif
        </table>
    </div>
    <div class="row justify-content-center align-center">
        {{$packagetypes->links('pagination::bootstrap-4')}}
    </div>
</div>
@endsection