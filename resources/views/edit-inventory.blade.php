@extends('layout.master')

@section('page-title')
    Edit Inventory
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-12 col-md-8 mt-4">
            <form method="POST" action="{{route('inventory.update',$inventory->id)}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="item">Item</label>
                    <input type="text" class="form-control" value="{{old('item',$inventory->item)}}" id="item" name="item" placeholder='e.g 32" Television'>
                    @if ($errors->has('item'))
                        <small class="form-text text-danger">
                            {{ $errors->first('item') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control"  value="{{old('item',$inventory->quantity)}}" id="quantity" name="quantity" placeholder="e.g 50">
                    @if ($errors->has('quantity'))
                        <small class="form-text text-danger">
                            {{ $errors->first('quantity') }}
                        </small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Inventory</button>
            </form>
        </div>
    </div>
@endsection