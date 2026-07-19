(function(){
    "use strict";

    $(document).ready(function() {

       $(document).on('click', '.add-to-cart', function(e) {
            let url = $(this).data('url');
            let productId = $(this).data('product-id');
            let quantity = $(this).data('quantity') || 1; // Default quantity

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    product_id: productId,
                    quantity: quantity,
                    _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        if(response.carts) {
                            $('#cart-items').html(response.carts);
                            $("#cart_total").val(response.total_amount);
                        }
                        alert('Product added to cart successfully!');
                        // Optionally, update the cart UI here
                    } else {
                        alert(response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText.error);
                    alert(xhr.responseText.error);
                }
            });
       });

       $(document).on('click','.delete-cart-item',function(e){
            e.preventDefault();
            let rowId = $(this).attr('data-row');
            $.ajax({
                url:$(this).attr('href'),
                method:"get"
            }).done(function(response){
                if(response.status == 'success') {
                    $('#cart-items').html(response.carts);
                    $("#cart_total").val(response.total_amount);
                    $(rowId).remove();
                }
            });
       });

       $(document).on('input','.pay',function(){
          let total = parseFloat($("#cart_total").val());
          let pay = parseFloat($(this).val());
          let due = total - pay;
          $(".due").val(due);
       })

    });

})(jQuery);
