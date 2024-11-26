<?php
// phpcs:ignoreFile
wp_enqueue_media();
?>
<div class="wrap">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card" style="width: 50rem;">
            <div class="card-header bg-white text-center">
                <h3 class="fw-bold"><?php _e('Create Book', 'library-press'); ?></h3>
            </div>
            <div class="card-body">
                <form id="book_form" action="" method="post">
                    <!-- Select Book Shelf -->
                    <div class="mb-3">
                        <label for="dd-book-shelf" class="form-label fw-bold"><?php _e('Select Book Shelf *', 'library-press'); ?></label>
                        <select name="dd-book-shelf" class="form-control" id="dd-book-shelf">
                            <option selected disabled value=""><?php _e('Choose Book Shelf', 'library-press'); ?></option>
                            <?php 
                                if ( count( $book_shelf ) > 0 ):
                                    foreach ( $book_shelf as $shelf ):
                                    ?>
                                        <option value="<?php esc_attr_e( $shelf->id ); ?>"><?php _e( $shelf->shelf_name, 'library-press' ); ?></option>
                                    <?php
                                    endforeach;
                                endif; 
                            ?>
                        </select>
                    </div>

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold"><?php _e('Name *', 'library-press'); ?></label>
                        <input type="text" class="form-control" id="name" name="name" value="" placeholder="<?php esc_attr_e(__('Enter Book Name', 'library-press')) ?>">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold"><?php _e('Email *', 'library-press'); ?></label>
                        <input type="email" class="form-control" id="email" name="email" value="" placeholder="<?php esc_attr_e(__('Enter Email', 'library-press')) ?>">
                    </div>

                    <!-- Publication -->
                    <div class="mb-3">
                        <label for="publication" class="form-label fw-bold"><?php _e('Publication *', 'library-press'); ?></label>
                        <input type="text" class="form-control" id="publication" name="publication" value="" placeholder="<?php esc_attr_e(__('Enter Publication', 'library-press')) ?>">
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold"><?php _e('Description', 'library-press'); ?></label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="<?php esc_attr_e(__('Enter Description', 'library-press')) ?>"></textarea>
                    </div>

                    <!-- Book Image -->
                    <div class="mb-3">
                        <label for="book-image" class="form-label fw-bold"><?php _e('Book Cover Image *', 'library-press'); ?></label>
                        <input type="button" value="<?php esc_attr_e('Upload Image'); ?>" class="form-control" id="book-image" name="book-image" value="">
                        <img id="book_uploaded_img" class="d-none mt-2" style="width: 100px; height: 100px;" src="">
                        <input type="hidden" name="book_cover_image" id="book_cover_image">
                    </div>

                    <!-- Book Cost -->
                    <div class="mb-3">
                        <label for="book-cost" class="form-label fw-bold"><?php _e('Book Cost ($) *', 'library-press'); ?></label>
                        <input type="number" min="1" class="form-control" id="book-cost" name="book-cost" value="" placeholder="<?php esc_attr_e(__('Enter Book Cost', 'library-press')) ?>">
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label fw-bold"><?php _e('Status *', 'library-press'); ?></label>
                        <select name="status" class="form-control" id="status">
                            <option value="<?php esc_attr_e('active'); ?>"><?php _e('Active', 'library-press'); ?></option>
                            <option value="<?php esc_attr_e('inactive'); ?>"><?php _e('Inactive', 'library-press'); ?></option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <?php wp_nonce_field('book-form'); ?>
                        <input type="hidden" name="action" value="library_press_book_form">
                        <button id="book_form_btn" type="submit" class="btn btn-primary px-5 py-2"><?php _e('Submit', 'library-press'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
