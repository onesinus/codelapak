@include('layouts.header_front_page')

    <body id="page-top" style="overflow: hidden;">
        @include('items.navigation')
        
        <!-- Masthead -->
        <header class="masthead">
            <div style="background-color: white; height: 98%;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <form method="GET" action="{{ url('ebooks') }}" accept-charset="UTF-8" role="search">
                                    <input type="text" class="form-control mt-2 mb-2" name="search" value="{{ request('search') }}" placeholder="Search Ebook or Scroll down to search manually..." autocomplete="off">
                                </form>
                            </div>
                            <div class="panel-body">
                                <div style="height: 425px; overflow-y: scroll;" class="row">
                                    @foreach($ebooks as $t)
                                    <div class="card col-md-4" style="margin-bottom: 3%;">
                                        <?php
                                            $troductImg = asset('public/img/products/').'/'.$t->image;
                                        ?>
                                        <img class="card-img-top" src="{{ $troductImg }}" alt="Application Image" style="height: 250px; width: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$t->category}}</h5>
                                            <p class="card-text">{{$t->name}} @ {{number_format($t->price,2)}}</p>
                                            <button id_ebook="{{$t->id}}" price="{{$t->price}}" class="btn btn-success get">Get Ebook</button>
                                            <a href="ebooks/{{$t->id}}" class="btn btn-primary">Detail</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div style="margin-left: 49%; background-color: white;"> {!! $ebooks->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <script>
            var id_user_login       = "{{$id_user_login}}";
            var url_login           = "{{url('login')}}";
            var url_ebook_login     = "{{url('ebooks/NeedLogin')}}";
            var url_add_to_cart     = "{{url('ebooks/addEbookToChart')}}";
            var url_cart_detail     = "{{url('cart_detail')}}";
        </script>

        @include('layouts.js_front_page')

    </body>
</html>
