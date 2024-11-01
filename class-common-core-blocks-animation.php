<?php
/**
 * Class for Animation logic.
 *
 */

namespace VISUALEDIT\Animations;

/**
 * Class Visual_Editor_Blocks_Animation
 */
class Visual_Editor_Blocks_Animation {

	/**
	 * The main instance var.
	 *
	 * @var Visual_Editor_Blocks_Animation
	 */
	public static $instance = null;

	/**
	 * Initialize the class
	 */
	public function init() {
		if ( ! defined( 'VISUAL_EDITOR_BLOCKS_URL' ) ) {
			define( 'VISUAL_EDITOR_BLOCKS_URL', VISUALEDIT_BLOCKS_URL );
		}

		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_block_frontend_assets' ) );
	}

	/**
	 * Load Gutenberg editor assets.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function enqueue_editor_assets() {

		wp_enqueue_script(
			'visual-editor-animation',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/animation/index.js',
			true
		);

		wp_set_script_translations( 'visual-editor-animation', 'visual-editor-blocks' );

		wp_enqueue_script(
			'visual-editor-count',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/animation/anim-count.js',
			true
		);

		wp_script_add_data( 'visual-editor-count', 'defer', true );
	}

	/**
	 * Load Gutenberg assets.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function enqueue_block_frontend_assets() {
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return;
		}

		global $post;

		if ( is_singular() && strpos( get_the_content( null, false, $post ), '<!-- wp:' ) === false ) {
			return;
		}


		wp_enqueue_style(
			'animate-css',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/animation/css/animate.compact.css',
			array()
		);

		wp_enqueue_style(
			'visual-editor-animation',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/animation/index.css',
			array()
		);

		if ( is_admin() ) {
			return;
		}

		wp_enqueue_script(
			'visual-editor-animation-frontend',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/animation/frontend.js',
			array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor'),
			true
		);

		wp_script_add_data( 'visual-editor-animation-frontend', 'async', true );

		wp_enqueue_script(
			'visual-editor-count',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/animation/anim-count.js',
			array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor'),
			true
		);

		wp_script_add_data( 'visual-editor-count', 'defer', true );

		wp_enqueue_script(
			'visual-editor-typing',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/animation/anim-typing.js',
			array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor'),
			true
		);

		wp_script_add_data( 'visual-editor-typing', 'defer', true );
	}

	/**
	 * The instance method for the static class.
	 * Defines and returns the instance of the static class.
	 *
	 * @static
	 * @since 1.0.0
	 * @access public
	 * @return Visual_Editor_Blocks_Animation
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->init();
		}

		return self::$instance;
	}

	/**
	 * Throw error on object clone
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object therefore, we don't want the object to be cloned.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'visual-editor-blocks' ), '1.0.0' );
	}

	/**
	 * Disable unserializing of the class
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function __wakeup() {
		// Unserializing instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'visual-editor-blocks' ), '1.0.0' );
	}
}
