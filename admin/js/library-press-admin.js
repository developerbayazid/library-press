(function ($) {
    /**
     * Data Table Active
     */
    new DataTable('#lp-book-list');
    new DataTable('#lp-book-shelf-list');

    /**
     * Ajax handle data insert from book shelf
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
                console.log(response.message);
                swal(
                    'Good job!',
                    'Book shelf created successfully!',
                    'success'
                );

                if ($('#book_shelf_form').length) {
                    $('#book_shelf_form')[0].reset();
                } else {
                    console.log('Form not found!');
                }
            })
            .fail(function (response) {
                swal('Oops!', response.responseJSON.data.message, 'error');
            });
    });

    /**
     * Ajax handler book shelf delete data
     */
    $('.delete-btn-book-shelf').on('click', function (e) {
        var id = $(this).attr('data-id');
        wp.ajax
            .post('book_shelf_delete', {
                id: id,
            })
            .done(function (response) {
                if (response.status == 1) {
                    swal(
                        'Done!',
                        'Book shelf deleted successfully!',
                        'success'
                    );
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                }
            })
            .fail(function (response) {
                swal('Oops!', response.responseJSON.data.message, 'error');
            });
    });
})(jQuery);
