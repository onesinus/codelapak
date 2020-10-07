@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>User Information: {{$user->name}}</h3></div>
                <div class="panel-body">
                    <form method="get" action="{{url('/users')}}">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                        <br/>
                        
                        <div class="row">
                            <div class="col-md-6">   
                                <a class="form-control btn btn-success" href="{{ url('/users/' . $user->id . '/edit') }}"><i class="fa fa-pencil"></i> Edit Data</a>                                
                            </div>
                            <div class="col-md-6">
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