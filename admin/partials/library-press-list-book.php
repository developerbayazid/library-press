<?php
// phpcs:ignoreFile
?>
<div class="wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <div class="card" style="min-width: 100%;">
                    <div class="card-header text-center bg-white">
                        <h2 class="fw-bold"><?php _e( 'Book List', 'library-press' ); ?></h2>
                    </div>
                    <div class="card-body">
                        <table id="lp-book-list" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Shelf Name</th>
                                    <th>Email</th>
                                    <th>Publication</th>
                                    <th>Book Cover</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if( count( $book_list ) > 0 ) :
                                        $id = 0;
                                        foreach ($book_list as $book) :
                                        $id++;
                                        ?>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $book->name; ?></td>
                                            <td><?php echo $book->shelf_name ? : '<i>No Shelf</i>' ?></td>
                                            <td><?php echo $book->email; ?></td>
                                            <td><?php echo $book->publication; ?></td>
                                            <td>
                                                <img style="width: 40px; height: 40px;" src="<?php echo $book->book_image; ?>">
                                            </td>
                                            <td>$<?php echo $book->amount; ?></td>
                                            <td><?php echo $book->description; ?></td>
                                            <td>
                                                <?php if ( $book->status == 1 ): ?>
                                                    <button class="btn btn-success"><?php echo _e('Active', 'library-press'); ?></button>
                                                <?php elseif ( $book->status == 0 ) : ?>
                                                    <button class="btn btn-danger"><?php echo _e('In Active', 'library-press'); ?></button>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger delete-btn-book" data-id="<?php echo $book->id; ?>"><?php echo _e('Delete', 'library-press'); ?></button>
                                            </td>
                                        </tr>
                                        <?php endforeach;
                                    endif;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Shelf Name</th>
                                    <th>Email</th>
                                    <th>Publication</th>
                                    <th>Book Cover</th>
                                    <th>Price</th>
                                    <th>Description</th>
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
