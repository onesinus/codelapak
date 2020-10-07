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
                    <center><h4>Codelapak Apps</h4></center>
                    <form method="GET" action="{{ url('home') }}" accept-charset="UTF-8" role="search">
                        <input type="text" class="form-control" name="search" value="{{ request('searc') }}" placeholder="Search Product name or Produt Category" autocomplete="off">
                    </form>
                </div>

                <div class="panel-body">
                    <div style="height: 375px; overflow-x: auto;">
                        @foreach($product as $p)
                        <div class="card col-md-4" style="margin-bottom: 3%;">
                            <?php
                                $ProductImg = asset('public/img/products/'.$p->filename.'');
                            ?>
                            <img class="card-img-top" src="{{ $ProductImg }}" alt="Application Image" style="height: 250px; width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">{{$p->category}}</h5>
                                <p class="card-text">{{$p->name}} @ {{number_format($p->price,2)}}</p>
                                <button id_product="{{$p->id_product}}" price="{{$p->price}}" class="btn btn-success buy">Buy</button>
                                <a href="{{url('product_detail/'.$p->id)}}" class="btn btn-primary">Detail</a>
                                @if(!empty($p->link_demo))
                                    <a href="{{$p->link_demo}}" target="_blank" class="btn btn-warning">Demo</a>
                                @endif
                            </div>
                        </div>
                        @endforeach
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
