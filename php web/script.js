$(document).ready(function() {
    // Handle category links click event
    $('.category-link').on('click', function(e) {
        e.preventDefault();
        var selectedCategory = $(this).data('category');

        
        var url = new URL(window.location.href);
        url.searchParams.set('category', selectedCategory);
        window.location.href = url.toString();
    });
    $('.add-to-basket-btn').on('click', function() {
        var productId = $(this).data('product-id');
        window.location.href = 'add_to_basket.php?add_to_basket=' + productId;
    });

    var urlParams = new URLSearchParams(window.location.search);
    var initialCategory = urlParams.get('category') || 'Savoury';
    $('.category-link').removeClass('selected');
    $('.category-link[data-category="' + initialCategory + '"]').addClass('selected');
});
