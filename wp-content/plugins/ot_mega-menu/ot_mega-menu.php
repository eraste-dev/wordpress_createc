<?php
/**
 * Plugin Name: OT Mega Menu
 * Plugin URI:  http://oceanthemes.net/
 * Description: Declares a plugin that will create a mega menu displaying menu.
 * Version:     1.1.1
 * Author:      OceanThemes
 * Author URI:  http://oceanthemes.net/
 * License:     GPLv2 +
 * Text Domain: ot_mega-menu
 *
 * @package OT Mage Menu
 */
if ( defined( 'ABSPATH' ) ) {

	/**
	 * Register Mega Menu
	 */
	require_once dirname( __FILE__ ) . '/inc/backend/class-mega-menu.php';
	require_once dirname( __FILE__ ) . '/inc/frontend/class-mega-menu-walker.php';

	/*
	 * Loco Translate
	 */
	function ot_mega_menu_translate() {
		load_plugin_textdomain('ot_mega-menu', FALSE, dirname( __FILE__ ) . '/lang/');
	}
	add_action('plugins_loaded', 'ot_mega_menu_translate');

	/**
	 * Create post type 'ot_mega_menu'
	 */
	add_action( 'init', 'register_ocean_mega_menu' ); 
    function register_ocean_mega_menu() {
        register_post_type( 'ot_mega_menu',
            array(
                'labels' => array(
                    'name' 					=> __('OT Mega Menu', 'ot_mega-menu'),
                    'singular_name' 		=> __('OT Mega Menu', 'ot_mega-menu'),
                    'add_new' 				=> __('Add New', 'ot_mega-menu') ,
                    'add_new_item' 			=> __('Add New Mega Menu', 'ot_mega-menu'), 
                    'edit' 					=> __('Edit', 'ot_mega-menu'),
                    'edit_item' 			=> __('Edit Mega Menu', 'ot_mega-menu'),
                    'new_item' 				=> __('New Mega Menu', 'ot_mega-menu'),
                    'view' 					=> __('View', 'ot_mega-menu'),
                    'view_item' 			=> __('View Mega Menu', 'ot_mega-menu'),
                    'search_items' 			=> __('Search Mega Menus', 'ot_mega-menu'),
                    'not_found' 			=> __('No Mega Menus found', 'ot_mega-menu'),
                    'not_found_in_trash' 	=> __('No Mega Menus found in Trash', 'ot_mega-menu'),
                    'parent' 				=> __('Parent Mega Menu', 'ot_mega-menu')
                ),
                'hierarchical' 			=> false,
                'public' 				=> true,
                'show_ui' 				=> false, /* false is not show menu */
                'menu_position' 		=> 60,
                'supports' 				=> array( 'title', 'editor' ),
                'menu_icon' 			=> 'dashicons-editor-kitchensink',
                'publicly_queryable' 	=> true,
                'exclude_from_search' 	=> false,
                'has_archive' 			=> true,
                'query_var' 			=> true,
                'can_export' 			=> true,
                'capability_type' 		=> 'post'
            )
        );
    }

    // Post types with Elementor
	function ot_add_cpt_support() {
	    
	    //if exists, assign to $cpt_support var
	    $cpt_support = get_option( 'elementor_cpt_support' );
	    
	    //check if option DOESN'T exist in db
	    if( ! $cpt_support ) {
	        $cpt_support = [ 'page', 'post', 'ot_mega_menu' ]; //create array of our default supported post types
	        update_option( 'elementor_cpt_support', $cpt_support ); //write it to the database
	    }
	    
	    //if it DOES exist, but portfolio is NOT defined
	    else if( ! in_array( 'ot_mega_menu', $cpt_support ) ) {
	        $cpt_support[] = 'ot_mega_menu'; //append to array
	        update_option( 'elementor_cpt_support', $cpt_support ); //update database
	    }
	    
	    //otherwise do nothing, portfolio already exists in elementor_cpt_support option
	}
	add_action( 'elementor/init', 'ot_add_cpt_support' );

}



