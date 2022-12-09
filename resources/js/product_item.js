(function($) {
    "use strict";
    $(document).ready(function() {
        $(document).on('click', ".addToCompareFromThumnail", function(event) {
            event.preventDefault();

            var className = this.className;
            if ($(this).data('producttype') == 1) {

                addToCompare($(this).attr('data-product-sku'), $(this).data('producttype'), 'product');
            } else {
                $('#pre-loader').show();
                $.post('item-details-for-get-modal.html', {
                    _token: 'tW3d9kIg46N8C3388j7rbEM4f6NWVGwGrgFxQP8i',
                    product_id: $(this).attr('data-product-id')
                }, function(data) {
                    $(".add-product-to-cart-using-modal").html(data);
                    $("#theme_modal").modal('show');
                    $('.nc_select, .select_address, #product_short_list, #paginate_by').niceSelect();
                    $('#pre-loader').hide();
                });
            }
        });

        $(document).on('click', '#add_to_compare_btn', function(event) {
            event.preventDefault();
            let product_sku_class = $(this).data('product_sku_id');
            let product_sku_id = $(product_sku_class).val();
            let product_type = $(this).data('product_type');
            addToCompare(product_sku_id, product_type, 'product');
        });

        $(document).on('click', '.add_to_wishlist', function(event) {
            event.preventDefault();
            let product_id = $(this).data('product_id');
            let seller_id = $(this).data('seller_id');
            let is_login = $('#login_check').val();
            let type = 'product';
            if (is_login == 1) {
                addToWishlist(product_id, seller_id, type);
                $(this).addClass('is_wishlist');
            } else {
                toastr.warning("Please login first", "Warning");
            }
        });

    });
})(jQuery);