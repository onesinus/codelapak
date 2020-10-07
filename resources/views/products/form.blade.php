<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>{{$product->name or 'Add New Product'}}</h3></div>
                <div class="panel-body">
                    <form method="post">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Product Name" value="{{ $product->name or old('name') }}" required autocomplete="off">                        
                        <label for="qty">Available Qty</label>
                        <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Available Qty" value="{{ $product->qty or old('qty') }}" required autocomplete="off">                        
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Unit Price" value="{{ $product->price or old('price') }}" required autocomplete="off">                        
                        
                        <br/>
                        <div class="row">     
                            <div class="col-md-6">                        
                                <button type="submit" class="form-control btn btn-primary col-md-6"><i class="fa fa-floppy-o"></i> {{ $formMode === 'edit' ? 'Update' : 'Save' }}</button>
                            </div>               
                            <div class="col-md-6">                        
                                <a class="form-control btn btn-danger" onclick="return confirm(&quot;Confirm cancel?&quot;)" href="{{ url('/products/') }}"><i class="fa fa-times"></i> Cancel</a>
                            </div>               
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>