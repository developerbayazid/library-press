<?php 
// phpcs:ignoreFile
?>
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<div class="card shadow">
				<div class="card-header bg-white">
					<h3 class="text-center py-2 fw-bold"><?php _e( 'Create Book Shelf', 'library-press' ); ?></h3>
				</div>
				<div class="card-body">
					<form id="book_shelf_form" action="" method="post">
						<div class="mb-3">
							<label for="name" class="form-label fw-bold"><?php _e( 'Name *', 'library-press' ); ?></label>
							<input type="text" class="form-control" id="name" name="name" value="" placeholder="<?php esc_attr_e( __( 'Enter Book Shelf Name', 'library-press' ) ); ?>">
						</div>
						<div class="mb-3">
							<label for="capacity" class="form-label fw-bold"><?php _e( 'Capacity *', 'library-press' ); ?></label>
							<input type="number" min="1" class="form-control" id="capacity" name="capacity" value="" placeholder="<?php esc_attr_e( __( 'Enter Capacity', 'library-press' ) ); ?>">
						</div>
						<div class="mb-3">
							<label for="location" class="form-label fw-bold"><?php _e( 'Shelf Location *', 'library-press' ); ?></label>
							<input type="text" class="form-control" id="location" name="location" value="" placeholder="<?php esc_attr_e( __( 'Enter Location', 'library-press' ) ); ?>">
						</div>
						<div class="mb-3">
							<label for="status" class="form-label fw-bold"><?php _e( 'Status *', 'library-press' ); ?></label>
							<select name="status" class="form-select" id="status">
								<option value="active"><?php _e( 'Active', 'library-press' ); ?></option>
								<option value="inactive"><?php _e( 'Inactive', 'library-press' ); ?></option>
							</select>
						</div>
						<?php wp_nonce_field( 'book-shelf-form' ); ?>
						<input type="hidden" name="action" value="library_press_book_shelf_form">
						<div class="d-grid">
							<button id="book_shelf_form_btn" type="submit" class="btn btn-primary"><?php _e( 'Submit', 'library-press' ); ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
