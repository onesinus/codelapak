@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('public/css/cart_cart_detail.css')}}">
<div class="container panel panel-default panel-body">
	<table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $totalBayar = 0; ?>
            @foreach($get_products as $product)                
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <?php
                            $ProductImg = asset('public/img/products/'.$product->filename.'');
                        ?>
                        <div class="col-sm-2 hidden-xs"><img src="{{ $ProductImg }}" alt="Application Image" class="img-responsive"/></div>
                        <div class="col-sm-10">
                            <h4 class="nomargin">{{$product->category}}</h4>
                            <p>{{$product->name}}</p>
                        </div>
                    </div>
                </td>
                <td data-th="Price">{{number_format($product->unit_price,2)}}</td>
                <td data-th="Quantity">
                    {{$product->qty_order}}
                    <input type="hidden" class="form-control text-center" min="0" value="{{$product->qty_order}}">
                </td>
                <td data-th="Subtotal" class="text-center">{{$product->total_price}}</td>
                <td class="actions" data-th="">
                    <!-- <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button> -->
                    <button class="btn btn-danger btn-sm removeProductFromCart" id_product="{{$product->id}}"><i class="fa fa-trash-o"></i></button>								
                </td>
            </tr>
            <?php
                $totalBayar += $product->total_price;
            ?>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total {{$totalBayar}}</strong></td>
            </tr>
            <tr>
                <td><a href="home" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total {{$totalBayar}}</strong></td>
                <td>
                    <form action="payment" method="GET">
                        @php
                            $encrypt_method = "AES-256-CBC";
                            $secret_key = 'This is my secret key';
                            $secret_iv = 'This is my secret iv';

                            $key = hash('sha256', $secret_key);

                            $iv = substr(hash('sha256', $secret_iv), 0, 16);
                            
                            $totalBayar = openssl_encrypt($totalBayar, $encrypt_method, $key, 0, $iv);
                            $totalBayar = base64_encode($totalBayar);
                        @endphp
                        <input type="hidden" name="axjokototaydonoloyokintillekiawjembetiawlexiongdonotchangehero" value="{{$totalBayar}}"/>
                        <button class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></button>
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<script src="{{ asset('public/js/cart_detail.js') }}"></script>
@endsection