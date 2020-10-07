@extends('layouts.app')
@section('content')
<div class="container panel panel-default panel-body">
    <center><h3>Order #{{$getTransaction[0]->order_id}}</h3></center>
	<table class="table table-hover table-condensed">
        <tr>
            <th>Transaction Date</th>
            <td>{{$getTransaction[0]->created_at}}</td>
        </tr>
    </table>
    <h3>Order Detail</h3>
    <h4>Apps</h4>
    <table class="table table-hover table-condensed">
        <tr>
            <th style="width: 50%;">Name</th>
            <th style="width: 5%;">Qty</th>
            <th style="width: 20%;">Unit Price</th>
            <th style="width: 25%;">Total Price</th>
        </tr>
        @foreach($getTransactionApps as $transaction)                
        <tr>
            <td>{{$transaction->name}}</td>
            <td>{{$transaction->qty}}</td>
            <td>{{$transaction->unit_price}}</td>
            <td>{{$transaction->total_price}}</td>
        </tr>
        @endforeach
    </table>

    <h4>Trainings</h4>
    <table class="table table-hover table-condensed">
        <tr>
            <th style="width: 50%;">Name</th>
            <th style="width: 5%;">Qty</th>
            <th style="width: 20%;">Unit Price</th>
            <th style="width: 25%;">Total Price</th>
        </tr>
        @foreach($getTransactionTrainings as $transaction)                
        <tr>
            <td>{{$transaction->name}}</td>
            <td>{{$transaction->qty}}</td>
            <td>{{$transaction->unit_price}}</td>
            <td>{{$transaction->total_price}}</td>
        </tr>
        @endforeach
    </table>

    <h4>Ebooks</h4>
    <table class="table table-hover table-condensed">
        <tr>
            <th style="width: 50%;">Name</th>
            <th style="width: 5%;">Qty</th>
            <th style="width: 20%;">Unit Price</th>
            <th style="width: 25%;">Total Price</th>
            <th>Action</th>
        </tr>
        @foreach($getTransactionEbooks as $transaction)                
        <tr>
            <td>
                @if($transaction->url_show != "")
                    <a href="{{$transaction->url_show}}" target="_blank">{{$transaction->name}}</a>
                @else
                    {{$transaction->name}}
                @endif
            </td>
            <td>{{$transaction->qty}}</td>
            <td>{{$transaction->unit_price}}</td>
            <td>{{$transaction->total_price}}</td>
            <td>
                @if($transaction->url_download != "")
                    <a href="{{$transaction->url_download}}" class="fa fa-download"></a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection