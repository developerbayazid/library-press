<?php
/**
 * Fired during plugin activation
 *
 * @link       https://https://github.com/developerbayazid
 * @since      1.0.0
 *
 * @package    Library_Press
 * @subpackage Library_Press/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Library_Press
 * @subpackage Library_Press/includes
 * @author     Bayazid Hasan <bayazid.dns@gmail.com>
 */
class Library_Press_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();

		$library_books = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}library_press_tbl_books` (
			`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(150) NULL DEFAULT NULL,
			`amount` INT NULL DEFAULT NULL,
			`description` TEXT NULL DEFAULT NULL,
			`book_image` VARCHAR(250) NULL DEFAULT NULL,
			`language` VARCHAR(150) NULL DEFAULT NULL,
			`shelf_id` INT NULL,
			`status` INT NULL DEFAULT '1',
			`created_by` BIGINT(20) UNSIGNED NOT NULL,
			`created_at` DATETIME NOT NULL,
			PRIMARY KEY (`id`)
		)
		$charset_collate";

		$library_book_shelf = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}library_press_tbl_book_shelf` (
			`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
			`shelf_name` VARCHAR(150) NULL DEFAULT NULL,
			`capacity` INT NULL DEFAULT NULL,
			`shelf_location` VARCHAR(250) NULL DEFAULT NULL,
			`status` INT(11) NULL DEFAULT '1',
			`created_by` BIGINT(20) UNSIGNED NOT NULL,
			`created_at` DATETIME NOT NULL,
			PRIMARY KEY (`id`)
		)
		$charset_collate";

		if ( ! function_exists( 'dbDelta' ) ) {
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		}

		dbDelta( $library_books );
		dbDelta( $library_book_shelf );

		$this->create_page();
	}

	/**
	 * Manage the installation and versioning
	 *
	 * @return void
	 */
	public function library_press_installed() {
		$installed = get_option( 'library_press_installed' );
		if ( ! $installed ) {
			update_option( 'library_press_installed', time() );
		}
		update_option( 'library_press_version', LIBRARY_PRESS_VERSION );
	}

	/**
	 * Create a page during plugin installation
	 *
	 * @return void
	 */
	public function create_page() {
		global $wpdb;
		$get_data = $wpdb->get_row(
			$wpdb->prepare(
				'SELECT * FROM %i WHERE post_name = %s',
				$wpdb->prefix . 'posts',
				'library_press'
			),
		);

		if ( empty( $get_data ) ) {
			$post_info = array(
				'post_author'  => get_current_user_id(),
				'post_title'   => __( 'LibraryPress', 'library-press' ),
				'post_name'    => 'library_press',
				'post_content' => __( 'LibraryPress Content', 'library-press' ),
				'post_status'  => 'publish',
				'post_type'    => 'page',
			);
			wp_insert_post( $post_info );
		}
	}
}
