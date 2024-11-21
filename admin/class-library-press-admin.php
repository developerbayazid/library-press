<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://github.com/developerbayazid
 * @since      1.0.0
 *
 * @package    Library_Press
 * @subpackage Library_Press/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Library_Press
 * @subpackage Library_Press/admin
 * @author     Bayazid Hasan <bayazid.dns@gmail.com>
 */
class Library_Press_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		require_once LIBRARY_PRESS_PLUGIN_PATH . 'functions.php';
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		$valid_pages = array(
			'library-press-dashboard',
			'library-press-create-book',
			'library-press-book-list',
			'library-press-create-book-shelf',
			'library-press-list-book-shelf',
		);

		$page = isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '';

		if ( in_array( $page, $valid_pages, true ) ) {

			$this->admin_enqueue_styles(
				array(
					'lp-bootstrap'     => 'assets/css/bootstrap.min.css',
					'lp-data-table'    => 'assets/css/data-tables.min.css',
					'lp-sweetalert'    => 'assets/css/sweetalert.css',
					$this->plugin_name => 'admin/css/library-press-admin.css',
				)
			);
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		$valid_pages = array(
			'library-press-dashboard',
			'library-press-create-book',
			'library-press-book-list',
			'library-press-create-book-shelf',
			'library-press-list-book-shelf',
		);

		$page = isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '';

		if ( in_array( $page, $valid_pages, true ) ) {
			$scripts = array(
				'lp-bootstrap'  => 'assets/js/bootstrap.bundle.min.js',
				'lp-data-table' => 'assets/js/dataTables.min.js',
				'lp-validate'   => 'assets/js/jquery.validate.min.js',
				'lp-sweetalert' => 'assets/js/sweetalert.min.js',
			);
			$this->admin_enqueue_scripts( $scripts, array( 'jquery' ) );
			wp_enqueue_script( $this->plugin_name, LIBRARY_PRESS_PLUGIN_URL . 'admin/js/library-press-admin.js', array( 'jquery', 'wp-util' ), $this->version, true );
		}
	}

	/**
	 * Helper function to enqueue multiple styles.
	 *
	 * @param array $styles Associative array of handle => path.
	 */
	private function admin_enqueue_styles( array $styles ) {
		foreach ( $styles as $handle => $path ) {
			wp_enqueue_style(
				$handle,
				LIBRARY_PRESS_PLUGIN_URL . $path,
				array(),
				$this->version,
				'all'
			);
		}
	}

	/**
	 * Helper function to enqueue multiple scripts.
	 *
	 * @param array $scripts Associative array of handle => path.
	 * @param array $dependencies return a array or single value.
	 * @return void
	 */
	private function admin_enqueue_scripts( array $scripts, $dependencies = array() ) {
		foreach ( $scripts as $handle => $path ) {
			foreach ( $scripts as $handle => $path ) {
				wp_enqueue_script(
					$handle,
					LIBRARY_PRESS_PLUGIN_URL . $path,
					$dependencies,
					$this->version,
					true
				);
			}
		}
	}


	/**
	 * Admin menu register
	 *
	 * @return void
	 */
	public function library_press_menu() {
		$parent_slug = 'library-press-dashboard';
		$capability  = 'manage_options';
		add_menu_page( __( 'LibraryPress', 'library-press' ), __( 'LibraryPress', 'library-press' ), $capability, $parent_slug, array( $this, 'library_press_dashboard' ), 'dashicons-book', 24 );

		add_submenu_page( $parent_slug, __( 'Dashboard', 'library-press' ), __( 'Dashboard', 'library-press' ), $capability, $parent_slug, array( $this, 'library_press_dashboard' ) );
		add_submenu_page( $parent_slug, __( 'Create Book Shelf', 'library-press' ), __( 'Create Book Shelf', 'library-press' ), $capability, 'library-press-create-book-shelf', array( $this, 'library_press_create_book_shelf' ) );
		add_submenu_page( $parent_slug, __( 'Book Shelf List', 'library-press' ), __( 'Book Shelf List', 'library-press' ), $capability, 'library-press-list-book-shelf', array( $this, 'library_press_list_book_shelf' ) );
		add_submenu_page( $parent_slug, __( 'Create Book', 'library-press' ), __( 'Create Book', 'library-press' ), $capability, 'library-press-create-book', array( $this, 'library_press_create_book' ) );
		add_submenu_page( $parent_slug, __( 'Book List', 'library-press' ), __( 'Book List', 'library-press' ), $capability, 'library-press-book-list', array( $this, 'library_press_book_list' ) );
	}

	/**
	 * Admin Menu callback function
	 *
	 * @return void
	 */
	public function library_press_dashboard() {
		echo '<h2>Dashboard</h2>';
	}

	/**
	 * Create book shelf function
	 *
	 * @return void
	 */
	public function library_press_create_book_shelf() {
		ob_start();
		include_once LIBRARY_PRESS_PLUGIN_PATH . 'admin/partials/library-press-create-book-shelf.php';
		echo ob_get_clean(); // phpcs:ignore
	}

	/**
	 * List book shelf function
	 *
	 * @return void
	 */
	public function library_press_list_book_shelf() {
		$book_shelf_list = lp_get_data( 'library_press_tbl_book_shelf' );
		ob_start();
		include_once LIBRARY_PRESS_PLUGIN_PATH . 'admin/partials/library-press-list-book-shelf.php';
		echo ob_get_clean(); // phpcs:ignore
	}

	/**
	 * Handle create book functionality
	 *
	 * @return void
	 */
	public function library_press_create_book() {
		global $wpdb;

		$book_shelf = $wpdb->get_results(
			$wpdb->prepare(
				'SELECT id, shelf_name FROM %i',
				$wpdb->prefix . 'library_press_tbl_book_shelf'
			)
		);

		ob_start();
		include_once LIBRARY_PRESS_PLUGIN_PATH . 'admin/partials/library-press-create-book.php';
		echo ob_get_clean(); // phpcs:ignore
	}

	/**
	 * Handle book list
	 *
	 * @return void
	 */
	public function library_press_book_list() {
		global $wpdb;

		$table_books = $wpdb->prefix . 'library_press_tbl_books';
		$table_shelf = $wpdb->prefix . 'library_press_tbl_book_shelf';

		$book_list = $wpdb->get_results(
			$wpdb->prepare(
				'SELECT book.*, shelf.shelf_name 
				FROM %i AS book
				LEFT JOIN %i AS shelf
				ON book.shelf_id = shelf.id
				ORDER BY book.id DESC',
				$table_books,
				$table_shelf,
			),
		);
		ob_start();
		include_once LIBRARY_PRESS_PLUGIN_PATH . 'admin/partials/library-press-list-book.php';
		echo ob_get_clean(); // phpcs:ignore
	}

	/**
	 * Book shelf form ajax handler
	 *
	 * @return void
	 */
	public function book_shelf_handle_admin_ajax() {
		if ( ! isset( $_REQUEST['_wpnonce'] ) ) {
			wp_send_json_error( array( 'message' => 'Nonce is missing' ), 400 );
		}

		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ), 'book-shelf-form' ) ) {
			wp_send_json_error( array( 'message' => 'Nonce verification failed' ), 403 );
		}

		$data = isset( $_REQUEST['data'] ) ? $_REQUEST['data'] : ''; // phpcs:ignore

		$name     = $data['name'] ? sanitize_text_field( $data['name'] ) : '';
		$capacity = $data['capacity'] ? intval( $data['capacity'] ) : 0;
		$location = $data['location'] ? sanitize_text_field( $data['location'] ) : '';
		$status   = $data['status'] ? sanitize_text_field( $data['status'] ) : '';
		$status   = 'active' === $status ? intval( 1 ) : intval( 0 );

		if ( ! $name || ! $capacity || ! $location ) {
			wp_send_json_error( array( 'message' => 'Require field empty not allow!' ), 406 );
		}

		$args = array(
			'shelf_name'     => $name,
			'capacity'       => $capacity,
			'shelf_location' => $location,
			'status'         => $status,
		);

		$inserted = lp_insert_book_shelf( $args );

		if ( $inserted ) {
			wp_send_json_success(
				array(
					'data'    => $data,
					'message' => 'Data has been sent successfully!',
				)
			);
		} else {
			wp_send_json_error( array( 'message' => 'Data not inserted!' ), 410 );
		}
	}

	/**
	 * Book shelf delete handler
	 *
	 * @return void
	 */
	public function book_shelf_delete_data_handler() {
		$id = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0; // phpcs:ignore
		if ( ! $id ) {
			wp_send_json_error( array( 'message' => 'Id not found!' ), 400 );
		} else {
			lp_delete_data( $id, 'library_press_tbl_book_shelf' );
			wp_send_json_success(
				array(
					'message' => 'Book Shelf has been deleted successfully!',
					'status'  => 1,
				)
			);
		}
	}

	/**
	 * Book form ajax handler
	 *
	 * @return void
	 */
	public function book_form_handle_admin_ajax() {
		if ( ! isset( $_REQUEST['_wpnonce'] ) ) {
			wp_send_json_error( array( 'message' => 'Nonce is missing' ), 400 );
		}

		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ), 'book-form' ) ) {
			wp_send_json_error( array( 'message' => 'Nonce verification failed' ), 403 );
		}

		$data = isset( $_REQUEST['data'] ) ? $_REQUEST['data'] : ''; // phpcs:ignore

		$name        = $data['name'] ? sanitize_text_field( $data['name'] ) : '';
		$email       = $data['email'] ? sanitize_text_field( $data['email'] ) : '';
		$book_cost   = $data['book_cost'] ? intval( $data['book_cost'] ) : '';
		$description = $data['description'] ? sanitize_textarea_field( $data['description'] ) : '';
		$book_image  = $data['book_image'] ? sanitize_text_field( $data['book_image'] ) : '';
		$publication = $data['publication'] ? sanitize_text_field( $data['publication'] ) : '';
		$shelf_id    = $data['shelf_id'] ? intval( $data['shelf_id'] ) : 0;
		$status      = $data['status'] ? sanitize_text_field( $data['status'] ) : '';
		$status      = 'active' === $status ? intval( 1 ) : intval( 0 );

		if ( ! $name || ! $email || ! $book_cost || ! $publication || ! $shelf_id || ! $book_image ) {
			wp_send_json_error( array( 'message' => 'Require field empty not allow!' ), 406 );
		}

		$args = array(
			'name'        => $name,
			'email'       => $email,
			'publication' => $publication,
			'amount'      => $book_cost,
			'description' => $description,
			'book_image'  => $book_image,
			'shelf_id'    => $shelf_id,
			'status'      => $status,
		);

		$inserted = lp_insert_book( $args );

		if ( $inserted ) {
			wp_send_json_success(
				array(
					'data'    => $data,
					'message' => 'Book has been created successfully!',
				)
			);
		} else {
			wp_send_json_error( array( 'message' => 'Book not inserted!' ), 410 );
		}
	}
}
