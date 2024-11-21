<?php
// phpcs:ignoreFile
?>
<div class="wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <h2 class="text-center mt-2"><?php _e( 'Book Shelf List', 'library-press' ); ?></h2>
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
                                        <td><?php echo $data->shelf_name; ?></td>
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
