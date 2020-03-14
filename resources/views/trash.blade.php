@extends('layout.master')

@section('page-title')
    Trash
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-12 col-md-8 mt-4">
            @if(session()->has('message'))
                <div class="alert alert-info">
                    {{session('message')}}
                </div>
            @endif
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($inventories as $key => $inventory)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$inventory->item}}</td>
                        <td>{{$inventory->quantity}}</td>
                        <td>
                            <a href="{{route('inventory.restore',$inventory->id)}}" class="btn btn-outline-primary btn-sm">Restore</a>
                            <a href="#" class="btn btn-outline-danger btn-sm" onclick='event.preventDefault(); document.getElementById("delete-inventory-form-{{$key}}").submit();'>
                                Purge
                                <form id="delete-inventory-form-{{$key}}" action="{{ route('inventory.purge',$inventory->id) }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                </form>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection