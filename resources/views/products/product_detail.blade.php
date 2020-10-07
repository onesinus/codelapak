@extends('layouts.app')

@section('content')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head> 
<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div style="float: left"><a href="{{url('home')}}"><button class="btn btn-light">Back</button></a></div>
                    <div style="float: right"><button class="btn btn-primary buy" id_product="{{$product->id}}" price="{{$product->price}}">Add to cart</button></div>
                    <div style="margin: 0 auto; width: 100px;"><h5>Detail Product</h5></div>
                </div>

                <div class="panel-body">
                    <div>
                        <table class="table table-hover">
                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->name}}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{number_format($product->price,2)}}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{$product->category}}</td>
                            </tr>
                                <th>Rating</th>
                                <td>{{$product->rating}}</td>
                            </tr>
                        </table>
                        <div class="row" style="height: 250px; overflow-x: auto;">
                            @foreach($product_images as $pi)
                                @php
                                    $ProductImg = asset('public/img/products/'.$pi->filename.'');
                                @endphp

                            <div class="col-md-4">
                                <img class="card-img-top" src="{{ $ProductImg }}" alt="Application Image" style="height: 250px; width: 100%;">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var add_product_url     = "{{url('home/addProductToChart')}}";
    var id_user_login       = "{{$id_user_login}}";
    var url_login           = "{{url('login')}}";
    var url_app_login       = "{{url('home/indexNeedLogin')}}";
    var url_cart_detail     = "{{url('cart_detail')}}";
</script>
<script src="{{ asset('public/js/home.js') }}"></script>
@endsection
