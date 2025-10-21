<?php

class Ot_Mega_Menu {
	/**
	 * Ot_Mega_Menu constructor.
	 */
	public function __construct() {

		$this->load();
		$this->init();
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'edit_nav_menu_walker' ) );
	}

	/**
	 * Load files
	 */
	private function load() {
		include plugin_dir_path(__FILE__) . 'class-menu-edit.php';
	}

	/**
	 * Initialize
	 */
	private function init() {
		if ( is_admin() ) {
			new Ot_Mega_Menu_Edit();
		}
	}

	/**
	 * Change the default nav menu walker
	 *
	 * @return string
	 */
	public function edit_nav_menu_walker() {
		return 'Ot_Mega_Menu_Walker_Edit';
	}
}

add_action( 'init', 'ot_mega_menu_init' );
function ot_mega_menu_init() {
	global $ot_mega_menu;

	$ot_mega_menu = new Ot_Mega_Menu();

}

add_action( 'init', 'ot_redirect_elementor_content' );
function ot_redirect_elementor_content() {

	if ( ! isset( $_GET['ot_tamm_menu_id'] ) && empty( $_GET['ot_tamm_menu_id'] ) && ! isset( $_GET['ot_tamm_mega_elementor'] ) ) {
		return;
	}

	$menu_id = intval( $_GET['ot_tamm_menu_id'] );
	$page_id = get_post_meta( $menu_id, 'tamm_menu_page_id', true );

	if ( ! $page_id ) {
		$page_id = wp_insert_post( [
			'post_title'  => 'Menu Item #' . $menu_id,
			'post_name'   => 'ot-menu-item-' . $menu_id,
			'post_status' => 'publish',
			'post_type'   => 'ot_mega_menu',
		] );
		if ( intval( $page_id ) ) {
			update_post_meta( $menu_id, 'tamm_menu_page_id', $page_id );
		}
	}

	wp_redirect( add_query_arg(
		[
			'post'   => $page_id,
			'action' => 'elementor',
		],
		admin_url( 'post.php' )
	) );

	exit();
}