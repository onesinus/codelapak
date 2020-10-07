@extends('layouts.app')
@section('content')
<div class="container panel panel-default panel-body">
	<table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Transaction Status</th>
                <th>Transaction Date</th>
                <th>Total Transaction</th>
            </tr>
        </thead>
        <tbody>
            <?php $totalBayar = 0; ?>
            @foreach($getTransaction as $transaction)                
            <tr>
                <td>
                    <a href="cart_history_detail?id_order={{$transaction->order_id}}">{{$transaction->order_id}}</a>
                </td>
                <td>{{ 'Transaction Success' }}</td>
                <td>{{$transaction->created_at}}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection