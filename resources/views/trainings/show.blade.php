@include('layouts.header_front_page')

    <body id="page-top" style="overflow: hidden;">
        @include('items.navigation')
        
        <!-- Masthead -->
        <header class="masthead">
            <div style="background-color: white; height: 98%;">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div style="float: left"><a href="{{url('trainings')}}"><button class="btn btn-dark">Back</button></a></div>
                                <div style="float: right"><button class="btn btn-primary take" id_training="{{$training->id}}" price="{{$training->price}}">Take Training</button></div>
                                <div style="margin: 0 auto; width: 250px;"><h4>Detail Training</h4></div>
                            </div>

                            <div class="panel-body">
                                <br/>
                                <table class="table table-hover">
                                    <tr>
                                        <th>Training Name</th>
                                        <td>{{$training->name}}</td>
                                        <th>Price</th>
                                        <td>{{number_format($training->price,2)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{$training->category}}</td>
                                        <th>Rating</th>
                                        <td>{{$training->rating}}</td>
                                    </tr>
                                    <tr>
                                        <th>Instructor</th>
                                        <td>{{$training->instructor}}</td>
                                        <th>Place</th>
                                        <td>Jakarta/Online</td>
                                    </tr>
                                </table>
                                <div class="ml-2" style="overflow-y: scroll; height: 300px;">
                                    {!! $training->detail_training !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <script>
            var id_user_login       = "{{$id_user_login}}";
            var url_login           = "{{url('login')}}";
            var url_training_login  = "{{url('trainings/NeedLogin')}}";
            var url_add_to_cart     = "{{url('trainings/addTrainingToChart')}}";
            var url_cart_detail     = "{{url('cart_detail')}}";
        </script>
        @include('layouts.js_front_page')
    </body>
</html>
