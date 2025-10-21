<?php
/**
 * Customize and add more fields for mega menu
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Walker_Nav_Menu_Edit' ) ) {
	require_once ABSPATH . 'wp-admin/includes/nav-menu.php';
}

class Ot_Mega_Menu_Walker_Edit extends Walker_Nav_Menu_Edit {
	/**
	 * Start the element output.
	 *
	 * @see   Walker_Nav_Menu::start_el()
	 * @since 3.0.0
	 *
	 * @global int $_wp_nav_menu_max_depth
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param array $args Not used.
	 * @param int $id Not used.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$item_mega        = get_post_meta( $item->ID, 'tamm_menu_item_mega', true );		

		$item_output = '';
		parent::start_el( $item_output, $item, $depth, $args );

		$dom                  = new DOMDocument();
		$dom->validateOnParse = true;
		$dom->loadHTML( mb_convert_encoding( $item_output, 'HTML-ENTITIES', 'UTF-8' ) );

		$xpath = new DOMXPath( $dom );

		// Remove spaces in href attribute
		$anchors = $xpath->query( "//a" );

		foreach ( array_reverse( iterator_to_array( $anchors ) ) as $anchor ) {
			$anchor->setAttribute( 'href', trim( $anchor->getAttribute( 'href' ) ) );
		}

		// Add more menu item data
		$settings = $xpath->query( "//*[@id='menu-item-settings-" . $item->ID . "']" )->item( 0 );

		if ( $settings ) {
			$data = $dom->createElement( 'span' );
			$data->setAttribute( 'class', 'hidden tamm-data' );
			$data->setAttribute( 'data-mega', intval( $item_mega ) );

			$settings->appendChild( $data );
		}

		// Add settings link
		$cancel = $xpath->query( "//*[@id='cancel-" . $item->ID . "']" )->item( 0 );

		if ( $cancel && !$depth ) {
			$link            = $dom->createElement( 'a' );
			$link->nodeValue = esc_html__( 'Settings', 'ot_mega-menu' );
			$link->setAttribute( 'class', 'item-config-mega opensettings submitcancel hide-if-no-js' );
			$link->setAttribute( 'href', '#' );
			$sep            = $dom->createElement( 'span' );
			$sep->nodeValue = ' | ';
			$sep->setAttribute( 'class', 'meta-sep hide-if-no-js' );

			$cancel->parentNode->insertBefore( $link, $cancel );
			$cancel->parentNode->insertBefore( $sep, $cancel );
		}


		$output .= $dom->saveHTML();
	}
}

class Ot_Mega_Menu_Edit {
	/**
	 * Ot_Mega_Menu_Edit constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );
		add_action( 'admin_footer-nav-menus.php', array( $this, 'modal' ) );
		add_action( 'admin_footer-nav-menus.php', array( $this, 'elementor_buider_modal' ) );
		add_action( 'admin_footer-nav-menus.php', array( $this, 'templates' ) );
		add_action( 'wp_ajax_tamm_save_menu_item_data', array( $this, 'save_menu_item_data' ) );
	}

	/**
	 * Load scripts on Menus page only
	 *
	 * @param string $hook
	 */
	public function scripts( $hook ) {
		if ( 'nav-menus.php' !== $hook ) {
			return;
		}

		wp_register_style( 'ot-mega-menu', '/wp-content/plugins/ot_mega-menu/css/mega-menu.css', array(
			'media-views',
		), '20160530' );
		wp_enqueue_style( 'ot-mega-menu' );

		wp_register_script( 'ot-mega-menu', '/wp-content/plugins/ot_mega-menu/js/mega-menu.js', array(
			'jquery',
			'jquery-ui-resizable',
			'wp-util',
			'backbone',
			'underscore',
		), '20160530', true );
		wp_enqueue_media();
		wp_enqueue_script( 'ot-mega-menu' );
	}

	/**
	 * Prints HTML of modal on footer
	 */
	public function modal() {
		?>
        <div id="tamm-settings" tabindex="0" class="tamm-settings ot-tamm-settings">
            <div class="tamm-modal media-modal wp-core-ui">
                <button type="button" class="button-link media-modal-close tamm-modal-close">
                    <span class="media-modal-icon"><span
                                class="screen-reader-text"><?php esc_html_e( 'Close', 'ot_mega-menu' ) ?></span></span>
                </button>
                <div class="media-modal-content">
                    <div class="tamm-frame-menu media-frame-menu">
                        <div class="tamm-menu media-menu"></div>
                    </div>
                    <div class="tamm-frame-title media-frame-title"></div>
                    <div class="tamm-frame-content media-frame-content">
                        <div class="tamm-content">
                            <!--							<span class="spinner"></span>-->
                        </div>
                    </div>
                    <div class="tamm-frame-toolbar media-frame-toolbar">
                        <div class="tamm-toolbar media-toolbar">
                            <div class="tamm-toolbar-primary media-toolbar-primary search-form">
                                <button type="button"
                                        class="button tamm-button tamm-button-save media-button button-primary button-large"><?php esc_html_e( 'Save Changes', 'ot_mega-menu' ) ?></button>
                                <button type="button"
                                        class="button tamm-button tamm-button-cancel media-button button-secondary button-large"><?php esc_html_e( 'Cancel', 'ot_mega-menu' ) ?></button>
                                <span class="spinner"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="media-modal-backdrop tamm-modal-backdrop"></div>
        </div>
		<?php
	}

	public function elementor_buider_modal() {
		?>
        <div id="tamm-settings-elementor" tabindex="0" class="tamm-settings ot-tamm-settings-elementor">
            <div class="tamm-modal media-modal wp-core-ui">
                <button type="button" class="button-link media-modal-close ot-tamm-modal-elementor-close">
                    <span class="media-modal-icon">
                    	<span class="screen-reader-text"><?php esc_html_e( 'Close', 'ot_mega-menu' ) ?></span>
                    </span>
                </button>
                <div class="media-modal-content">
                    <div class="ot-loading"></div>
                </div>
            </div>
            <div class="media-modal-backdrop ot-tamm-modal-elementor-backdrop"></div>
        </div>
		<?php
	}

	/**
	 * Prints underscore template on footer
	 */
	public function templates() {
		$templates = apply_filters(
			'tamm_js_templates', array(
				'menus',
				'title',
				'mega'
			)
		);

		foreach ( $templates as $template ) {
			$file = apply_filters( 'tamm_js_template_path', plugin_dir_path( __FILE__ ) . '../../tmpl/' . $template . '.php', $template );
			?>
            <script type="text/template" id="tmpl-tamm-<?php echo esc_attr( $template ) ?>">
				<?php
				if ( file_exists( $file ) ) {
					include $file;
				}
				?>
            </script>
			<?php
		}
	}

	/**
	 * Ajax function to save menu item data
	 */
	public function save_menu_item_data() {
		$_POST['data'] = stripslashes_deep( $_POST['data'] );
		parse_str( $_POST['data'], $data );


		$i = 0;
		// Save menu item data
		foreach ( $data['menu-item'] as $id => $meta ) {

			// Update meta value for checkboxes
			$keys = array_keys( $meta );

			if ( $i == 0 ) {
				if ( in_array( 'mega', $keys ) ) {
					update_post_meta( $id, 'tamm_menu_item_mega', true );
				} else {
					delete_post_meta( $id, 'tamm_menu_item_mega' );
				}
			}

			foreach ( $meta as $key => $value ) {
				$key = str_replace( '-', '_', $key );
				update_post_meta( $id, 'tamm_menu_item_' . $key, $value );
			}

			$i ++;
		}


		do_action( 'ot_save_menu_item_data', $data );

		wp_send_json_success( $data );
	}
}
