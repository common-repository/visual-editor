<?php
/**
 * Visual_Editor_Blocks_Extra class
 *
 * @package Visual_Editor_Blocks_Extra
 *
 * @since 1.0.0
 */

namespace VISUALEDIT\Extra;

/**
 * Core class Visual_Editor_Blocks_Extra
 *
 * @since 1.0.0
 */
class Visual_Editor_Blocks_Extra {

	/**
	 * Public variable.
	 *
	 * @access public
	 *
	 * @var array|null $plugin_data
	 */
	public $plugin_data = array();

	/**
	 * Public variable.
	 *
	 * @access public
	 *
	 * @var array|null $asset_file
	 */
	public $asset_file = array();

	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'load_plugin_data' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Init
	 *
	 * @access public
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	public function init() {
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'enqueue_block_assets', [ $this, 'enqueue_block_asset_styles' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_blocks_scripts' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_block_editor_styles' ] );

	}

	/**
	 * Load plugin data
	 *
	 * @access public
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	public function load_plugin_data() {
		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}

		$this->plugin_data = VISUAL_EDITOR_BLOCKS_URL;
	}


	public function enqueue_blocks_scripts() {
		wp_enqueue_script(
			'visual-editor-extra',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/extra/js/blocks.js',
			array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor'),
			true
		);
	}

	public function enqueue_block_editor_styles() {
		wp_enqueue_style(
			'visual-editor-extra-css',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/extra/css/block-editor-style.css',
            array() 
		);
	}

	public function enqueue_styles() {
		wp_enqueue_style(
			'visual-editor-extra-css-blocks',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/extra/css/blocks.css',
			array() 
		);
	}
	
	public function enqueue_block_asset_styles() {
		wp_enqueue_style(
			'visual-editor-extra-css-asset',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/extra/css/block-asset.css', 
			array()
		);
	}

}
