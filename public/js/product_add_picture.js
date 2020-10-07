$(function(){
    // Add and remove button product picture
    $(".btn-success").click(function(){ 
        var html = $(".clone").html();
        $(".increment").after(html);
    });

    $("body").on("click",".btn-danger",function(){ 
        $(this).parents(".control-group").remove();
    });    
});

function setMainImage(id_product_image){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: 'setMainImage',
        data: { id: id_product_image }
    }).done(function( msg ) {
        console.log(msg);
        if(msg == "success"){
            location.reload();
        }else{
            
            $.alert({
                title: 'Information',
                content: 'Failed to change main image! try again later',
            });
            
        }
    });
}