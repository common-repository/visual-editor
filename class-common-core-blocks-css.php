<?php
/**
 * Class for CSS logic.
 *
 */

namespace VISUALEDIT\CustomCss;

/**
 * Class Visual_Editor_Blocks_CSS.
 */
class Visual_Editor_Blocks_CSS {

	/**
	 * The main instance var.
	 *
	 * @var Visual_Editor_Blocks_CSS
	 */
	public static $instance = null;

	/**
	 * Initialize the class
	 */
	public function init() {
		if ( ! defined( 'VISUAL_EDITOR_BLOCKS_URL' ) ) {
			define( 'VISUAL_EDITOR_BLOCKS_URL', VISUALEDIT_BLOCKS_URL );
		}

		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ), 1 );
		add_action( 'wp_head', array( $this, 'render_server_side_css' ) );
		add_action( 'wp_loaded', array( $this, 'add_attributes_to_blocks' ) );
		add_filter( 'visual_editor_gutenberg_blocks_css', array( $this, 'add_css_to_visualeditor' ), 10, 1 );
	}

	/**
	 * Load Gutenberg assets.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function enqueue_editor_assets() {
		wp_enqueue_code_editor( array( 'type' => 'text/css' ) );

		wp_add_inline_script( 
			'wp-codemirror', 
			'window.CodeMirror = wp.CodeMirror;'
		);

		wp_enqueue_script(
			'visual-editor-css',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/custom-css/index.js',
			array('lodash', 'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-compose', 'wp-data', 'wp-element', 'wp-hooks', 'wp-i18n'),
			true
		);

		wp_enqueue_style(
			'visual-editor-css',
			VISUAL_EDITOR_BLOCKS_URL . 'common-core/custom-css/index.css',
			array( 'code-editor' )
		);
	}

	/**
	 * Render server-side CSS
	 * 
	 * @since   1.0.0
	 * @access  public
	 */
	public function render_server_side_css() {
		if ( function_exists( 'has_blocks' ) && has_blocks( get_the_ID() ) ) {
			global $post;

			if ( ! is_object( $post ) ) {
				return;
			}

			$blocks = parse_blocks( $post->post_content );

			if ( ! is_array( $blocks ) || empty( $blocks ) ) {
				return;
			}

			$css = $this->cycle_through_blocks( $blocks, $post->ID );

			if ( empty( $css ) ) {
				return;
			}

			$style  = "\n" . '<style type="text/css" media="all">' . "\n";
			$style .= $css;
			$style .= "\n" . '</style>' . "\n";

			echo $style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

	/**
	 * Cycle thorugh Blocks
	 *
	 * @param array $inner_blocks Array of blocks.
	 * @param int   $id Post ID.
	 * 
	 * @since   1.0.0
	 * @access  public
	 */
	public function cycle_through_blocks( $inner_blocks, $id ) {
		$style = '';
		foreach ( $inner_blocks as $block ) {
			$file_name  = get_post_meta( $id, '_visual_editor_gutenberg_block_stylesheet', true );
			$render_css = empty( $file_name ) || strpos( $file_name, 'post-v2' ) === false;

			if ( $render_css && isset( $block['attrs'] ) ) {
				if ( isset( $block['attrs']['hasCustomCSS'] ) && isset( $block['attrs']['customCSS'] ) ) {
					$style .= $block['attrs']['customCSS'];
				}
			}

			if ( 'core/block' === $block['blockName'] && ! empty( $block['attrs']['ref'] ) ) {
				$reusable_block = get_post( $block['attrs']['ref'] );

				if ( ! $reusable_block || 'wp_block' !== $reusable_block->post_type ) {
					return;
				}

				if ( 'publish' !== $reusable_block->post_status || ! empty( $reusable_block->post_password ) ) {
					return;
				}

				$blocks = parse_blocks( $reusable_block->post_content );

				$style .= $this->cycle_through_blocks( $blocks, $reusable_block->ID );
			}

			if ( isset( $block['innerBlocks'] ) && ! empty( $block['innerBlocks'] ) && is_array( $block['innerBlocks'] ) ) {
				$style .= $this->cycle_through_blocks( $block['innerBlocks'], $id );
			}
		}
		return $style;
	}

	/**
	 * Adds the `hasCustomCSS` and `customCSS` attributes to all blocks, to avoid `Invalid parameter(s): attributes`
	 * error in Gutenberg.
	 *
	 * @since   1.0.3
	 * @access  public
	 */
	public function add_attributes_to_blocks() {
		$registered_blocks = \WP_Block_Type_Registry::get_instance()->get_all_registered();

		foreach ( $registered_blocks as $name => $block ) {
			$block->attributes['hasCustomCSS'] = array(
				'type'    => 'boolean',
				'default' => false,
			);

			$block->attributes['customCSS'] = array(
				'type'    => 'string',
				'default' => '',
			);
		}
	}

	/**
	 * Append Block CSS to Visual Editor's CSS file..
	 *
	 * @param int $block Block.
	 *
	 * @since   1.1.4
	 * @access  public
	 */
	public function add_css_to_visualeditor( $block ) {
		$style = '';
		if ( isset( $block['attrs'] ) ) {
			if ( isset( $block['attrs']['hasCustomCSS'] ) && isset( $block['attrs']['customCSS'] ) ) {
				$style .= $block['attrs']['customCSS'];
			}
		}

		return $style;
	}

	/**
	 * The instance method for the static class.
	 * Defines and returns the instance of the static class.
	 *
	 * @static
	 * @since 1.0.0
	 * @access public
	 * @return Visual_Editor_Blocks_CSS
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
