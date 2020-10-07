@extends('layouts.app')
@section('content')
  <div class="container">
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>   

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
                <div class="panel-heading text-center"><h3>Product Pictures</h3></div>
                <div class="panel-body">
                    <div class="table-responsive" style="height: 50%;">
                        <table class="table table-hover">
                            <tr>
                                <th>Image</th>
                                <th>File Name</th>
                                <th>Upload Date</th>
                                <th style="width: 5%;">Set Main Image</th>
                                <th>Action</th>
                            </tr>
                            @if(count($dataImage) > 0)
                                @foreach($dataImage as $image)
                                <tr>
                                    <td>
                                        <?php
                                            $ProductImg = asset('public/img/products/'.$image->filename.'');
                                        ?>
                                        <img src="{{ $ProductImg }}" alt="Application Image" style="height: 7%;">
                                    </td>
                                    <td>{{$image->filename}}</td>
                                    <td>{{$image->created_at}}</td>
                                    <td>
                                        @if($image->main_image == 1)
                                            <span style="color: blue;">{{'Main Image'}}</span>
                                        @else
                                            <center><i class="fa fa-check-square-o btn btn-warning" filename="{{$image->filename}}" onclick="setMainImage({{$image->id}})"></i></center>
                                        @endif
                                    </td>
                                    <td>
                                        <i class="fa fa-eye btn btn-primary" filename="{{$image->filename}}"></i>
                                        <i class="fa fa-remove btn btn-danger" id_image="{{$image->id}}" onclick="confirm(&quot;Are you sure you want to remove this image?&quot;);"></i>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3"><center>There is no picture in this product now, you can upload in form below</center></td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    <form method="post" action="{{url('products/store_picture')}}" enctype="multipart/form-data">
                        <input type="hidden" name="id_product" value="{{$product->id}}">
                        {{csrf_field()}}
                        <div class="input-group control-group increment" >
                            <input type="file" name="filename[]" class="form-control" required>
                            <div class="input-group-btn"> 
                                <button class="btn btn-success form-control" type="button"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="filename[]" class="form-control">
                                <div class="input-group-btn">   
                                <button class="btn btn-danger form-control" type="button"><i class="fa fa-remove"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary form-control" style="margin-top:10px"><i class="fa fa-floppy-o"></i> Save Picture</button>
                            </div>
                            <div class="col-md-6">   
                                <a class="form-control btn btn-warning" onclick="return confirm(&quot;Confirm Return To Product?&quot;)" style="margin-top:10px" href="{{ url('/products/' . $product->id) }}"><i class="fa fa-arrow-circle-left"></i> Return To Products</a>
                            </div>
                        </div>
                    </form>   
                </div> <!-- end panel-body -->
            </div> <!-- end panel-default -->
        </div> <!-- col md 12 -->
    </div>    <!-- row -->
  </div> <!-- container -->
  <script src="{{ asset('public/js/product_add_picture.js') }}"></script> 
@endsection