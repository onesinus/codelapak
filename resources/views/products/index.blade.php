@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div> <!-- end .flash-message -->
                <div class="panel-heading text-center"><h3>products</h3></div>
                <div class="panel-body">
                    <form method="GET" action="{{ url('products') }}" accept-charset="UTF-8" role="search">
                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}" autocomplete="off">
                    </form>
                    <br/>
                    <div class="table-responsive">
                        <a href="{{ url('/products/create') }}" class="btn btn-success btn-sm" style="float:right;" title="Add New Product">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" style="width: 35%">Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Modified</th>
                                    <th scope="col" colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $Product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $Product->name }}</td>
                                        <td>{{ $Product->qty }}</td>
                                        <td>{{ number_format($Product->price,2) }}</td>
                                        <td>{{ $Product->created_at }}</td>
                                        <td>{{ $Product->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('/products/' . $Product->id) }}" title="View products"><button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/products/' . $Product->id . '/edit') }}" title="Edit products"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/products' . '/' . $Product->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete products" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="pagination-wrapper"> {!! $products->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
