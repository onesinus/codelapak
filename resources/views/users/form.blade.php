<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>User</h3></div>
                <div class="panel-body">
                    <form method="post">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $user->name or old('name') }}" required>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email or old('email') }}" required>
                        

                        @if($formMode == 'create')         
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        @endif
                        
                        <br/>
                        <div class="row">     
                            <div class="col-md-6">                        
                                <button type="submit" class="form-control btn btn-primary col-md-6"><i class="fa fa-floppy-o"></i> {{ $formMode === 'edit' ? 'Update' : 'Save' }}</button>
                            </div>               
                            <div class="col-md-6">                        
                                <a class="form-control btn btn-danger" onclick="return confirm(&quot;Confirm cancel?&quot;)" href="{{ url('/users/') }}"><i class="fa fa-times"></i> Cancel</a>
                            </div>               
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>