@extends('layout.master')

@section('page-title')
    New Inventory
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-12 col-md-8 mt-4">
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
                            <a href="#" class="btn btn-outline-primary btn-sm">Edit</a>
                            <a href="#" class="btn btn-outline-danger btn-sm" onclick='event.preventDefault(); document.getElementById("delete-inventory-form-{{$key}}").submit();'>
                                Delete
                                <form id="delete-inventory-form-{{$key}}" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
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