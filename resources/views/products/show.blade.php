@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>{{$product->name}}</h3></div>
                <div class="panel-body">
                    <form method="get" action="{{url('/products')}}">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{ $product->name }}" readonly>
                        <label for="qty">Name</label>
                        <input type="text" class="form-control" value="{{ number_format($product->qty,2) }}" readonly>
                        <label for="price">Price</label>
                        <input type="text" class="form-control" value="{{ number_format($product->price,2) }}" readonly>

                        <br/>
                        
                        <div class="row">
                            <div class="col-md-4">   
                                <a class="form-control btn btn-success" href="{{ url('/products/' . $product->id . '/edit') }}"><i class="fa fa-pencil"></i> Edit Data</a>                                
                            </div>
                            <div class="col-md-4">   
                                <a class="form-control btn btn-warning" href="{{ url('/products/' . $product->id . '/add_picture') }}"><i class="fa fa-folder"></i> Product Pictures</a>                                
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="form-control btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Return To List</button>
                            </div>
                        </div><!-- end panel-footer -->
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection