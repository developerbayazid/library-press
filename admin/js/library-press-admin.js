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

    $('#book-image').on('click', function () {
        var image = wp
            .media({
                title: 'Upload book image',
                multiple: false,
            })
            .open()
            .on('select', function () {
                var uploaded_image = image.state().get('selection');
                uploaded_image = uploaded_image.toJSON()[0].url;
                $('#book_uploaded_img').attr('src', uploaded_image);
                $('#book_uploaded_img').attr('class', 'd-block mt-2');
                $('#book_cover_image').val(uploaded_image);
            });
    });

    $('#book_form').on('submit', function (e) {
        e.preventDefault();

        var formData = {
            shelf_id: $('#dd-book-shelf').val(),
            name: $('#name').val(),
            email: $('#email').val(),
            publication: $('#publication').val(),
            description: $('#description').val(),
            book_image: $('#book_cover_image').val(),
            book_cost: $('#book-cost').val(),
            status: $('#status').val(),
            _wpnonce: $('#_wpnonce').val(),
        };

        wp.ajax
            .post('library_press_book_form', {
                _wpnonce: formData._wpnonce,
                data: formData,
            })
            .done(function (response) {
                swal('Good job!', response.message, 'success');

                if ($('#book_form').length) {
                    $('#book_form')[0].reset();
                    $('#book_uploaded_img').attr('class', 'd-none');
                } else {
                    console.log('Form not found!');
                }
            })
            .fail(function (response) {
                swal('Oops!', response.responseJSON.data.message, 'error');
            });
    });
})(jQuery);
