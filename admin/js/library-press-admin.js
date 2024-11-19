(function ($) {
    /**
     * Data Table Active
     */
    new DataTable('#lp-book-list');
    new DataTable('#lp-book-shelf-list');

    /**
     * Ajax handle
     */
    $('#book_shelf_form').on('submit', function (e) {
        e.preventDefault();

        var formData = {
            name: $('#name').val(),
            capacity: $('#capacity').val(),
            location: $('#location').val(),
            status: $('#status').val(),
            _wpnonce: $('#_wpnonce').val(),
        };

        wp.ajax
            .post('library_press_book_shelf_form', {
                _wpnonce: formData._wpnonce,
                data: formData,
            })
            .done(function (response) {
                alert(response.message);
            })
            .fail(function (response) {
                alert(response.responseJSON.data.message);
            });
    });
})(jQuery);
