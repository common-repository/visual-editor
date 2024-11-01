<?php

class Visual_Editor_Blocks {

	/**
	 * Table of Contents Present on a Page.
	 *
	 * @var bool
	 */
	public static $table_of_contents_flag = false;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'VISUAL_EDITOR_BLOCKS_VER' ) ) {
			$this->version = VISUAL_EDITOR_BLOCKS_VER;
		} else {
			$this->version = '1.0.3';
		}
		$this->plugin_name = 'visual-editor-blocks';

		add_action( 'plugins_loaded', array( $this, 'visual_editor_blocks_loader' ) );//layout


		add_filter( 'block_categories_all', array( $this, 'visual_editor_blocks_add_custom_block_category' ) );//pk

		add_action( 'enqueue_block_editor_assets', array( $this, 'visual_editor_blocks_editor_assets' ) );//ok


		add_action( 'wp_ajax_visual_editor_fg_post_pagination', array( $this, 'post_pagination' ) );//attribute

	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @return string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Returns the version of plugin
	 *
	 * @return string    The version of the plugin.
	 */
	public function get_plugin_version() {
		return $this->version;
	}

	/**
	 * Sends the Post pagination markup to edit.js
	 *
	 * @since 1.0.2
	 */
	public function post_pagination() {
		check_ajax_referer( 'visual_editor_fg_ajax_nonce', 'nonce' );

		if ( isset( $_POST['attributes'] ) ) {

			$query = $this->get_query( $_POST['attributes'], 'grid' ); //phpcs:ignore

			$pagination_markup = $this->render_pagination( $query, $_POST['attributes'] ); //phpcs:ignore

			wp_send_json_success( $pagination_markup );
		}

		wp_send_json_error( ' No attributes recieved' );
	}

	/**
	 * Renders the post post pagination on server.
	 *
	 * @param object $query WP_Query object.
	 * @param array  $attributes Array of block attributes.
	 * @since 1.0.2
	 */
	public function render_pagination( $query, $attributes ) {

		$permalink_structure = get_option( 'permalink_structure' );
		$base                = untrailingslashit( wp_specialchars_decode( get_pagenum_link() ) );
		$base                = $this->build_base_url( $permalink_structure, $base );
		$format              = $this->paged_format( $permalink_structure, $base );
		$paged               = $this->get_paged( $query );
		$page_limit          = min( $attributes['pageLimit'], $query->max_num_pages );
		$page_limit          = isset( $page_limit ) ? $page_limit : $attributes['postsToShow'];
		$attributes['postsToShow'];

		$links = paginate_links(
			array(
				'base'      => $base . '%_%',
				'format'    => $format,
				'current'   => ( ! $paged ) ? 1 : $paged,
				'total'     => $page_limit,
				'type'      => 'array',
				'mid_size'  => 4,
				'end_size'  => 4,
				'prev_text' => $attributes['previousButtonText'],
				'next_text' => $attributes['nextButtonText'],
			)
		);

		if ( isset( $links ) ) {
			return wp_kses_post( implode( PHP_EOL, $links ) );
		}

		return '';
	}

	/**
	 * Gives the paged Query var.
	 *
	 * @param Object $query Query.
	 * @return int $paged Paged Query var.
	 * @since 1.0.2
	 */
	public static function get_paged( $query ) {

		global $paged;

		// Check the 'paged' query var.
		$paged_qv = $query->get( 'paged' );

		if ( is_numeric( $paged_qv ) ) {
			return $paged_qv;
		}

		// Check the 'page' query var.
		$page_qv = $query->get( 'page' );

		if ( is_numeric( $page_qv ) ) {
			return $page_qv;
		}

		// Check the $paged global?
		if ( is_numeric( $paged ) ) {
			return $paged;
		}

		return 0;
	}


	/**
	 * Returns the Paged Format.
	 *
	 * @param string $permalink_structure Premalink Structure.
	 * @param string $base Base.
	 * @since 1.0.3
	 */
	public static function paged_format( $permalink_structure, $base ) {

		$page_prefix = empty( $permalink_structure ) ? 'paged' : 'page';

		if ( ! empty( $permalink_structure ) ) {
			$format  = substr( $base, -1 ) !== '/' ? '/' : '';
			$format .= $page_prefix . '/';
			$format .= '%#%';
			$format .= substr( $permalink_structure, -1 ) === '/' ? '/' : '';
		} elseif ( empty( $permalink_structure ) || is_search() ) {
			$parse_url = wp_parse_url( $base, PHP_URL_QUERY );
			$format    = empty( $parse_url ) ? '?' : '&';
			$format   .= $page_prefix . '=%#%';
		}

		return $format;
	}

	/**
	 * Builds the base url.
	 *
	 * @param string $permalink_structure Premalink Structure.
	 * @param string $base Base.
	 * @since 1.0.2
	 */
	public static function build_base_url( $permalink_structure, $base ) {
		// Check to see if we are using pretty permalinks.
		if ( ! empty( $permalink_structure ) ) {

			if ( strrpos( $base, 'paged-' ) ) {
				$base = substr_replace( $base, '', strrpos( $base, 'paged-' ), strlen( $base ) );
			}

			// Remove query string from base URL since paginate_links() adds it automatically.
			// This should also fix the WPML pagination issue that was added since 1.0.2.
			if ( count( $_GET ) > 0 ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$base = strtok( $base, '?' );
			}

			// Add trailing slash when necessary.
			if ( '/' === substr( $permalink_structure, -1 ) ) {
				$base = trailingslashit( $base );
			} else {
				$base = untrailingslashit( $base );
			}
		} else {
			$url_params = wp_parse_url( $base, PHP_URL_QUERY );

			if ( empty( $url_params ) ) {
				$base = trailingslashit( $base );
			}
		}

		return $base;
	}

	/**
	 * Returns Query.
	 *
	 * @param array  $attributes The block attributes.
	 * @param string $block_type The Block Type.
	 * @since 1.0.2
	 */
	public static function get_query( $attributes, $block_type ) {

		// Block type is grid/masonry/carousel/timeline.
		$query_args = array(
			'posts_per_page'      => ( isset( $attributes['postsToShow'] ) ) ? $attributes['postsToShow'] : 6,
			'post_status'         => 'publish',
			'post_type'           => ( isset( $attributes['postType'] ) ) ? $attributes['postType'] : 'post',
			'order'               => ( isset( $attributes['order'] ) ) ? $attributes['order'] : 'desc',
			'orderby'             => ( isset( $attributes['orderBy'] ) ) ? $attributes['orderBy'] : 'date',
			'ignore_sticky_posts' => 1,
			'paged'               => 1,
		);

		if ( $attributes['excludeCurrentPost'] ) {
			$query_args['post__not_in'] = array( get_the_ID() );
		}

		if ( isset( $attributes['categories'] ) && '' !== $attributes['categories'] ) {
			$query_args['tax_query'][] = array(
				'taxonomy' => ( isset( $attributes['taxonomyType'] ) ) ? $attributes['taxonomyType'] : 'category',
				'field'    => 'id',
				'terms'    => $attributes['categories'],
				'operator' => 'IN',
			);
		}

		if ( 'grid' === $block_type && isset( $attributes['postPagination'] ) && true === $attributes['postPagination'] ) {

			if ( get_query_var( 'paged' ) ) {

				$paged = get_query_var( 'paged' );

			} elseif ( get_query_var( 'page' ) ) {

				$paged = get_query_var( 'page' );

			} else {

				$paged = 1;

			}
			$query_args['posts_per_page'] = $attributes['postsToShow'];
			$query_args['paged']          = $paged;

		}

		if ( 'masonry' === $block_type && isset( $attributes['paginationType'] ) && 'none' !== $attributes['paginationType'] && isset( $attributes['paged'] ) ) {

			$query_args['paged'] = $attributes['paged'];

		}

		$query_args = apply_filters( "visual_editor_fg_post_query_args_{$block_type}", $query_args, $attributes );

		return new WP_Query( $query_args );
	}





	/**
	 * Initialize the blocks
	 *
	 * @since    1.0.0
	 */
	public function visual_editor_blocks_loader() {

		/**
		 * Layout Component Registry.
		 */
		require_once VISUAL_EDITOR_BLOCKS_DIR . '/includes/layout/layout-functions.php';
		require_once VISUAL_EDITOR_BLOCKS_DIR . '/includes/layout/class-component-registry.php';
		require_once VISUAL_EDITOR_BLOCKS_DIR . '/includes/layout/register-layout-components.php';

		/**
		 * REST API Endpoints for Layouts.
		 */
		require_once VISUAL_EDITOR_BLOCKS_DIR . '/includes/layout/layout-endpoints.php';
	}

	/** Adds the Visual Editors Blocks block category.
	 *
	 * @param array $categories Existing block categories.
	 *
	 * @return array Updated block categories.
	 */
	public function visual_editor_blocks_add_custom_block_category( $categories ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug'  => 'visual_editor_blocks',
					'title' => __( 'Visual Editor Blocks', 'visual-editor-blocks' ),
				),
			)
		);
	}


	/**
	 * Get Post Types.
	 *
	 * @since 1.0.3
	 * @access public
	 */
	public static function get_post_types() {

		$post_types = get_post_types(
			array(
				'public'       => true,
				'show_in_rest' => true,
			),
			'objects'
		);

		$options = array();

		foreach ( $post_types as $post_type ) {
			if ( 'product' === $post_type->name ) {
				continue;
			}

			if ( 'attachment' === $post_type->name ) {
				continue;
			}

			$options[] = array(
				'value' => $post_type->name,
				'label' => $post_type->label,
			);
		}

		return $options;
	}


	/**
	 * Enqueue assets for backend editor
	 *
	 * @since 1.0.0
	 */
	public function visual_editor_blocks_editor_assets() {
		$visual_editor_fg_ajax_nonce = wp_create_nonce( 'visual_editor_fg_ajax_nonce' );

		// Load the compiled blocks into the editor.
		wp_enqueue_script(
			'visual_editor_blocks-block-js',
			VISUAL_EDITOR_BLOCKS_URL . '/dist/visual-editor-blocks.js',
			array( 'lodash', 'react', 'react-dom', 'wp-api-fetch', 'wp-blob', 'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-compose', 'wp-data', 'wp-date', 'wp-dom-ready', 'wp-edit-post', 'wp-editor', 'wp-element', 'wp-hooks', 'wp-i18n', 'wp-keycodes', 'wp-plugins', 'wp-polyfill', 'wp-rich-text', 'wp-token-list', 'wp-url', 'jquery' ),
			filemtime( VISUAL_EDITOR_BLOCKS_DIR . 'dist/visual-editor-blocks.js' ),
			true
		);

		$user_data = wp_get_current_user();
		unset( $user_data->user_pass, $user_data->user_email );

		// Pass in REST URL.
		wp_localize_script(
			'visual_editor_blocks-block-js',
			'visual_editor_globals',
			array(
				'rest_url'                           => esc_url( rest_url() ),
				'ajax_url'                           => admin_url( 'admin-ajax.php' ),
				'user_data'                          => $user_data,
				'pro_activated'                      => false,
				'is_wpe'                             => function_exists( 'is_wpe' ),
				'post_types'                         => $this->get_post_types(),
				'all_taxonomy'                       => $this->get_related_taxonomy(),
				'visual_editor_fg_ajax_nonce' => $visual_editor_fg_ajax_nonce,
			)
		);

		// Load the compiled styles into the editor.
		wp_enqueue_style(
			'visual_editor_blocks-block-editor-css',
			VISUAL_EDITOR_BLOCKS_URL . 'dist/visual-editor-blocks-editor.css',
			array( 'wp-edit-blocks' ),
			filemtime( VISUAL_EDITOR_BLOCKS_DIR . 'dist/visual-editor-blocks-editor.css' )
		);
	}

	/**
	 * Get all taxonomies.
	 *
	 * @since 1.0.2
	 * @access public
	 */
	public static function get_related_taxonomy() {

		$post_types = self::get_post_types();

		$return_array = array();

		foreach ( $post_types as $key => $value ) {
			$post_type = $value['value'];

			$taxonomies = get_object_taxonomies( $post_type, 'objects' );
			$data       = array();

			foreach ( $taxonomies as $tax_slug => $tax ) {
				if ( ! $tax->public || ! $tax->show_ui || ! $tax->show_in_rest ) {
					continue;
				}

				$data[ $tax_slug ] = $tax;

				$terms = get_terms( $tax_slug );

				$related_tax = array();

				if ( ! empty( $terms ) ) {
					foreach ( $terms as $t_index => $t_obj ) {
						$related_tax[] = array(
							'id'   => $t_obj->term_id,
							'name' => $t_obj->name,
						);
					}

					$return_array[ $post_type ]['terms'][ $tax_slug ] = $related_tax;
				}
			}

			$return_array[ $post_type ]['taxonomy'] = $data;
		}

		return $return_array;
	}


	/**
	 * Add Wrapper to all the Blocks for fetching the Table of Contents Headings.
	 *
	 * @param string $content Post Content.
	 *
	 * @since 1.22.1
	 */
	public function add_table_of_contents_wrapper( $content ) {

		if ( true === self::$table_of_contents_flag ) {
			return '<div class="visual-editor-blocks-toc__entry-content"></div>' . $content;
		}

		return $content;
	}


	/**
	 */
	
}
