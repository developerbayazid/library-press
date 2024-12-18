<?php
// phpcs:ignoreFile
if ( isset( $_REQUEST['view'] ) == true && isset( $_REQUEST['id'] ) ) {
    require_once __DIR__.'/library-press-list-book-shelf-view.php';

    die();
}

?>
<div class="wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <div class="card" style="min-width: 100%;">
                    <div class="card-header bg-white text-center">
                        <h2 class="fw-bold"><?php _e( 'Book Shelf List', 'library-press' ); ?></h2>
                    </div>
                    <div class="card-body">
                        <table id="lp-book-shelf-list" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Capacity</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if ( count( $book_shelf_list ) > 0 ){
                                        $id = 0;
                                        foreach ($book_shelf_list as $key => $data) :
                                            $id++;
                                            ?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><a class="text-decoration-none" href="<?php echo admin_url('admin.php?page=library-press-list-book-shelf&view=true&id='.$data->id); ?>"><?php echo $data->shelf_name; ?></a></td>
                                                <td><?php echo intval( $data->capacity ); ?></td>
                                                <td><?php echo $data->shelf_location; ?></td>
                                                <td>
                                                    <?php if ( $data->status == 1 ): ?>
                                                        <button class="btn btn-success"><?php echo _e('Active', 'library-press'); ?></button>
                                                    <?php elseif ( $data->status == 0 ) : ?>
                                                        <button class="btn btn-danger"><?php echo _e('In Active', 'library-press'); ?></button>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger delete-btn-book-shelf" data-id="<?php echo $data->id; ?>"><?php echo _e('Delete', 'library-press'); ?></button>
                                                </td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Capacity</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
