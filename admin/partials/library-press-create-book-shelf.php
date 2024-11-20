<?php
// phpcs:ignoreFile
?>
<div class="wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card mw-100">
					<div class="card-header">
						<h3 class="text-center py-2"><?php _e( 'Create Book Shelf', 'library-press' ); ?></h2>
					</div>
					<div class="card-body">
						<form id="book_shelf_form" action="" method="post">
							<div class="row mb-3">
								<label for="name" class="col-sm-2 col-form-label"><?php _e( 'Name', 'library-press' ); ?></label>
								<div class="col-sm-6">
								    <input type="text" class="form-control" id="name" name="name" value="" placeholder="<?php esc_attr_e( __('Enter Book Shelf Name', 'library-press') ) ?>">
								</div>
							</div>
                            <div class="row mb-3">
								<label for="capacity" class="col-sm-2 col-form-label"><?php _e( 'Capacity', 'library-press' ); ?></label>
								<div class="col-sm-6">
								    <input type="number" min="1" class="form-control" id="capacity" name="capacity" value="" placeholder="<?php esc_attr_e( __('Enter Capacity', 'library-press') ) ?>">
								</div>
							</div>
                            <div class="row mb-3">
								<label for="location" class="col-sm-2 col-form-label"><?php _e( 'Shelf Location', 'library-press' ); ?></label>
								<div class="col-sm-6">
								    <input type="text" class="form-control" id="location" name="location" value="" placeholder="<?php esc_attr_e( __('Enter Location', 'library-press') ) ?>">
								</div>
							</div>
                            <div class="row mb-3">
								<label for="status" class="col-sm-2 col-form-label"><?php _e( 'Status', 'library-press' ); ?></label>
								<div class="col-sm-6">
								    <select name="status" class="form-control" id="status">
                                        <option value="<?php esc_attr_e( 'active' ); ?>"><?php _e( 'Active', 'library-press' ); ?></option>
                                        <option value="<?php esc_attr_e( 'inactive' ); ?>"><?php _e('In Active', 'library-press'); ?></option>
                                    </select>
								</div>
							</div>
                            <div class="row mb-3">
                                <div class="col-sm-2 col-form">
                                    <?php wp_nonce_field('book-shelf-form'); ?>
                                    <input type="hidden" name="action" value="library_press_book_shelf_form">
                                </div>
								<div class="col-sm-6">
                                    <button id="book_shelf_form_btn" type="submit" class="btn btn-primary"><?php _e('Submit', 'library-press'); ?></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
