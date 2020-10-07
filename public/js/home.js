$(function(){
    // Apps
    $('.buy').click(function(){
        var id_product   = $(this).attr('id_product');
        var price        = $(this).attr('price');

        // call ajax, in controller insert into cart table, then update chart total badge
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        var url = add_product_url;
        if(typeof id_user_login === "undefined" || id_user_login == 0){
            $.confirm({
                title: 'Information',
                content: 'You need to logged in into your account to add this app to cart',
                buttons: {
                    OK: function () {
                        window.location.href = url_app_login;
                    }
                }
            });
        }else{
            $.ajax({
                type: "POST",
                url: url,
                data: { 
                    id_product: id_product,
                    unit_price: price
                }
            }).done(function( msg ) {
                msg = JSON.parse(msg);
                // console.log(msg.status);
                if(msg.status == "success"){
                    $('.total_belanja').text(' ' + msg.total_belanja); // Cara ganti total belanja, tinggal set text by class aja
                    
                    $.confirm({
                        title: 'Confirmation',
                        content: 'Success add to cart, want to open cart?',
                        buttons: {
                            YES: function () {
                                window.location.href = url_cart_detail;
                            },
                            NO: function () {
                                $.alert('Cart not opened');
                            }
                        }
                    });

                }else{
                    $.alert({
                        title: 'Information',
                        content: 'Failed add product to cart! try again later',
                    });
                }
            }).fail(function(a,b,c){

                $.confirm({
                    title: 'Information',
                    content: 'Something went wrong',
                    buttons: {
                        OK: function () {
                            location.reload();
                        }
                    }
                });

            });
        }
    });

    // Training
    $('.take').click(function(){
        var id_training     = $(this).attr('id_training');
        var price           = $(this).attr('price');

        // call ajax, in controller insert into cart table, then update chart total badge
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        if(typeof id_user_login === "undefined" || id_user_login == 0){

            $.confirm({
                title: 'Information',
                content: 'You need to logged in into your account to add this training to cart',
                buttons: {
                    OK: function () {
                        window.location.href = url_training_login;
                    }
                }
            });
            
        }else{
            var url = url_add_to_cart;
            $.ajax({
                type: "POST",
                url: url,
                data: { 
                    id_training: id_training,
                    unit_price: price
                }
            }).done(function( msg ) {
                msg = JSON.parse(msg);
                if(msg.status == "success"){
                    $('.total_belanja').text(' ' + msg.total_belanja); // Cara ganti total belanja, tinggal set text by class aja

                    $.confirm({
                        title: 'Confirmation',
                        content: 'Success add to cart, want to open cart?',
                        buttons: {
                            YES: function () {
                                window.location.href = url_cart_detail;
                            },
                            NO: function () {
                                $.alert('Cart not opened');
                            }
                        }
                    });

                }else{

                    $.alert({
                        title: 'Information',
                        content: 'Failed add product to cart! try again later',
                    });

                }
            }).fail(function(a,b,c){

                $.confirm({
                    title: 'Information',
                    content: 'Something went wrong',
                    buttons: {
                        OK: function () {
                            location.reload();
                        }
                    }
                }); 
                
            });     
        }
    });

    //Ebooks
    $('.get').click(function(){
        var id_ebook        = $(this).attr('id_ebook');
        var price           = $(this).attr('price');

        // call ajax, in controller insert into cart table, then update chart total badge
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        if(typeof id_user_login === "undefined" || id_user_login == 0){

            $.confirm({
                title: 'Information',
                content: 'You need to logged in into your account to add this ebook to cart',
                buttons: {
                    OK: function () {
                        window.location.href = url_ebook_login;
                    }
                }
            }); 
            
        }else{
            var url = url_add_to_cart;

            $.ajax({
                type: "POST",
                url: url,
                data: { 
                    id_ebook: id_ebook,
                    unit_price: price
                }
            }).done(function( msg ) {
                msg = JSON.parse(msg);
                if(msg.status == "success"){

                    $('.total_belanja').text(' ' + msg.total_belanja); // Cara ganti total belanja, tinggal set text by class aja
                    
                    $.confirm({
                        title: 'Confirmation',
                        content: 'Success add to cart, want to open cart?',
                        buttons: {
                            YES: function () {
                                window.location.href = url_cart_detail;
                            },
                            NO: function () {
                                $.alert('Cart not opened');
                            }
                        }
                    });

                }else{
                    
                    $.alert({
                        title: 'Information',
                        content: 'Failed add product to cart! try again later',
                    });
                }
            }).fail(function(a,b,c){
                
                $.confirm({
                    title: 'Information',
                    content: 'Something went wrong',
                    buttons: {
                        OK: function () {
                            location.reload();
                        }
                    }
                }); 

            });     
        }
    });


});