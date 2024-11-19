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

        // $.ajax({
        //     method: 'POST',
        //     url: lp_book.ajax_url,
        //     data: {
        //         action: 'library_press_book_shelf_form',
        //         _wpnonce: lp_book._wpnonce,
        //     },
        //     success: function (response) {
        //         console.log(response);
        //     },
        // });
        wp.ajax
            .post('library_press_book_shelf_form', {
                _wpnonce: lp_book._wpnonce,
            })
            .done(function (response) {
                console.log(response);
            })
            .fail(function () {
                alert('something');
            });
    });
})(jQuery);
