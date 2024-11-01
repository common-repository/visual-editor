<?php
/**
 * Register layouts and sections for the Importer block.
 *
 * @package VISUALEDIT\Blocks
 */

namespace VISUALEDIT\Blocks\Layouts;

add_action( 'plugins_loaded', __NAMESPACE__ . '\register_components', 11 );
/**
 * Registers section and layout components.
 *
 * @since 1.0.2
 */
function register_components() {
	/**
	 * Scan Patterns directory and auto require all PHP files
	 */
	$pattern_file_paths = glob( dirname( __FILE__ ) . '/../patterns/*.php' );
	foreach ( $pattern_file_paths as $path ) {
		visualedit_blocks_register_layout_component( require $path );
	}

	$pattern_file_paths = glob( dirname( __FILE__ ) . '/../patterns/sections/*.php' );
	foreach ( $pattern_file_paths as $path ) {
		$patterns = require $path;
		foreach ( $patterns as $pattern ) {
			visualedit_blocks_register_layout_component( $pattern );
		}
	}
}
