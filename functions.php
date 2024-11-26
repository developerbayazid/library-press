<?php
/**
 * The functions.php file consolidates reusable functions that can be used across various parts of the project
 *
 * @link https://https://github.com/developerbayazid
 * @since 1.0.0
 * @package functions
 */

/**
 * Insert data to database
 *
 * @param array $args ti will return a array with values.
 * @return int
 */
function lp_insert_book_shelf( $args = array() ) {
	global $wpdb;

	$defaults = array(
		'shelf_name'     => '',
		'capacity'       => 1,
		'shelf_location' => '',
		'status'         => 1,
		'created_by'     => get_current_user_id(),
		'created_at'     => current_time( 'mysql' ),
	);

	$data = wp_parse_args( $args, $defaults );

	$inserted = $wpdb->insert(
		"{$wpdb->prefix}library_press_tbl_book_shelf",
		$data,
		array(
			'%s',
			'%d',
			'%s',
			'%d',
			'%d',
			'%s',
		),
	);

	if ( ! $inserted ) {
		return new \WP_Error( 'failed-to-insert', __( 'Failed to insert data', 'library-press' ) );
	}
	return $wpdb->insert_id;
}

/**
 * Insert data to database
 *
 * @param array $args ti will return a array with values.
 * @return int
 */
function lp_insert_book( $args = array() ) {
	global $wpdb;

	$defaults = array(
		'name'        => '',
		'email'       => '',
		'publication' => '',
		'amount'      => 1,
		'description' => '',
		'book_image'  => '',
		'shelf_id'    => 0,
		'status'      => 1,
		'created_by'  => get_current_user_id(),
		'created_at'  => current_time( 'mysql' ),
	);

	$data = wp_parse_args( $args, $defaults );

	$inserted = $wpdb->insert(
		"{$wpdb->prefix}library_press_tbl_books",
		$data,
		array(
			'%s',
			'%s',
			'%s',
			'%d',
			'%s',
			'%s',
			'%d',
			'%d',
			'%d',
			'%s',
		),
	);

	if ( ! $inserted ) {
		return new \WP_Error( 'failed-to-insert', __( 'Failed to insert data', 'library-press' ) );
	}
	return $wpdb->insert_id;
}

/**
 * Fetch data
 *
 * @param string $table_name table name here.
 * @return array
 */
function lp_get_data( $table_name ) {
	global $wpdb;
	$items = $wpdb->get_results(
		$wpdb->prepare(
			'SELECT * FROM %i ORDER BY id DESC',
			esc_sql( $wpdb->prefix . $table_name )
		)
	);
	return $items;
}

/**
 * Delete data
 *
 * @param int    $id which id will be delete.
 * @param string $table_name where data will be delete.
 * @return void
 */
function lp_delete_data( $id, $table_name ) {
	global $wpdb;
	$wpdb->delete(
		$wpdb->prefix . $table_name,
		array(
			'ID' => $id,
		),
		array(
			'%d',
		)
	);
}

/**
 * Get books by bookShelf
 *
 * @param int $shelf_id shelf id.
 * @return object
 */
function get_books_by_shelf( $shelf_id ) {
	global $wpdb;

	// Query to fetch books for a specific shelf.

	$books = $wpdb->get_results(
		$wpdb->prepare(
			"
		SELECT 
			book.id AS book_id,
			book.name AS book_name,
			book.email,
			book.publication,
			book.amount,
			book.description,
			book.book_image
		FROM 
			{$wpdb->prefix}library_press_tbl_books AS book
		INNER JOIN 
			{$wpdb->prefix}library_press_tbl_book_shelf AS shelf
		ON 
			book.shelf_id = shelf.id
		WHERE 
			shelf.id = %d
	",
			$shelf_id
		)
	);

	return $books;
}

/**
 * Get single address
 *
 * @param int    $id row id.
 * @param string $table_name database table name.
 * @return object
 */
function lp_get_row( $id, $table_name ) {
	global $wpdb;
	$data = $wpdb->get_row(
		$wpdb->prepare(
			'SELECT * FROM %i WHERE id = %d',
			$wpdb->prefix . $table_name,
			$id
		)
	);
	return $data;
}
