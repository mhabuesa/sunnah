$(document).on('click', '.ajax-add-to-cart', function(e) {
    e.preventDefault();

    let button = $(this);
    let productId = button.data('product-id');

    if (button.prop('disabled')) return;

    button.prop('disabled', true);

    $.ajax({
        url: window.cartAddUrl,
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            product_id: productId
        },

        success: function(response) {

            if (response.success) {
                $('#cartCount').text(response.cart_count);

                showToast(response.message, 'success');
            }
        },

        error: function(xhr) {
            console.error(xhr.responseJSON);

            alert(xhr.responseJSON?.message || 'Something went wrong!');
        },

        complete: function() {
            button.prop('disabled', false);
        }
    });
});