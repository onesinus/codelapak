$(function(){
    $('.removeProductFromCart').click(function(){
        var id_product = $(this).attr('id_product');
        if(confirm("are you sure you want to remove this product from cart?")){
            $.ajax({type: "GET",url: 'home/deleteProductFromCart/'+id_product}).done(function( response ) {
                if(response == "deleted"){
                    location.reload();
                }else{
                    $.alert({
                        title: 'Information',
                        content: 'Failed to remove product from cart, try again later',
                    });
                }
            });    
        }
    })
})