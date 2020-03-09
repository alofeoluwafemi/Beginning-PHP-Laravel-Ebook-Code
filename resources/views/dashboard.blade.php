@extends('layout.master')

@section('page-title')
    Welcome
@endsection

@section('content')
    <div class="container-fluid">
        <div class="alert alert-success mt-4" role="alert">
            <h4 class="alert-heading">Welcome!</h4>
            <p>{{auth()->user()->name}}, you have successfully logged in. There are <strong>3</strong> items in our inventory.</p>
            <hr>
        </div>
    </div>
@endsection