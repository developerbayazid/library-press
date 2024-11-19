<?php
// phpcs:ignoreFile
?>
<div class="wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card mw-100">
					<h3 class="text-center bg-primary text-white py-2"><?php _e( 'Create Book', 'library-press' ); ?></h2>
					<div class="card-body">
						<form action="" method="post">
							<div class="row mb-3">
								<label for="name" class="col-sm-2 col-form-label"><?php _e( 'Name', 'library-press' ); ?></label>
								<div class="col-sm-6">
								    <input type="text" class="form-control" id="name" name="name" value="" placeholder="<?php esc_attr_e( __('Enter Name', 'library-press') ) ?>">
								</div>
							</div>
                            <div class="row mb-3">
								<label for="email" class="col-sm-2 col-form-label"><?php _e( 'Email', 'library-press' ); ?></label>
								<div class="col-sm-6">
								    <input type="email" class="form-control" id="email" name="email" value="" placeholder="<?php esc_attr_e( __('Enter Email', 'library-press') ) ?>">
								</div>
							</div>
                            <div class="row mb-3">
								<label for="publication" class="col-sm-2 col-form-label"><?php _e( 'Publication', 'library-press' ); ?></label>
								<div class="col-sm-6">
								    <input type="text" class="form-control" id="publication" name="publication" value="" placeholder="<?php esc_attr_e( __('Enter Publication', 'library-press') ) ?>">
								</div>
							</div>
                            <div class="row mb-3">
								<label for="description" class="col-sm-2 col-form-label"><?php _e( 'Description', 'library-press' ); ?></label>
								<div class="col-sm-6">   
                                    <textarea class="form-control" name="description" id="description" placeholder="<?php esc_attr_e( __('Enter Description', 'library-press') ) ?>"></textarea>
								</div>
							</div>
                            <div class="row mb-3">
								<label for="book-image" class="col-sm-2 col-form-label"><?php _e( 'Book Image', 'library-press' ); ?></label>
								<div class="col-sm-6">
								    <input type="file" class="form-control" id="book-image" name="book-image" value="">
								</div>
							</div>
                            <div class="row mb-3">
								<label for="book-cost" class="col-sm-2 col-form-label"><?php _e( 'Book Cost', 'library-press' ); ?></label>
								<div class="col-sm-6">
								    <input type="number" min="1" class="form-control" id="book-cost" name="book-cost" value="" placeholder="<?php esc_attr_e( __('Enter Book Cost', 'library-press') ) ?>">
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
                                    <?php wp_nonce_field('book-form'); ?>
                                    <input type="hidden" name="action" value="library_press_book_form">
                                </div>
								<div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary"><?php _e('Submit', 'library-press'); ?></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
