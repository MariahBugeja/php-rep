$(document).ready(function() {
    $('.category-link').on('click', function(e) {
        e.preventDefault();
        var selectedCategory = $(this).data('category');
        
        var url = new URL(window.location.href);
        url.searchParams.set('category', selectedCategory);
        window.location.href = url.toString();
    });
}
