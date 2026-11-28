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

$(document).on('click', '.ajax-order-now', function (e) {
    e.preventDefault();
    console.log('Order now clicked');

    let button = $(this);
    let productId = button.data('product-id');
    let cartUrl = button.data('cart-url');

    if (button.prop('disabled')) return;
    button.prop('disabled', true);

    $.ajax({
        url: window.orderNowUrl,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            product_id: productId
        },
        success: function (response) {
            if (response.success) {
                window.location.href = cartUrl;
            } else {
                alert(response.message || 'Could not add item to cart.');
                button.prop('disabled', false);
            }
        },
        error: function (xhr) {
            console.error('AJAX error:', xhr.status, xhr.responseText);
            alert(xhr.responseJSON?.message || 'Something went wrong!');
            button.prop('disabled', false);
        }
    });
});



const chatWidget = document.querySelector('.floating-chat-widget');
const chatToggleBtn = document.getElementById('chatToggleBtn');
const iconChat = chatToggleBtn.querySelector('.icon-chat');
const iconClose = chatToggleBtn.querySelector('.icon-close');

chatToggleBtn.addEventListener('click', function() {
    chatWidget.classList.toggle('active');
    
    // আইকন পরিবর্তন (ম্যাসজে থেকে X এবং X থেকে মেসেজ)
    if (chatWidget.classList.contains('active')) {
        iconChat.style.display = 'none';
        iconClose.style.display = 'block';
    } else {
        iconChat.style.display = 'block';
        iconClose.style.display = 'none';
    }
});

// উইজেটের বাইরে কোথাও ক্লিক করলে চ্যাট অপশনগুলো বন্ধ হয়ে যাবে
document.addEventListener('click', function(event) {
    if (!chatWidget.contains(event.target)) {
        chatWidget.classList.remove('active');
        iconChat.style.display = 'block';
        iconClose.style.display = 'none';
    }
});


const scrollTopBtn = document.getElementById('scrollTopBtn');
const progressRing = document.querySelector('.progress-ring__bar');
const circumference = 144.5; 

window.addEventListener('scroll', function() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    
    const scrollPercent = scrollTop / scrollHeight;
    const offset = circumference - (scrollPercent * circumference);
    if (progressRing) {
        progressRing.style.strokeDashoffset = offset;
    }

    if (scrollTop > 400) {
        scrollTopBtn.classList.add('show');
    } else {
        scrollTopBtn.classList.remove('show');
    }
});

scrollTopBtn.addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});